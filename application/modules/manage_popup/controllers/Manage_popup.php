<?php

/**
 * User: Wawang Saptawan
 * Date: 22/10/2018
 */
class Manage_popup extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataPopup');
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
            $this->initialize_pagination(base_url("manage_popup/index"), 'popup', 'DataPopup', null);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['datas'] = $this->DataPopup
                ->getData(
                    $this->numOfContentsPerPage,
                    $page, 'popup');
            $data['page'] = $page;
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_popup/popup', $data);
            $this->template->publish();
        }
    }

    public function search()
    {
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $searchCache = $this->session->flashdata('search');
        $search = $this->input->post('search');
        $search = isset($search) ? $search : $searchCache;
        $this->initialize_pagination(base_url("manage_popup/search"),
            'popup',
            'DataPopup',
            $this->DataPopup->countSearchData(
                'popup',
                null,
                null,
                'title LIKE \'%' . $search . '%\'')
        );
        $data['datas'] = $this->DataPopup
            ->searchData(
                $this->numOfContentsPerPage,
                $page,
                'popup',
                null,
                null,
                'title LIKE \'%' . $search . '%\' OR title LIKE \'%' . $search . '%\''
            );
        $data['search'] = $search;
        $data['page'] = $page;
        $this->template->set_template('backoffice/template');
        $this->template->content->view('manage_popup/popup', $data);
        $this->template->publish();
    }

    public function tambahPopup()
    {
        if ($this->isPost())
        {
            $filename = $this->popup_submit();
            $this->DataPopup->addData('popup', array(
                'title' => $this->input->post('title'),
                'url' => $this->input->post('url'),
                'teks' => $this->input->post('teks'),
                'status' => $this->input->post('status')
            ));
            $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil tambah data</p>
                </div>');  
            redirect(base_url() . 'manage_popup', 'refresh');
        } else
        {
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_popup/tambah_popup');
            $this->template->publish();
        }
    }

    public function deletePopup($id)
    {
        $this->DataPopup->deleteData('popup', array('id' => $id));
        $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil delete data</p>
                </div>');  
        redirect(base_url() . 'manage_popup', 'refresh');
    }

    public function editPopup($id)
    {
        if ($this->isPost())
        {
            $filename = $this->popup_submit();
            if (isset($filename))
            {
                $this->DataPopup->updateData(array(
               'title' => $this->input->post('title'),
                'url' => $this->input->post('url'),
                'teks' => $this->input->post('teks'),
                'status' => $this->input->post('status')
                ), array('id' => $id), 'popup');
                $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');  
                redirect(base_url() . 'manage_popup', 'refresh');
            } else
            {
                $this->DataPopup->updateData(array(
                'title' => $this->input->post('title'),
                'url' => $this->input->post('url'),
                'teks' => $this->input->post('teks'),
                'status' => $this->input->post('status')
                ), array('id' => $id), 'popup');
                $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');  
                redirect(base_url() . 'manage_popup', 'refresh');
            }
        } else
        {
            $data['data'] = $this->DataPopup->getSpecificData('popup', array('id' => $id));
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_popup/edit_popup', $data);
            $this->template->publish();
        }
    }

    protected function popup_submit()
    {
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('teks', 'Teks', 'required');
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