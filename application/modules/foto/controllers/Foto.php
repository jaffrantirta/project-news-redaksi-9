<?php

class Foto extends MX_Controller {

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
        $this->numOfContentsPerPage = 10;
    }

    public function index()
    {
        $data['album'] = $this->DataAgenda->getData('10','0','album');
        $data['agenda'] = $this->DataAgenda->getData('5','0','agenda');
        $data['artikel'] = $this->DataArtikel->getAllData('artikel');
        $data['banner'] = $this->DataBanner->getAllData('banner');
        $this->initializepagination(base_url("foto/index"), 'album', 'DataAlbum', null);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['datas'] = $this->DataAlbum->getFoto($this->numOfContentsPerPage,$page, 'album');
        $data['page'] = $page;
        $data['kontak'] = $this->DataKontak->getAllData('kontak');
        $data['kritik'] = $this->DataKritik->getAllData('kritik');
        $data['media'] = $this->DataMedia->getAllData('media');
        $data['menumanager'] = $this->DataMenuManager->getAllData('menumanager');
        $data['pendaftaran'] = $this->DataPendaftaran->getAllData('pendaftaran');
        $data['pengaturan'] = $this->DataPengaturan->getAllData('pengaturan');
        $data['pengumuman'] = $this->DataPengumuman->getAllData('pengumuman');
        $data['polling'] = $this->DataPolling->getAllData('polling');
        $data['popup'] = $this->DataPopup->getAllData('popup');
        $data['running'] = $this->DataRunning->getAllData('running');
        $data['situs'] = $this->DataSitus->getAllData('situs');
        $data['sliders'] = $this->DataSlider->getAllData('slider');
        $data['sudikerta'] = $this->DataSudikerta->getAllData('sudikerta');

        /*
        $data['sliders'] = $this->DataProduct->getAllData('slider');
        $data['products'] = $this->DataProduct->getLimitedData(10, 0, 'produk');
        $data['recipes'] = $this->DataRecipe
            ->getRelationshipDataOrderBy(
                10,
                0,
                'resep',
                '*,k.FOTO AS KFOTO, resep.FOTO AS RFOTO',
                'resep_kategori AS k',
                'k.ID_RESEP_KATEGORI = resep.ID_RESEP_KATEGORI');
        $data['stories'] = $this->DataStory->getLimitedData(10,0,'story');
        */

        $this->template->set_template('frontend/template');
        $this->template->title = 'Website Resmi Dewan Pimpinan Daerah Partai Golkar Provinsi Bali';

        $this->template->stylesheet->add(base_url() . "public/css/index.css");
        $this->template->content->view('foto/index', $data);
        $this->template->header->view('frontend/partials/header');
        $this->template->footer->view('frontend/partials/footer');
        $this->template->sidebar->view('frontend/partials/sidebar');
        $this->template->publish();
    }
    
     public function bacafoto($id)
    {
             $data['album'] = $this->DataAgenda->getData('10','0','album');
        $data['agenda'] = $this->DataAgenda->getData('5','0','agenda');
        $data['artikel'] = $this->DataArtikel->getAllData('artikel');
        $data['banner'] = $this->DataBanner->getAllData('banner');
        
        $data['kontak'] = $this->DataKontak->getAllData('kontak');
        $data['kritik'] = $this->DataKritik->getAllData('kritik');
        $data['media'] = $this->DataMedia->getAllData('media');
        $data['menumanager'] = $this->DataMenuManager->getAllData('menumanager');
        $data['pendaftaran'] = $this->DataPendaftaran->getAllData('pendaftaran');
        $data['pengaturan'] = $this->DataPengaturan->getAllData('pengaturan');
        $data['pengumuman'] = $this->DataPengumuman->getAllData('pengumuman');
        $data['polling'] = $this->DataPolling->getAllData('polling');
        $data['popup'] = $this->DataPopup->getAllData('popup');
        $data['running'] = $this->DataRunning->getAllData('running');
        $data['situs'] = $this->DataSitus->getAllData('situs');
        $data['sliders'] = $this->DataSlider->getAllData('slider');
        $data['sudikerta'] = $this->DataSudikerta->getAllData('sudikerta');
        
            
            $data['data'] = $this->DataAlbum->getSpecificData('album', array('id' => $id));
            $this->initializepagination(base_url("foto/bacafoto/$id/"),
            'foto',
            'DataAlbum',
            $this->DataAlbum->countSearchData(
                'foto',
                null,
                null,
                'id_album LIKE \'%' . $id . '%\'')
        );
            $this->numOfContentsPerPage = 15;
            $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
            $data['datas'] = $this->DataAlbum->getAlbum($this->numOfContentsPerPage,$page, 'foto', $id);
            $data['page'] = $page;
            $this->template->set_template('frontend/template');
            $this->template->title = 'Website Resmi Dewan Pimpinan Daerah Partai Golkar Provinsi Bali';
    
            $this->template->stylesheet->add(base_url() . "public/css/index.css");
            $this->template->content->view('foto/baca', $data);
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