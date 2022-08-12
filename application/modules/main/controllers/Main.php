<?php

class Main extends MX_Controller {

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
    }

    public function index()
    {
        
        
        
        $data['banner'] = $this->DataBanner->getAllData('banner');
        $data['berita'] = $this->DataBerita->getDuatable('14','4','kategori','berita','berita.id_category=kategori.id');
        $data['tes'] = $this->DataBerita->getDuatable('18','4','kategori','berita','berita.id_category=kategori.id');
        $data['news_cat'] = $this->DataBerita->getDuatable('12','5','kategori','berita','berita.id_category=kategori.id');
        $data['global'] = $this->DataBerita->getKategoriGlobal('10','0','kategori','berita','berita.id_category=kategori.id');
        $data['ekobisnis'] = $this->DataBerita->getKategoriEkobisnis('1','0','kategori','berita','berita.id_category=kategori.id');
        $data['anu'] = $this->DataBerita->get_product_keyword('4','0','berita');
        $data['news'] = $this->DataBerita->getDuatable('5','0','kategori','berita','berita.id_category=kategori.id');
        $data['video'] = $this->DataBerita->get_product_keyword('4','0','tv');
        $data['baru'] = $this->DataBerita->get_populer('5','0','berita');
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
        $data['is_index'] = true;

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
        foreach ($data['pengaturan'] as $data_setting) {
            $this->template->title = $data_setting->meta_title;
        }

        $this->template->stylesheet->add(base_url() . "public/css/index.css");
        $this->template->content->view('frontend/partials/index', $data);
        $this->template->header->view('frontend/partials/header');
        $this->template->footer->view('frontend/partials/footer', $data);
        $this->template->bottom->view('frontend/partials/bottom');
        $this->template->sidebar->view('frontend/partials/sidebar', $data);
        $this->template->publish();
    }

  
    public function subscribe()
    {
        $data['produk_kategori'] = $this->DataProductCategory->getAllData('produk_kategori');
        $data['resep_kategori'] = $this->DataRecipeCategory->getAllData('resep_kategori');
        $data['brands'] = $this->DataBrand->getAllData('brand');
        $data['lokasis'] = $this->DataLocation->getAllData('lokasi');

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == false)
            $this->session->set_flashdata('error', validation_errors('<p class="alert alert-danger">', '</p>'));

        if ($this->form_validation->run() == true)
        {
            if (!$this->DataSubscriber->getSpecificData('subscriber', array('email' => $this->input->post('email'))))
            {
                $this->DataSubscriber->addData('subscriber', array(
                    'email' => $this->input->post('email'),
                ));
            } else
                $this->session->set_flashdata('error', '<h3 class="text-center">Sorry, but the email is already registered in our system</h3>');
        }

        $this->template->set_template('frontend/template');
        $this->template->title = 'Subscription';

        $this->template->stylesheet->add(base_url() . "public/css/index.css");
        $this->template->content->view('main/subscribe', $data);
        $this->template->header->view('frontend/partials/header');
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