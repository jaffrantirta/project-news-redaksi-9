<?php

/**
 * User: Wawang Saptawan
 * Date: 22/10/2018
 */
class Manage_about extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('DataBerita');
        $this->load->model('DataAbout');
        $this->load->library('ckeditor');
        $this->load->library('ckfinder');
        $this->ckeditor->basePath = '/new/public/ckeditor/';
        $this->ckfinder->SetupCKEditor($this->ckeditor, '/public/ckfinder/');
        $this->numOfContentsPerPage = 50;
        if (empty($this->session->userdata('logged_in')))
            redirect(base_url() . 'backoffice');
    }

    public function index()
    {
        // $search = $this->input->post('search');
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        // if (isset($search))
        // {
        //     $this->search();
        // } else
        {
            $this->initialize_pagination(base_url("Manage_about/index"), 'about', 'DataAbout', null);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            
            
            $data['datas'] = $this->DataAbout->getAllData('about');
            $data['page'] = $page;
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_about/about', $data);
            $this->template->publish();
        }
    }

   //  public function search()
   //  {
   //      $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
   //      $searchCache = $this->session->flashdata('search');
   //      $search = $this->input->post('search');
   //      $search = isset($search) ? $search : $searchCache;
   //      $this->initialize_pagination(base_url("manage_about/search"),
   //          'about',
   //          'DataAbout',
   //          $this->DataAbout->countSearchData(
   //              'about',
   //              null,
   //              null,
   //              'title LIKE \'%' . $search . '%\'')
   //      );
   //      $data['datas'] = $this->DataAbout
   //          ->searchData(
   //              $this->numOfContentsPerPage,
   //              $page,
   //              'about',
   //              null,
   //              null,
   //              'title LIKE \'%' . $search . '%\' OR title LIKE \'%' . $search . '%\''
   //          );
   //      $data['search'] = $search;
   //      $data['page'] = $page;
   //      $this->template->set_template('backoffice/template');
   //      $this->template->content->view('manage_about/about', $data);
   //      $this->template->publish();
   //  }

    public function tambahAbout()
    {
        if ($this->isPost())
        {
            $this->DataAbout->addData('about', array(
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'hit' => $this->input->post('hit')
            ));
            $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil tambah data</p>
                </div>');  
            redirect(base_url() . 'manage_about', 'refresh');
        } else
        {
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_about/tambah_about');
            $this->template->publish();
        }
    }

   public function deleteAbout($id)
    {
        $this->DataAbout->deleteData('about', array('id' => $id));
        $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil delete data</p>
                </div>');  
        redirect(base_url() . 'manage_about', 'refresh');
    }

    public function editAbout($id)
    {
        if ($this->isPost())
        {
            
            $this->DataAbout->updateData(array(
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'hit' => $this->input->post('hit')
            ), array('id' => $id), 'about');
             $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');  
            redirect(base_url() . 'manage_about', 'refresh');
        } else
        {
            $data['data'] = $this->DataAbout->getSpecificData('about', array('id' => $id));
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_about/edit_about', $data);
            $this->template->publish();
        }
    }
}