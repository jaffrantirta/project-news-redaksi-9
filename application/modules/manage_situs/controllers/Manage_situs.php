<?php

/**
 * User: Wawang Saptawan
 * Date: 22/10/2018
 */
class Manage_situs extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataSitus');
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
            $this->initialize_pagination(base_url("manage_situs/index"), 'situs', 'DataSitus', null);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['datas'] = $this->DataSitus
                ->getData(
                    $this->numOfContentsPerPage,
                    $page, 'situs');
            $data['page'] = $page;
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_situs/situs', $data);
            $this->template->publish();
        }
    }

    public function search()
    {
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $searchCache = $this->session->flashdata('search');
        $search = $this->input->post('search');
        $search = isset($search) ? $search : $searchCache;
        $this->initialize_pagination(base_url("manage_situs/search"),
            'situs',
            'DataSitus',
            $this->DataSitus->countSearchData(
                'situs',
                null,
                null,
                'title LIKE \'%' . $search . '%\'')
        );
        $data['datas'] = $this->DataSitus
            ->searchData(
                $this->numOfContentsPerPage,
                $page,
                'situs',
                null,
                null,
                'title LIKE \'%' . $search . '%\' OR title LIKE \'%' . $search . '%\''
            );
        $data['search'] = $search;
        $data['page'] = $page;
        $this->template->set_template('backoffice/template');
        $this->template->content->view('manage_situs/situs', $data);
        $this->template->publish();
    }

    public function tambahSitus()
    {
        if ($this->isPost())
        {
            $filename = $this->situs_submit();
            $this->DataSitus->addData('situs', array(
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'url' => $this->input->post('url'),
                'status' => $this->input->post('status')
            ));
            $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil tambah data</p>
                </div>');  
            redirect(base_url() . 'manage_situs', 'refresh');
        } else
        {
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_situs/tambah_situs');
            $this->template->publish();
        }
    }

    public function deleteSitus($id)
    {
        $this->DataSitus->deleteData('situs', array('id' => $id));
        $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil delete data</p>
                </div>');  
        redirect(base_url() . 'manage_situs', 'refresh');
    }

    public function editSitus($id)
    {
        if ($this->isPost())
        {
            $filename = $this->situs_submit();
            if (isset($filename))
            {
                $this->DataSitus->updateData(array(
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'url' => $this->input->post('url'),
                'status' => $this->input->post('status')
                ), array('id' => $id), 'situs');
                $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');  
                redirect(base_url() . 'manage_situs', 'refresh');
            } else
            {
                $this->DataSitus->updateData(array(
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'url' => $this->input->post('url'),
                'status' => $this->input->post('status')
                ), array('id' => $id), 'situs');
                $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');  
                redirect(base_url() . 'manage_situs', 'refresh');
            }
        } else
        {
            $data['data'] = $this->DataSitus->getSpecificData('situs', array('id' => $id));
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_situs/edit_situs', $data);
            $this->template->publish();
        }
    }

    protected function situs_submit()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
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