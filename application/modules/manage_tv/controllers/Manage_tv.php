<?php

/**
 * User: Wawang Saptawan
 * Date: 22/10/2018
 */
class Manage_tv extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataTv');
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
            $this->initialize_pagination(base_url("manage_tv/index"), 'tv', 'DataTv', null);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['datas'] = $this->DataTv
                ->getData(
                    $this->numOfContentsPerPage,
                    $page, 'tv');
            $data['page'] = $page;
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_tv/tv', $data);
            $this->template->publish();
        }
    }

    public function search()
    {
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $searchCache = $this->session->flashdata('search');
        $search = $this->input->post('search');
        $search = isset($search) ? $search : $searchCache;
        $this->initialize_pagination(base_url("manage_tv/search"),
            'tv',
            'DataTv',
            $this->DataTv->countSearchData(
                'tv',
                null,
                null,
                'title LIKE \'%' . $search . '%\'')
        );
        $data['datas'] = $this->DataTv
            ->searchData(
                $this->numOfContentsPerPage,
                $page,
                'tv',
                null,
                null,
                'title LIKE \'%' . $search . '%\' OR title LIKE \'%' . $search . '%\''
            );
        $data['search'] = $search;
        $data['page'] = $page;
        $this->template->set_template('backoffice/template');
        $this->template->content->view('manage_tv/tv', $data);
        $this->template->publish();
    }

    public function tambahTv()
    {
        if ($this->isPost())
        {
            $filename = $this->tv_submit();
            $this->DataTv->addData('tv', array(
                'date' => $this->input->post('date'),
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'source' => $this->input->post('source'),
                'hit' => $this->input->post('hit'),
                'status' => $this->input->post('status')
            ));
            $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil tambah data</p>
                </div>');  
            redirect(base_url() . 'manage_tv', 'refresh');
        } else
        {
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_tv/tambah_tv');
            $this->template->publish();
        }
    }

   public function deleteTv($id)
    {
        $this->DataTv->deleteData('tv', array('id' => $id));
        $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil delete data</p>
                </div>');  
        redirect(base_url() . 'manage_tv', 'refresh');
    }

    public function editTv($id)
    {
        if ($this->isPost())
        {
            $filename = $this->tv_submit();
            if (isset($filename))
            {
                $this->DataTv->updateData(array(
                    'date' => $this->input->post('date'),
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'hit' => $this->input->post('hit'),
                'source' => $this->input->post('source'),
                'status' => $this->input->post('status')
                ), array('id' => $id), 'tv');
                $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');  
                redirect(base_url() . 'manage_tv', 'refresh');
            } else
            {
                $this->DataTv->updateData(array(
                    'date' => $this->input->post('date'),
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'hit' => $this->input->post('hit'),
                'source' => $this->input->post('source'),
                'status' => $this->input->post('status')
                ), array('id' => $id), 'tv');
                $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');  
                redirect(base_url() . 'manage_tv', 'refresh');
            }
        } else
        {
            $data['data'] = $this->DataTv->getSpecificData('tv', array('id' => $id));
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_tv/edit_tv', $data);
            $this->template->publish();
        }
    }

    protected function tv_submit()
    {
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        $this->form_validation->set_rules('source', 'Source', 'required');
        $this->form_validation->set_rules('hit', 'Hit', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == false)
        {
            $this->session->set_flashdata('date', $this->input->post('date'));
            $this->session->set_flashdata('title', $this->input->post('title'));
            $this->session->set_flashdata('content', $this->input->post('content'));
            $this->session->set_flashdata('source', $this->input->post('source'));
            $this->session->set_flashdata('status', $this->input->post('status'));

            $this->session->set_flashdata('error', validation_errors('<p class="alert alert-danger">', '</p>'));
             $this->setTvFlash();
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