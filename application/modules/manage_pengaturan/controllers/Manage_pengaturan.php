<?php

/**
 * User: Wawang Saptawan
 * Date: 22/10/2018
 */
class Manage_pengaturan extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataPengaturan');
        $this->load->library('ckeditor');
        $this->load->library('ckfinder');
        $this->ckeditor->basePath = '/new/public/ckeditor/';
        $this->ckfinder->SetupCKEditor($this->ckeditor, '/new/public/ckfinder/');
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
            $this->initialize_pagination(base_url("manage_pengaturan/index"), 'pengaturan', 'DataPengaturan', null);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['datas'] = $this->DataPengaturan
                ->getData(
                    $this->numOfContentsPerPage,
                    $page, 'pengaturan');
            $data['page'] = $page;
            $data['data'] = $this->DataPengaturan->getSpecificData('pengaturan', array('id' => '1'));
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_pengaturan/pengaturan', $data);
            $this->template->publish();
        }
    }

    public function search()
    {
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $searchCache = $this->session->flashdata('search');
        $search = $this->input->post('search');
        $search = isset($search) ? $search : $searchCache;
        $this->initialize_pagination(base_url("manage_pengaturan/search"),
            'pengaturan',
            'DataPengaturan',
            $this->DataPengaturan->countSearchData(
                'pengaturan',
                null,
                null,
                'title LIKE \'%' . $search . '%\'')
        );
        $data['datas'] = $this->DataPengaturan
            ->searchData(
                $this->numOfContentsPerPage,
                $page,
                'pengaturan',
                null,
                null,
                'title LIKE \'%' . $search . '%\' OR title LIKE \'%' . $search . '%\''
            );
        $data['search'] = $search;
        $data['page'] = $page;
        $this->template->set_template('backoffice/template');
        $this->template->content->view('manage_pengaturan/pengaturan', $data);
        $this->template->publish();
    }

    public function tambahPengaturan()
    {
        if ($this->isPost())
        {
            $filename = $this->pengaturan_submit();
            $this->DataPengaturan->addData('pengaturan', array(
                'header'                => $filename,
                'background'                => $filename
            ));
            redirect(base_url() . 'manage_pengaturan', 'refresh');
        } else
        {
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_pengaturan/tambah_pengaturan');
            $this->template->publish();
        }
    }

    public function deletePengaturan($id)
    {
        $this->DataPengaturan->deleteData('pengaturan', array('id' => $id));
        $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil delete data</p>
                </div>');  
        redirect(base_url() . 'manage_pengaturan', 'refresh');
    }

    public function editPengaturan($id)
    {
        if ($this->isPost())
        {
            $filename = $this->pengaturan_submit();
            if (isset($filename))
            {
                $this->DataArtikel->updateData(array(
                'company' => $this->input->post('company'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone'),
                'fax' => $this->input->post('fax'),
                'email' => $this->input->post('email'),
                'website' => $this->input->post('website'),
                'ym' => $this->input->post('ym'),
                'map' => $this->input->post('map'),
                'skype' => $this->input->post('skype'),
                'widget_twitter' => $this->input->post('widget_twitter'),
                'widget_facebook' => $this->input->post('widget_facebook'),
                'copyright' => $this->input->post('copyright'),
                'meta_title' => $this->input->post('meta_title'),
                'meta_description' => $this->input->post('meta_description'),
                'meta_keyword' => $this->input->post('meta_keyword'),
                'header'                => $filename
                ), array('id' => $id), 'pengaturan');
                $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');  
                redirect(base_url() . 'manage_pengaturan', 'refresh');
            } else
            {
                $this->DataPengaturan->updateData(array(
                'company' => $this->input->post('company'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone'),
                'fax' => $this->input->post('fax'),
                'email' => $this->input->post('email'),
                'website' => $this->input->post('website'),
                'ym' => $this->input->post('ym'),
                'map' => $this->input->post('map'),
                'skype' => $this->input->post('skype'),
                'widget_twitter' => $this->input->post('widget_twitter'),
                'widget_facebook' => $this->input->post('widget_facebook'),
                'copyright' => $this->input->post('copyright'),
                'meta_title' => $this->input->post('meta_title'),
                'meta_description' => $this->input->post('meta_description'),
                'meta_keyword' => $this->input->post('meta_keyword')
                ), array('id' => $id), 'pengaturan');
                $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');  
                redirect(base_url() . 'manage_pengaturan', 'refresh');
            }
        } else
        {
            $data['data'] = $this->DataPengaturan->getSpecificData('pengaturan', array('id' => $id));
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_pengaturan/pengaturan', $data);
            $this->template->publish();
        }
    }
    
    public function editFoto($id)
    {
        if ($this->isPost())
        {
            $filename = $this->foto_submit();
            if (isset($filename))
            {
                $this->DataPengaturan->updateData(array(
                'header'                => $filename
                ), array('id' => $id), 'pengaturan');
                $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit header</p>
                </div>');  
                redirect(base_url() . 'manage_pengaturan', 'refresh');
            } else
            {
                $this->form_validation->set_rules('header', 'Header', 'required');
        if ($this->form_validation->run() == false)
        {
            $this->session->set_flashdata('error', validation_errors('<p class="alert alert-danger">', '</p>'));
            redirect(current_url() . "#errors");
        }
            }
        } else
        {
            $data['data'] = $this->DataPengaturan->getSpecificData('pengaturan', array('id' => $id));
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_pengaturan/pengaturan', $data);
            $this->template->publish();
        }
    }
    
    protected function pengaturan_submit()
    {
        $this->form_validation->set_rules('company', 'Company', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('fax', 'Fax', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('website', 'Website', 'required');
        $this->form_validation->set_rules('ym', 'Yahoo Messanger', 'required');
        $this->form_validation->set_rules('map', 'Map', 'required');
        $this->form_validation->set_rules('skype', 'Skype', 'required');
        $this->form_validation->set_rules('widget_twitter', 'Widget Twitter', 'required');
        $this->form_validation->set_rules('widget_facebook', 'Widget Facebook', 'required');
        $this->form_validation->set_rules('copyright', 'Copyright', 'required');
        $this->form_validation->set_rules('meta_title', 'Meta Title', 'required');
        $this->form_validation->set_rules('meta_description', 'Meta Description', 'required');
        $this->form_validation->set_rules('meta_keyword', 'Meta Keyword', 'required');
        if ($this->form_validation->run() == false)
        {
            $this->session->set_flashdata('error', validation_errors('<p class="alert alert-danger">', '</p>'));
            redirect(current_url() . "#errors");
        }
    }
    
    public function editBackground($id)
    {
        if ($this->isPost())
        {
            $filename = $this->background_submit();
            if (isset($filename))
            {
                $this->DataPengaturan->updateData(array(
                'background'                => $filename
                ), array('id' => $id), 'pengaturan');
                $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit background</p>
                </div>');  
                redirect(base_url() . 'manage_pengaturan', 'refresh');
            } else
            {
                $this->form_validation->set_rules('background', 'Background', 'required');
        if ($this->form_validation->run() == false)
        {
            $this->session->set_flashdata('error', validation_errors('<p class="alert alert-danger">', '</p>'));
            redirect(current_url() . "#errors");
        }}
        } else
        {
            $data['data'] = $this->DataPengaturan->getSpecificData('pengaturan', array('id' => $id));
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_pengaturan/pengaturan', $data);
            $this->template->publish();
        }
    }

    protected function foto_submit()
    {
        return $this->do_upload();
    }
    protected function background_submit()
    {
            return $this->di_upload();
    }

    public function do_upload()
    {
        if ($_FILES['foto']['size'] <= 0)
        {
            return null;
        }
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        $config['file_name'] = 'banner_' . str_replace(' ', '', $this->input->post('nama'));
        $config['overwrite'] = true;
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('foto'))
        {
            $this->session->set_flashdata('error', $this->upload->display_errors('<p class="alert alert-danger">', '</p>'));
            redirect(current_url() . "#errors");
        } else
        {
            $upload_data = $this->upload->data();

            return $upload_data['file_name'];
        }
        
    }
    public function di_upload()
    {
        if ($_FILES['background']['size'] <= 0)
        {
            return null;
        }
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        $config['file_name'] = 'background_' . str_replace(' ', '', $this->input->post('nama'));
        $config['overwrite'] = true;
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('background'))
        {
            $this->session->set_flashdata('error', $this->upload->display_errors('<p class="alert alert-danger">', '</p>'));
            redirect(current_url() . "#errors");
        } else
        {
            $upload_data = $this->upload->data();

            return $upload_data['file_name'];
        }
        
    }
}