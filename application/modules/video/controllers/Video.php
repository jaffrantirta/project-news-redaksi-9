<?php

class Video extends MX_Controller {

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
        $this->numOfContentsPerPage = 12;
    }

    public function index()
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
        $data['kontak'] = $this->DataKontak->getAllData('kontak');
        $data['kritik'] = $this->DataKritik->getkritik('3','0','kritik');
        $data['media'] = $this->DataMedia->getAllData('media');
        $data['menumanager'] = $this->DataMenuManager->getAllData('menumanager');
        $data['pengaturan'] = $this->DataPengaturan->getAllData('pengaturan');
        $data['popup'] = $this->DataPopup->getAllData('popup');
        $data['situs'] = $this->DataSitus->getAllData('situs');
        $data['sliders'] = $this->DataSlider->getAllData('slider');
        $data['kategori_all'] = $this->DataBerita->getKategoriAll('kategori');
        $data['about'] = $this->DataBerita->getAllData('about');

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $data['datas'] = $this->DataBerita->get_product_keyword($this->numOfContentsPerPage,$page,'tv');
            $data['page'] = $page;
        $this->template->set_template('frontend/template');
        foreach ($data['pengaturan'] as $data_setting) {
            $this->template->title = $data_setting->meta_title;
        }

        $this->template->stylesheet->add(base_url() . "public/css/index.css");
        $this->template->content->view('video/index', $data);
        $this->template->header->view('frontend/partials/header');
        $this->template->footer->view('frontend/partials/footer');
        $this->template->sidebar->view('frontend/partials/sidebar');
        $this->template->publish();
    }

    public function bacavideo($id)
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
        $data['kontak'] = $this->DataKontak->getAllData('kontak');
        $data['kritik'] = $this->DataKritik->getkritik('3','0','kritik');
        $data['media'] = $this->DataMedia->getAllData('media');
        $data['menumanager'] = $this->DataMenuManager->getAllData('menumanager');
        $data['pengaturan'] = $this->DataPengaturan->getAllData('pengaturan');
        $data['popup'] = $this->DataPopup->getAllData('popup');
        $data['situs'] = $this->DataSitus->getAllData('situs');
        $data['sliders'] = $this->DataSlider->getAllData('slider');
        $data['kategori_all'] = $this->DataBerita->getKategoriAll('kategori');
        $data['about'] = $this->DataBerita->getAllData('about');
            
            $data['datas'] = $this->DataAlbum->getVideo('4','0','tv',$id);
            $data['result'] = $this->DataAlbum->getSpecificData('tv', array('id' => $id));
            $this->template->set_template('frontend/template');
            foreach ($data['pengaturan'] as $data_setting) {
                $this->template->title = $data_setting->meta_title;
            }
    
            $this->template->stylesheet->add(base_url() . "public/css/index.css");
            $this->template->content->view('video/baca', $data);
            $this->template->header->view('frontend/partials/header');
            $this->template->footer->view('frontend/partials/footer');
            $this->template->sidebar->view('frontend/partials/sidebar');
            $this->template->publish();
    }

    public function like($id, $type)
    {
        $exists = $this->DataLike->checkRecord('likes', array(
            'IP_ADDRESS' => $this->input->ip_address(),
            'TYPE'       => $type,
            'TYPE_ID'    => $id
        ));
        if (!$exists)
        {
            $this->DataLike->addData('likes', array(
                'IP_ADDRESS' => $this->input->ip_address(),
                'TYPE'       => $type,
                'TYPE_ID'    => $id
            ));
            $this->DataRecipe->incrementLikeCount($type,array(
                'ID_'.strtoupper($type) => $id
            ));

            echo '<p>Thank you for the love :)</p>';
        } else
            echo '<p>We\'ve received your love :)</p>';
    }


}