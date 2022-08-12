<?php

class About extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataAgenda');
        $this->load->model('DataAlbum');
        $this->load->model('DataArtikel');
        $this->load->model('DataBanner');
        $this->load->model('DataBerita');
        $this->load->model('DataKontak');
        $this->load->model('DataKritik');
        $this->load->model('DataMedia');
        $this->load->model('DataMenuManager');
        $this->load->model('DataPendaftaran');
        $this->load->model('DataPengaturan');
        $this->load->model('DataPengumuman');
        $this->load->model('DataPolling');
        $this->load->model('DataPopup');
        $this->load->model('DataRunning');
        $this->load->model('DataSitus');
        $this->load->model('DataSlider');
        $this->load->model('DataSudikerta');
        $this->load->model('DataKategori');
        $this->load->model('DataAbout');
        $this->numOfContentsPerPage = 12;
    }

    

    public function read($id)
    {
             
        
        $data['banner'] = $this->DataBanner->getAllData('banner');
        $data['berita'] = $this->DataBerita->getDuatable('4','4','kategori','berita','berita.id_category=kategori.id');
        $data['tes'] = $this->DataBerita->getDuatable('8','4','kategori','berita','berita.id_category=kategori.id');
        $data['anu'] = $this->DataBerita->get_product_keyword('4','0','berita');
        $data['video'] = $this->DataBerita->get_product_keyword('4','0','tv');
        $data['baru'] = $this->DataBerita->get_populer('1','0','berita');
        $data['tabanan'] = $this->DataBerita->getBerita('7','0','berita');
        $data['data'] = $this->DataBerita->getBerita('3','0','berita');
        $data['kategori'] = $this->DataBerita->getkategori('4','0','berita');
        $data['kategori_all'] = $this->DataKategori->getKategoriAll('kategori');
        $data['kontak'] = $this->DataKontak->getAllData('kontak');
        $data['kritik'] = $this->DataKritik->getkritik('3','0','kritik');
        $data['media'] = $this->DataMedia->getAllData('media');
        $data['menumanager'] = $this->DataMenuManager->getAllData('menumanager');
        $data['pengaturan'] = $this->DataPengaturan->getAllData('pengaturan');
        $data['popup'] = $this->DataPopup->getAllData('popup');
        $data['situs'] = $this->DataSitus->getAllData('situs');
        $data['sliders'] = $this->DataSlider->getAllData('slider');
        $data['about'] = $this->DataAbout->getAllData('about');
        
        $data['data_about'] = $this->DataAbout->getSpecificData('about', array('id' => $id));
         
            $this->template->set_template('frontend/template');
            $this->template->title = 'Redaksi9.com';
    
            $this->template->stylesheet->add(base_url() . "public/css/index.css");
            $this->template->content->view('about/detail', $data);
            $this->template->header->view('frontend/partials/header');
            $this->template->footer->view('frontend/partials/footer');
            $this->template->sidebar->view('frontend/partials/sidebar');
            $this->template->publish();
    }
    
    // public function all()
    // {
             
        
    //     $data['banner'] = $this->DataBanner->getAllData('banner');
    //     $data['berita'] = $this->DataBerita->getDuatable('4','4','kategori','berita','berita.id_category=kategori.id');
    //     $data['tes'] = $this->DataBerita->getDuatable('8','4','kategori','berita','berita.id_category=kategori.id');
    //     $data['anu'] = $this->DataBerita->get_product_keyword('4','0','berita');
    //     $data['video'] = $this->DataBerita->get_product_keyword('4','0','tv');
    //     $data['baru'] = $this->DataBerita->get_populer('1','0','berita');
    //     $data['tabanan'] = $this->DataBerita->getBerita('7','0','berita');
    //     $data['data'] = $this->DataBerita->getBerita('3','0','berita');
    //     $data['kategori'] = $this->DataBerita->getkategori('4','0','berita');
    //     $data['kontak'] = $this->DataKontak->getAllData('kontak');
    //     $data['kritik'] = $this->DataKritik->getkritik('3','0','kritik');
    //     $data['media'] = $this->DataMedia->getAllData('media');
    //     $data['menumanager'] = $this->DataMenuManager->getAllData('menumanager');
    //     $data['pengaturan'] = $this->DataPengaturan->getAllData('pengaturan');
    //     $data['popup'] = $this->DataPopup->getAllData('popup');
    //     $data['situs'] = $this->DataSitus->getAllData('situs');
    //     $data['sliders'] = $this->DataSlider->getAllData('slider');
    //     $data['about'] = $this->DataAbout->getAllData('about');
            
            
    //         $this->initializepagination(base_url("category/all"), 'berita', 'DataAlbum', null);
    //         $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    //         $data['datas'] = $this->DataBerita
    //             ->getData(
    //                 $this->numOfContentsPerPage,
    //                 $page, 'berita');
    //         $data['page'] = $page;
            
    //         $this->template->set_template('frontend/template');
    //         $this->template->title = 'Pengawal Reformasi dan Otonomi Daerah ~ Jayapos.com';
    
    //         $this->template->stylesheet->add(base_url() . "public/css/index.css");
    //         $this->template->content->view('category/baca', $data);
    //         $this->template->header->view('frontend/partials/header');
    //         $this->template->footer->view('frontend/partials/footer');
    //         $this->template->sidebar->view('frontend/partials/sidebar');
    //         $this->template->publish();
    // }
    
    
    // public function like($id, $type)
    // {
    //     $exists = $this->DataLike->checkRecord('likes', array(
    //         'IP_ADDRESS' => $this->input->ip_address(),
    //         'TYPE'       => $type,
    //         'TYPE_ID'    => $id
    //     ));
    //     if (!$exists)
    //     {
    //         $this->DataLike->addData('likes', array(
    //             'IP_ADDRESS' => $this->input->ip_address(),
    //             'TYPE'       => $type,
    //             'TYPE_ID'    => $id
    //         ));
    //         $this->DataRecipe->incrementLikeCount($type,array(
    //             'ID_'.strtoupper($type) => $id
    //         ));

    //         echo '<p>Thank you for the love :)</p>';
    //     } else
    //         echo '<p>We\'ve received your love :)</p>';
    // }


}