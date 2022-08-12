<?php

/**
 * User: Wawang Saptawan
 * Date: 22/10/2018
 */
class Manage_kategori extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataKategori');
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
            $this->initialize_pagination(base_url("manage_kategori/index"), 'kategori', 'DataKategori', null);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['datas'] = $this->DataKategori
                ->getData(
                    $this->numOfContentsPerPage,
                    $page, 'kategori');
            $data['page'] = $page;
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_kategori/kategori', $data);
            $this->template->publish();
        }
    }

    public function search()
    {
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $searchCache = $this->session->flashdata('search');
        $search = $this->input->post('search');
        $search = isset($search) ? $search : $searchCache;
        $this->initialize_pagination(base_url("manage_kategori/search"),
            'kategori',
            'DataKategori',
            $this->DataKategori->countSearchData(
                'kategori',
                null,
                null,
                'title_ LIKE \'%' . $search . '%\'')
        );
        $data['datas'] = $this->DataKategori
            ->searchData(
                $this->numOfContentsPerPage,
                $page,
                'kategori',
                null,
                null,
                'title_ LIKE \'%' . $search . '%\' OR title_ LIKE \'%' . $search . '%\''
            );
        $data['search'] = $search;
        $data['page'] = $page;
        $this->template->set_template('backoffice/template');
        $this->template->content->view('manage_kategori/kategori', $data);
        $this->template->publish();
    }

    public function tambahKategori()
    {
        if ($this->isPost())
        {
            $filename = $this->kategori_submit();
            $this->DataKategori->addData('kategori', array(
                'title_' => $this->input->post('title_'),
                'status' => $this->input->post('status')
            ));
            $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil tambah data</p>
                </div>');  
            redirect(base_url() . 'manage_kategori', 'refresh');
        } else
        {
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_kategori/tambah_kategori');
            $this->template->publish();
        }
    }

    public function deleteKategori($id)
    {
        $this->DataKategori->deleteData('kategori', array('id' => $id));
        $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil delete data</p>
                </div>');  
        redirect(base_url() . 'manage_kategori', 'refresh');
    }

    public function editKategori($id)
    {
        if ($this->isPost())
        {
            $filename = $this->kategori_submit();
            if (isset($filename))
            {
                $this->DataKategori->updateData(array(
                'title_' => $this->input->post('title_'),
                'status' => $this->input->post('status')
                ), array('id' => $id), 'kategori');
                $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');  
                redirect(base_url() . 'manage_kategori', 'refresh');
            } else
            {
                $this->DataKategori->updateData(array(
                'title_' => $this->input->post('title_'),
                'status' => $this->input->post('status')
                ), array('id' => $id), 'kategori');
                $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');  
                redirect(base_url() . 'manage_kategori', 'refresh');
            }
        } else
        {
            $data['data'] = $this->DataKategori->getSpecificData('kategori', array('id' => $id));
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_kategori/edit_kategori', $data);
            $this->template->publish();
        }
    }

    protected function kategori_submit()
    {
        $this->form_validation->set_rules('title_', 'Title', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == false)
        {
            $this->session->set_flashdata('error', validation_errors('<p class="alert alert-danger">', '</p>'));
             $this->setKategoriFlash();
            redirect(current_url() . "#errors");
        
        }
    }
    
     public function setKategoriFlash()
    {
        $this->session->set_flashdata('title_', $this->input->post('title_'));
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