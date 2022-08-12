<?php

/**
 * User: Wawang Saptawan
 * Date: 22/10/2018
 */
class Manage_kontak extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataKontak');
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
            $this->initialize_pagination(base_url("manage_kontak/index"), 'kontak', 'DataKontak', null);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['datas'] = $this->DataKontak
                ->getData(
                    $this->numOfContentsPerPage,
                    $page, 'kontak');
            $data['page'] = $page;
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_kontak/kontak', $data);
            $this->template->publish();
        }
    }

    public function search()
    {
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $searchCache = $this->session->flashdata('search');
        $search = $this->input->post('search');
        $search = isset($search) ? $search : $searchCache;
        $this->initialize_pagination(base_url("manage_kontak/search"),
            'kontak',
            'DataKontak',
            $this->DataKontak->countSearchData(
                'kontak',
                null,
                null,
                'name LIKE \'%' . $search . '%\'')
        );
        $data['datas'] = $this->DataKontak
            ->searchData(
                $this->numOfContentsPerPage,
                $page,
                'kontak',
                null,
                null,
                'name LIKE \'%' . $search . '%\' OR name LIKE \'%' . $search . '%\''
            );
        $data['search'] = $search;
        $data['page'] = $page;
        $this->template->set_template('backoffice/template');
        $this->template->content->view('manage_kontak/kontak', $data);
        $this->template->publish();
    }

    public function tambahKontak()
    {
        if ($this->isPost())
        {
            $filename = $this->kontak_submit();
            $this->DataKontak->addData('kontak', array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'status' => $this->input->post('status')
            ));
            $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil tambah kontak</p>
                </div>');  
            redirect(base_url() . 'manage_kontak', 'refresh');
        } else
        {
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_kontak/tambah_kontak');
            $this->template->publish();
        }
    }

    public function deleteKontak($id)
    {
        $this->DataKontak->deleteData('kontak', array('id' => $id));
        $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil delete kontak</p>
                </div>');  
        redirect(base_url() . 'manage_kontak', 'refresh');
    }

    public function editKontak($id)
    {
        if ($this->isPost())
        {
            $filename = $this->kontak_submit();
            if (isset($filename))
            {
                $this->DataKontak->updateData(array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'status' => $this->input->post('status')
                ), array('id' => $id), 'kontak');
                $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit kontak</p>
                </div>');  
                redirect(base_url() . 'manage_kontak', 'refresh');
            } else
            {
                $this->DataKontak->updateData(array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'status' => $this->input->post('status')
                ), array('id' => $id), 'kontak');
                $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit kontak</p>
                </div>');  
                redirect(base_url() . 'manage_kontak', 'refresh');
            }
        } else
        {
            $data['data'] = $this->DataKontak->getSpecificData('kontak', array('id' => $id));
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_kontak/edit_kontak', $data);
            $this->template->publish();
        }
    }

    protected function kontak_submit()
    {
       $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == false)
        {
            $this->session->set_flashdata('error', validation_errors('<p class="alert alert-danger">', '</p>'));
            $this->setKontakFlash();
            redirect(current_url() . "#errors");
        
        }
    }
    
     public function setKontakFlash()
    {
        $this->session->set_flashdata('name', $this->input->post('name'));
        $this->session->set_flashdata('email', $this->input->post('email'));
        $this->session->set_flashdata('status', $this->input->post('status'));
        
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
}