<?php

/**
 * User: Wawang Saptawan
 * Date: 22/10/2018
 */
class Manage_kritik extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataKritik');
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
            $this->initialize_pagination(base_url("manage_kritik/index"), 'kritik', 'DataKritik', null);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['datas'] = $this->DataKritik
                ->getData(
                    $this->numOfContentsPerPage,
                    $page, 'kritik');
            $data['page'] = $page;
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_kritik/kritik', $data);
            $this->template->publish();
        }
    }

    public function search()
    {
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $searchCache = $this->session->flashdata('search');
        $search = $this->input->post('search');
        $search = isset($search) ? $search : $searchCache;
        $this->initialize_pagination(base_url("manage_kritik/search"),
            'kritik',
            'DataKritik',
            $this->DataKritik->countSearchData(
                'kritik',
                null,
                null,
                'title LIKE \'%' . $search . '%\'')
        );
        $data['datas'] = $this->DataKritik
            ->searchData(
                $this->numOfContentsPerPage,
                $page,
                'kritik',
                null,
                null,
                'title LIKE \'%' . $search . '%\' OR title LIKE \'%' . $search . '%\''
            );
        $data['search'] = $search;
        $data['page'] = $page;
        $this->template->set_template('backoffice/template');
        $this->template->content->view('manage_kritik/kritik', $data);
        $this->template->publish();
    }

    public function tambahKritik()
    {
        if ($this->isPost())
        {
            $filename = $this->kritik_submit();
            $this->DataKritik->addData('kritik', array(
                'date' => $this->input->post('date'),
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'respon' => $this->input->post('respon'),
                'hit' => $this->input->post('hit'),
                'respon_date' => $this->input->post('respon_date'),
                'status' => $this->input->post('status')
            ));
            $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil tambah data</p>
                </div>');  
            redirect(base_url() . 'manage_kritik', 'refresh');
        } else
        {
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_kritik/tambah_kritik');
            $this->template->publish();
        }
    }

    public function deleteKritik($id)
    {
        $this->DataKritik->deleteData('kritik', array('id' => $id));
        $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil delete data</p>
                </div>');  
        redirect(base_url() . 'manage_kritik', 'refresh');
    }

    public function editKritik($id)
    {
        if ($this->isPost())
        {
            $filename = $this->kritik_submit();
            if (isset($filename))
            {
                $this->DataKritik->updateData(array(
                'date' => $this->input->post('date'),
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'respon' => $this->input->post('respon'),
                'hit' => $this->input->post('hit'),
                'respon_date' => $this->input->post('respon_date'),
                'status' => $this->input->post('status')
                ), array('id' => $id), 'kritik');
                $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');  
                redirect(base_url() . 'manage_kritik', 'refresh');
            } else
            {
                $this->DataKritik->updateData(array(
                'date' => $this->input->post('date'),
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'respon' => $this->input->post('respon'),
                'hit' => $this->input->post('hit'),
                'respon_date' => $this->input->post('respon_date'),
                'status' => $this->input->post('status')
                ), array('id' => $id), 'kritik');
                $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');  
                redirect(base_url() . 'manage_kritik', 'refresh');
            }
        } else
        {
            $data['data'] = $this->DataKritik->getSpecificData('kritik', array('id' => $id));
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_kritik/edit_kritik', $data);
            $this->template->publish();
        }
    }

    protected function kritik_submit()
    {
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        $this->form_validation->set_rules('hit', 'Hit', 'required');
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