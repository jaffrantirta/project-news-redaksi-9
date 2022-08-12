<?php

class Tag extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Data');
        $this->load->model('DataMenuManager');
        $this->load->model('DataBerita');
        $this->numOfContentsPerPage = 5;
    }

    

    public function index($any)
    {
        $id=str_replace("-", " ", $any);
        
        $data['banner'] = $this->Data->getAllData('banner');
        $data['berita'] = $this->Data->getDuatable('4','4','kategori','berita','berita.id_category=kategori.id');
        $data['tes'] = $this->Data->getDuatable('8','4','kategori','berita','berita.id_category=kategori.id');
        $data['anu'] = $this->Data->get_product_keyword('4','0','berita');
        $data['video'] = $this->Data->get_product_keyword('4','0','tv');
        $data['baru'] = $this->Data->get_populer('5','0','berita');
        $data['tabanan'] = $this->Data->getBerita('7','0','berita');
        $data['data'] = $this->Data->getBerita('3','0','berita');
        $data['kategori'] = $this->Data->getkategori('4','0','berita');
        $data['kontak'] = $this->Data->getAllData('kontak');
        $data['kritik'] = $this->Data->getkritik('3','0','kritik');
        $data['media'] = $this->Data->getAllData('media');
        $data['menumanager'] = $this->DataMenuManager->getAllData('menumanager');
        $data['pengaturan'] = $this->Data->getAllData('pengaturan');
        $data['popup'] = $this->Data->getAllData('popup');
        $data['situs'] = $this->Data->getAllData('situs');
        $data['sliders'] = $this->Data->getAllData('slider');
        $data['kategori_all'] = $this->Data->getKategoriAll('kategori');
        $data['about'] = $this->Data->getAllData('about');
            
            
            $this->initializepagination(base_url("tag/$id/"),
            'berita',
            'Data',
            $this->Data->countSearchData(
                'berita',
                null,
                null,
                'tags LIKE \'%' . $id . '%\'')
        );
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['datas'] = $this->Data->searchData($this->numOfContentsPerPage,$page,'berita',null,null,'tags LIKE \'%' . $id . '%\'');
            $data['page'] = $page;
            $data['title'] = $this->Data->getSpecificData('kategori', array('id' => $id));
            
            $this->template->set_template('frontend/template');
            /*$this->template->title = 'Redaksi9.com';*/
    
            $this->template->stylesheet->add(base_url() . "public/css/index.css");
            $this->template->content->view('tag/baca', $data);
            $this->template->header->view('frontend/partials/header');
            $this->template->footer->view('frontend/partials/footer');
            $this->template->sidebar->view('frontend/partials/sidebar');
            $this->template->publish();
    }


}