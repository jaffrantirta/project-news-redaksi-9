<?php

/**
 * User: Wawang Saptawan
 * Date: 22/10/2018
 */
class Manage_berita extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("twitter");
        $this->load->helper("facebook");
        $this->load->model('DataBerita');
        $this->load->library('ckeditor');
        $this->load->library('ckfinder');
        $this->load->library('image_lib');
        $this->ckeditor->basePath = '/new/public/ckeditor/';
        $this->ckfinder->SetupCKEditor($this->ckeditor, '/public/ckfinder/');
        $this->numOfContentsPerPage = 50;
        if (empty($this->session->userdata('logged_in')))
            redirect(base_url() . 'backoffice');
    }

    public function index()
    {
        $search = $this->input->post('search');
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        if (isset($search))
        {
            $this->search();
        } else
        {
            $this->initialize_pagination(base_url("manage_berita/index"), 'berita', 'DataBerita', null);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            
            
            $data['datas'] = $this->DataBerita->getDuatable($this->numOfContentsPerPage,$page,'kategori','berita','berita.id_category=kategori.id');
            $data['page'] = $page;
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_berita/berita', $data);
            $this->template->publish();
        }
    }

    public function search()
    {
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $searchCache = $this->session->flashdata('search');
        $search = $this->input->post('search');
        $search = isset($search) ? $search : $searchCache;
        $this->initialize_pagination(base_url("manage_berita/search"),
            'berita',
            'DataBerita',
            $this->DataBerita->countSearchData(
                'berita',
                null,
                null,
                'title LIKE \'%' . $search . '%\'')
        );
        $data['datas'] = $this->DataBerita
            ->searchData(
                $this->numOfContentsPerPage,
                $page,
                'berita',
                null,
                null,
                'title LIKE \'%' . $search . '%\' OR title LIKE \'%' . $search . '%\''
            );
        $data['search'] = $search;
        $data['page'] = $page;
        $this->template->set_template('backoffice/template');
        $this->template->content->view('manage_berita/berita', $data);
        $this->template->publish();
    }

    public function tambahBerita()
    {
        if ($this->isPost())
        {
            $filename = $this->berita_submit();
            // $filename = $this->do_upload();
            
            $title = $this->input->post('title');
            $content = $this->input->post('content');
            $autopost = $this->input->post('autopost');
            $autopost_fb = $this->input->post('autopost_fb');
            
            $result = $this->DataBerita->addDataNews('berita', array(
                'date' => $this->input->post('date'),
                'show_date' => $this->input->post('show_date'),
                'id_category' => $this->input->post('id_category'),
                'title' => $this->input->post('title'),
                'subtitle' => $this->input->post('subtitle'),
                'content' => $this->input->post('content'),
                'watermark' => $this->input->post('watermark'),
                'source_image' => $this->input->post('source_image'),
                'source_video' => $this->input->post('source_video'),
                'tags' => $this->input->post('tags'),
                // 'wartawan' => $this->input->post('wartawan'),
                'hit' => $this->input->post('hit'),
                'status' => $this->input->post('status'),
                'img'                => $filename
            ));
            
            // var_dump($result);
            $url = 'http://www.redaksi9.com/read/'.$result.'/'.str_replace(array(',',' ','!','"'),array('_','-'),$title).'';
            $tweet_content = substr(strip_tags($content),0,80);

            if($autopost == true){
                sendTweet('[NEWS] '.$title.' - '.$tweet_content.'.. '.$this->getTinyUrl($url).' via @Redaksi09');
            }
            
            // if($autopost_fb == true){
            //     sendFacebook(array(
            //         // 'message' => $tweet_content,
            //         'link' => $this->getTinyUrl($url)
            //     ));
            // }
            
            $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil tambah data</p>
                </div>');  
            redirect(base_url() . 'manage_berita', 'refresh');
        } else
        {
            $data['datas'] = $this->DataBerita->getAllData('kategori');
            $data['coba'] = $this->DataBerita->getAllData('wartawan');
            $data['berita'] = $this->DataBerita->getData('400','0','berita');
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_berita/tambah_berita',$data);
            $this->template->publish();
        }
    }

   public function deleteBerita($id)
    {
        $this->DataBerita->deleteData('berita', array('id' => $id));
        $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil delete data</p>
                </div>');  
        redirect(base_url() . 'manage_berita', 'refresh');
    }

    public function editBerita($id)
    {
        if ($this->isPost())
        {
            $filename = $this->berita_submit();
            // $filename = $this->do_upload();
            if (isset($filename))
            {
                $this->DataBerita->updateData(array(
                'date' => $this->input->post('date'),
                'show_date' => $this->input->post('show_date'),
                'id_category' => $this->input->post('id_category'),
                'title' => $this->input->post('title'),
                'subtitle' => $this->input->post('subtitle'),
                'content' => $this->input->post('content'),
                'watermark' => $this->input->post('watermark'),
                'source_image' => $this->input->post('source_image'),
                'source_video' => $this->input->post('source_video'),
                'tags' => $this->input->post('tags'),
                // 'wartawan' => $this->input->post('wartawan'),
                 'hit' => $this->input->post('hit'),
                'status' => $this->input->post('status'),
                'img'                => $filename
                ), array('id' => $id), 'berita');
                $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');  
                redirect(base_url() . 'manage_berita', 'refresh');
            } else
            {
                $this->DataBerita->updateData(array(
                'date' => $this->input->post('date'),
                'show_date' => $this->input->post('show_date'),
                'id_category' => $this->input->post('id_category'),
                'title' => $this->input->post('title'),
                'subtitle' => $this->input->post('subtitle'),
                'content' => $this->input->post('content'),
                'watermark' => $this->input->post('watermark'),
                'source_image' => $this->input->post('source_image'),
                'source_video' => $this->input->post('source_video'),
                'tags' => $this->input->post('tags'),
                // 'wartawan' => $this->input->post('wartawan'),
                 'hit' => $this->input->post('hit'),
                'status' => $this->input->post('status')
                ), array('id' => $id), 'berita');
                $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');  
                redirect(base_url() . 'manage_berita', 'refresh');
            }
        } else
        {
            $data['datas'] = $this->DataBerita->getAllData('kategori');
            $data['coba'] = $this->DataBerita->getAllData('wartawan');
            $data['berita'] = $this->DataBerita->getData('400','0','berita');
            $data['data'] = $this->DataBerita->getSpecificData('berita', array('id' => $id));
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_berita/edit_berita', $data);
            $this->template->publish();
        }
    }

    protected function berita_submit()
    {
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('show_date', 'Show Date', 'required');
        $this->form_validation->set_rules('id_category', 'Category', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        // $this->form_validation->set_rules('wartawan', 'Wartawan', 'required');
        // $this->form_validation->set_rules('hit', 'Hit', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == false)
        {
            $this->session->set_flashdata('error', validation_errors('<p class="alert alert-danger">', '</p>'));
             $this->setBeritaFlash();
            redirect(current_url() . "#errors");
        } else
        {
            return $this->do_upload();
        }
    }
    
    
     public function setBeritaFlash()
    {
        $this->session->set_flashdata('date', $this->input->post('date'));
        $this->session->set_flashdata('show_date', $this->input->post('show_date'));
         $this->session->set_flashdata('id_category', $this->input->post('id_category'));
        $this->session->set_flashdata('subtitle', $this->input->post('subtitle'));
        $this->session->set_flashdata('content', $this->input->post('content'));
        $this->session->set_flashdata('source_image', $this->input->post('source_image'));
        $this->session->set_flashdata('source_video', $this->input->post('source_video'));
        $this->session->set_flashdata('tags', $this->input->post('tags'));
        $this->session->set_flashdata('hit', $this->input->post('hit'));
        $this->session->set_flashdata('status', $this->input->post('status'));
        
    }

    public function do_upload()
    {
        $link = str_replace('-','',$this->input->post('title'));
			
    	$link = str_replace(' ','',$link);
    	
    	$link = str_replace('','',$link);
    	
    	$link = str_replace(',','',$link);
    	
    	$link = str_replace('"','',$link);
    			
    	$link = str_replace("'","",$link);
    	
    	$link = str_replace('%','',$link);
    	
    	$link = str_replace('&','',$link);
    	
    	$link = str_replace('/','',$link);
    	
    	$link = str_replace('(','',$link);
    		
    	$link = str_replace('.','',$link);
    	$link = str_replace(')','',$link);
    	
        if ($_FILES['foto']['size'] <= 0)
        {
            return null;
        }
        $config['upload_path'] = './uploads/berita/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '204008';
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        $config['file_name'] = 'berita_' . $link;
        $config['overwrite'] = true;
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('foto'))
        {
            $this->session->set_flashdata('error', $this->upload->display_errors('<p class="alert alert-danger">', '</p>'));
            redirect(current_url() . "#errors");
        } else
        {
            $upload_data = $this->upload->data();
            // return $upload_data['file_name'];
            $file_name = $upload_data['file_name'];

            if($this->input->post('watermark') == true)
            {
                //Resize Image code
                $imgConfig = array();
                $imgConfig['image_library']  = 'gd2';
                $imgConfig['source_image']   = './uploads/berita/'.$file_name;
                $imgConfig['create_thumb']     = FALSE;
                $imgConfig['maintain_ratio']   = TRUE;
                $imgConfig['new_image']     = './uploads/berita/'.$file_name;
                $imgConfig['width']            = 750;
                $imgConfig['height']           = 500; 
                $this->load->library('image_lib', $imgConfig);
                $this->image_lib->initialize($imgConfig);
                if (!$this->image_lib->resize()){  
                    echo $this->image_lib->display_errors();
                } 

                 //Overlay watermark image
                $imgConfig = array();
                $imgConfig['image_library'] = 'GD2';
                $imgConfig['source_image'] = './uploads/berita/'.$file_name;
                $imgConfig['wm_overlay_path'] = './public/images/watermark3.png';
                $imgConfig['wm_type'] = 'overlay';
                $this->load->library('image_lib', $imgConfig);
                $this->image_lib->initialize($imgConfig);
                $this->image_lib->watermark();

            }

            return $file_name;
        }
    }
    
    public function getTinyUrl($url) {
        $link='http://tinyurl.com/api-create.php?url='.$url;
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$link);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $hasil=curl_exec($ch);
        curl_close($ch);
        return $hasil;
    }
}