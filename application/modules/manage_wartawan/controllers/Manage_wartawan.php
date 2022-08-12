<?php

/**
 * User: Wawang Saptawan
 * Date: 22/10/2018
 */
class Manage_wartawan extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataWartawan');
        $this->load->library('ckeditor');
        $this->load->library('ckfinder');
        $this->load->library('session');
        $this->load->helper('form');
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
            $this->initialize_pagination(base_url("manage_wartawan/index"), 'wartawan', 'DataWartawan', null);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['datas'] = $this->DataWartawan
                ->getData(
                    $this->numOfContentsPerPage,
                    $page, 'wartawan');
            $data['page'] = $page;
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_wartawan/wartawan', $data);
            $this->template->publish();
        }
    }

    public function search()
    {
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $searchCache = $this->session->flashdata('search');
        $search = $this->input->post('search');
        $search = isset($search) ? $search : $searchCache;
        $this->initialize_pagination(base_url("manage_wartawan/search"),
            'wartawan',
            'DataWartawan',
            $this->DataWartawan->countSearchData(
                'wartawan',
                null,
                null,
                'name LIKE \'%' . $search . '%\'')
        );
        $data['datas'] = $this->DataWartawan
            ->searchData(
                $this->numOfContentsPerPage,
                $page,
                'wartawan',
                null,
                null,
                'name LIKE \'%' . $search . '%\' OR alias LIKE \'%' . $search . '%\''
            );
        $data['search'] = $search;
        $data['page'] = $page;
        $this->template->set_template('backoffice/template');
        $this->template->content->view('manage_wartawan/wartawan', $data);
        $this->template->publish();
    }

    public function tambahWartawan()
    {
        if ($this->isPost())
        {
            $filename = $this->wartawan_submit();
            $this->DataWartawan->addData('wartawan', array(
                'name' => $this->input->post('name'),
                'alias' => $this->input->post('alias')
            ));
            $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil input data</p>
                </div>');  
            redirect(base_url() . 'manage_wartawan', 'refresh');
            
        } else
        {
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_wartawan/tambah_wartawan');
            $this->template->publish();
        }
    }

   public function deleteWartawan($id)
    {
        $this->DataWartawan->deleteData('wartawan', array('id' => $id));
        $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil delete data</p>
                </div>');  
        redirect(base_url() . 'manage_wartawan', 'refresh');
    }

    public function editWartawan($id)
    {
        if ($this->isPost())
        {
            $filename = $this->wartawan_submit();
            if (isset($filename))
            {
                $this->DataWartawan->updateData(array(
               'name' => $this->input->post('name'),
                'alias' => $this->input->post('alias')
                ), array('id' => $id), 'wartawan');
                $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');  
                redirect(base_url() . 'manage_wartawan', 'refresh');
            } else
            {
                $this->DataWartawan->updateData(array(
                'name' => $this->input->post('name'),
                'alias' => $this->input->post('alias')
                ), array('id' => $id), 'wartawan');
                $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');  
                redirect(base_url() . 'manage_wartawan', 'refresh');
            }
        } else
        {
            $data['data'] = $this->DataWartawan->getSpecificData('wartawan', array('id' => $id));
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_wartawan/edit_wartawan', $data);
            $this->template->publish();
        }
    }

    protected function wartawan_submit()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('alias', 'Alias', 'required');
        if ($this->form_validation->run() == false)
        {
            $this->session->set_flashdata('error', validation_errors('<p class="alert alert-danger">', '</p>'));
            redirect(current_url() . "#errors");
        }
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