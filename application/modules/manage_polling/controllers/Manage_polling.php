<?php

/**
 * User: Wawang Saptawan
 * Date: 22/10/2018
 */
class Manage_polling extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataPolling');
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
            $this->initialize_pagination(base_url("manage_polling/index"), 'polling', 'DataPolling', null);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['datas'] = $this->DataPolling
                ->getData(
                    $this->numOfContentsPerPage,
                    $page, 'polling');
            $data['page'] = $page;
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_polling/polling', $data);
            $this->template->publish();
        }
    }

    public function search()
    {
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $searchCache = $this->session->flashdata('search');
        $search = $this->input->post('search');
        $search = isset($search) ? $search : $searchCache;
        $this->initialize_pagination(base_url("manage_polling/search"),
            'polling',
            'DataPolling',
            $this->DataPolling->countSearchData(
                'polling',
                null,
                null,
                'pendapat LIKE \'%' . $search . '%\'')
        );
        $data['datas'] = $this->DataPolling
            ->searchData(
                $this->numOfContentsPerPage,
                $page,
                'polling',
                null,
                null,
                'pendapat LIKE \'%' . $search . '%\' OR pendapat LIKE \'%' . $search . '%\''
            );
        $data['search'] = $search;
        $data['page'] = $page;
        $this->template->set_template('backoffice/template');
        $this->template->content->view('manage_polling/polling', $data);
        $this->template->publish();
    }

    public function tambahPolling()
    {
        if ($this->isPost())
        {
            $filename = $this->polling_submit();
            $this->DataPolling->addData('polling', array(
                'pendapat' => $this->input->post('pendapat'),
                'jwb1' => $this->input->post('jwb1'),
                'jwb2' => $this->input->post('jwb2'),
                'jwb3' => $this->input->post('jwb3'),
                'jwb4' => $this->input->post('jwb4'),
                'pol1' => $this->input->post('pol1'),
                'pol2' => $this->input->post('pol2'),
                'pol3' => $this->input->post('pol3'),
                'pol4' => $this->input->post('pol4'),
                'status' => $this->input->post('status')
                ));
                $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil tambah data</p>
                </div>');  
            redirect(base_url() . 'manage_polling', 'refresh');
        } else
        {
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_polling/tambah_polling');
            $this->template->publish();
        }
    }

    public function deletePolling($id)
    {
        $this->DataPolling->deleteData('polling', array('id' => $id));
        $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil delete data</p>
                </div>');  
        redirect(base_url() . 'manage_polling', 'refresh');
    }

    public function editPolling($id)
    {
        if ($this->isPost())
        {
            $filename = $this->polling_submit();
            if (isset($filename))
            {
                $this->DataPolling->updateData(array(
                'pendapat' => $this->input->post('pendapat'),
                'jwb1' => $this->input->post('jwb1'),
                'jwb2' => $this->input->post('jwb2'),
                'jwb3' => $this->input->post('jwb3'),
                'jwb4' => $this->input->post('jwb4'),
                'pol1' => $this->input->post('pol1'),
                'pol2' => $this->input->post('pol2'),
                'pol3' => $this->input->post('pol3'),
                'pol4' => $this->input->post('pol4'),
                'status' => $this->input->post('status')
                ), array('id' => $id), 'polling');
                $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');  
                redirect(base_url() . 'manage_polling', 'refresh');
            } else
            {
                $this->DataPolling->updateData(array(
                'pendapat' => $this->input->post('pendapat'),
                'jwb1' => $this->input->post('jwb1'),
                'jwb2' => $this->input->post('jwb2'),
                'jwb3' => $this->input->post('jwb3'),
                'jwb4' => $this->input->post('jwb4'),
                'pol1' => $this->input->post('pol1'),
                'pol2' => $this->input->post('pol2'),
                'pol3' => $this->input->post('pol3'),
                'pol4' => $this->input->post('pol4'),
                'status' => $this->input->post('status')
                ), array('id' => $id), 'polling');
                $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil edit data</p>
                </div>');  
                redirect(base_url() . 'manage_polling', 'refresh');
            }
        } else
        {
            $data['data'] = $this->DataPolling->getSpecificData('polling', array('id' => $id));
            $this->template->set_template('backoffice/template');
            $this->template->content->view('manage_polling/edit_polling', $data);
            $this->template->publish();
        }
    }

    protected function polling_submit()
    {
        $this->form_validation->set_rules('pendapat', 'Pendapat', 'required');
        $this->form_validation->set_rules('jwb1', 'Jawaban 1', 'required');
        $this->form_validation->set_rules('jwb2', 'Jawaban 2', 'required');
        $this->form_validation->set_rules('jwb3', 'Jawaban 3', 'required');
        $this->form_validation->set_rules('jwb4', 'Jawaban 4', 'required');
        $this->form_validation->set_rules('pol1', 'Polling 1', 'required');
        $this->form_validation->set_rules('pol2', 'Polling 2', 'required');
        $this->form_validation->set_rules('pol3', 'Polling 3', 'required');
        $this->form_validation->set_rules('pol4', 'Polling 4', 'required');
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