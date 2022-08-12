<?php

/**
 * User: Wawang Saptawan
 * Date: 22/10/2018
 */
class Manage_media extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataMedia');
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
            $this->initialize_pagination(base_url("manage_media/index"), 'media', 'DataMedia', null);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['datas'] = $this->DataMedia
                ->getData(
                    $this->numOfContentsPerPage,
                    $page, 'media');
            $data['page'] = $page;
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_media/media', $data);
            $this->template->publish();
        }
    }

    public function search()
    {
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $searchCache = $this->session->flashdata('search');
        $search = $this->input->post('search');
        $search = isset($search) ? $search : $searchCache;
        $this->initialize_pagination(base_url("manage_media/search"),
            'media',
            'DataMedia',
            $this->DataMedia->countSearchData(
                'media',
                null,
                null,
                'title LIKE \'%' . $search . '%\'')
        );
        $data['datas'] = $this->DataMedia
            ->searchData(
                $this->numOfContentsPerPage,
                $page,
                'media',
                null,
                null,
                'title LIKE \'%' . $search . '%\' OR title LIKE \'%' . $search . '%\''
            );
        $data['search'] = $search;
        $data['page'] = $page;
        $this->template->set_template('backoffice/template');
        $this->template->content->view('manage_media/media', $data);
        $this->template->publish();
    }

    public function tambahMedia()
    {
        if ($this->isPost())
        {
            $filename = $this->media_submit();
            $this->DataMedia->addData('media', array(
                'name' => $this->input->post('name'),
                'url' => $this->input->post('url'),
                'img'                => $filename
            ));
            $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil tambah data</p>
                </div>');  
            redirect(base_url() . 'manage_media', 'refresh');
        } else
        {
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_media/tambah_media');
            $this->template->publish();
        }
    }

    public function deleteMedia($id)
    {
        $this->DataMedia->deleteData('media', array('id' => $id));
        $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil delete data</p>
                </div>');  
        redirect(base_url() . 'manage_media', 'refresh');
    }

    public function editMedia($id)
    {
        if ($this->isPost())
        {
            $filename = $this->media_submit();
            if (isset($filename))
            {
                $this->DataMedia->updateData(array(
                'name' => $this->input->post('name'),
                'url' => $this->input->post('url'),
                'img'                => $filename
                ), array('id' => $id), 'media');
                $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');  
                redirect(base_url() . 'manage_media', 'refresh');
            } else
            {
                $this->DataMedia->updateData(array(
                'name' => $this->input->post('name'),
                'url' => $this->input->post('url')
                ), array('id' => $id), 'media');
                $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');  
                redirect(base_url() . 'manage_media', 'refresh');
            }
        } else
        {
            $data['data'] = $this->DataMedia->getSpecificData('media', array('id' => $id));
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_media/edit_media', $data);
            $this->template->publish();
        }
    }

    protected function media_submit()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        if ($this->form_validation->run() == false)
        {
            $this->session->set_flashdata('error', validation_errors('<p class="alert alert-danger">', '</p>'));
            $this->setMediaFlash();
            redirect(current_url() . "#errors");
        } else
        {
            return $this->do_upload();
        }
    }
    
     public function setMediaFlash()
    {
        $this->session->set_flashdata('name', $this->input->post('name'));
        $this->session->set_flashdata('url', $this->input->post('url'));
         
        
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
        $config['file_name'] = 'icon_' . str_replace(' ', '', $this->input->post('name'));
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
}