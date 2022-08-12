<?php

/**
 * User: Wawang Saptawan
 * Date: 22/10/2018
 */
class Manage_banner extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataBanner');
        $this->load->library('ckeditor');
        $this->load->library('ckfinder');
        $this->ckeditor->basePath = '/new/public/ckeditor/';
        $this->ckfinder->SetupCKEditor($this->ckeditor, '/new/public/ckfinder/');
        $this->numOfContentsPerPage = 5;
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
            $this->initialize_pagination(base_url("manage_banner/index"), 'banner', 'DataBanner', null);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['datas'] = $this->DataBanner
                ->getData(
                    $this->numOfContentsPerPage,
                    $page, 'banner');
            $data['page'] = $page;
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_banner/banner', $data);
            $this->template->publish();
        }
    }

    public function search()
    {
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $searchCache = $this->session->flashdata('search');
        $search = $this->input->post('search');
        $search = isset($search) ? $search : $searchCache;
        $this->initialize_pagination(base_url("manage_banner/search"),
            'banner',
            'DataBanner',
            $this->DataBanner->countSearchData(
                'banner',
                null,
                null,
                'position LIKE \'%' . $search . '%\'')
        );
        $data['datas'] = $this->DataBanner
            ->searchData(
                $this->numOfContentsPerPage,
                $page,
                'banner',
                null,
                null,
                'position LIKE \'%' . $search . '%\' OR position LIKE \'%' . $search . '%\''
            );
        $data['search'] = $search;
        $data['page'] = $page;
        $this->template->set_template('backoffice/template');
        $this->template->content->view('manage_banner/banner', $data);
        $this->template->publish();
    }

    public function tambahBanner()
    {
        if ($this->isPost())
        {
            $filename = $this->banner_submit();
            $this->DataBanner->addData('banner', array(
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date'),
                'position' => $this->input->post('position'),
                'title' => $this->input->post('title'),
                'url' => $this->input->post('url'),
                'hit' => $this->input->post('hit'),
                'status' => $this->input->post('status'),
                'img'                => $filename
            ));
            $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil tamabah banner</p>
                </div>');  
            redirect(base_url() . 'manage_banner', 'refresh');
        } else
        {
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_banner/tambah_banner');
            $this->template->publish();
        }
    }

    public function deleteBanner($id)
    {
        $this->DataBanner->deleteData('banner', array('id' => $id));
        $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil delete banner</p>
                </div>');  
        redirect(base_url() . 'manage_banner', 'refresh');
    }

    public function editBanner($id)
    {
        if ($this->isPost())
        {
            $filename = $this->banner_submit();
            if (isset($filename))
            {
                $this->DataBanner->updateData(array(
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date'),
                'position' => $this->input->post('position'),
                'title' => $this->input->post('title'),
                'url' => $this->input->post('url'),
                'hit' => $this->input->post('hit'),
                'status' => $this->input->post('status'),
                'img'                => $filename
                ), array('id' => $id), 'banner');
                $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit banner</p>
                </div>');  
                redirect(base_url() . 'manage_banner', 'refresh');
            } else
            {
                $this->DataBanner->updateData(array(
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date'),
                'position' => $this->input->post('position'),
                'title' => $this->input->post('title'),
                'url' => $this->input->post('url'),
                'hit' => $this->input->post('hit'),
                'status' => $this->input->post('status')
                ), array('id' => $id), 'banner');
                $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit banner</p>
                </div>');  
                redirect(base_url() . 'manage_banner', 'refresh');
            }
        } else
        {
            $data['data'] = $this->DataBanner->getSpecificData('banner', array('id' => $id));
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_banner/edit_banner', $data);
            $this->template->publish();
        }
    }

    protected function banner_submit()
    {
        $this->form_validation->set_rules('start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('end_date', 'End Date', 'required');
        $this->form_validation->set_rules('position', 'Position', 'required');
        // $this->form_validation->set_rules('title', 'Title', 'required');
        // $this->form_validation->set_rules('url', 'URL', 'required');
        // $this->form_validation->set_rules('hit', 'Hit', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == false)
        {
            $this->session->set_flashdata('error', validation_errors('<p class="alert alert-danger">', '</p>'));
            redirect(current_url() . "#errors");
        } else
        {
            return $this->do_upload();
        }
    }

    public function do_upload()
    {
        if ($_FILES['foto']['size'] <= 0)
        {
            return null;
        }
        $config['upload_path'] = './uploads/banner/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '200048';
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        $config['file_name'] = 'banner_' . str_replace(' ', '', $this->input->post('title'));
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