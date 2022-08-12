<?php

class Berita extends MX_Controller {

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
        $this->numOfContentsPerPage = 5;
    }

    public function index()
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
        $data['about'] = $this->DataAbout->getAllData('about');

        $search = $this->input->post('search');
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        if (isset($search))
        {
            $this->search();
        } else
        {
        $this->initializepagination(base_url("berita/index"), 'berita', 'DataBerita', null);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['datas'] = $this->DataBerita->get_product_keyword($this->numOfContentsPerPage,$page, 'berita');
        $data['page'] = $page;
        $this->template->set_template('frontend/template');
        $this->template->title = 'Redaksi9.com';

        $this->template->stylesheet->add(base_url() . "public/css/index.css");
        $this->template->content->view('berita/index', $data);
        $this->template->header->view('frontend/partials/header');
        $this->template->footer->view('frontend/partials/footer');
        $this->template->sidebar->view('frontend/partials/sidebar');
        $this->template->publish();
        }
    }
    
    public function search()
    {
        $data['banner'] = $this->DataBanner->getAllData('banner');
        $data['berita'] = $this->DataBerita->getDuatable('4','4','kategori','berita','berita.id_category=kategori.id');
        $data['tes'] = $this->DataBerita->getDuatable('8','4','kategori','berita','berita.id_category=kategori.id');
        $data['anu'] = $this->DataBerita->get_product_keyword('4','0','berita');
        $data['video'] = $this->DataBerita->get_product_keyword('4','0','tv');
        $data['baru'] = $this->DataBerita->get_populer('5','0','berita');
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
        $data['kategori_all'] = $this->DataKategori->getKategoriAll('kategori');
        $data['about'] = $this->DataAbout->getAllData('about');
        
        $this->numOfContentsPerPage = 10;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $searchCache = $this->session->flashdata('search');
        $search = $this->input->post('search');
        $search = isset($search) ? $search : $searchCache;
        $this->initializepagination(base_url("berita/search"),
            'berita',
            'DataBerita',
            $this->DataBerita->countSearchData(
                'berita',
                null,
                null,
                'title LIKE \'%' . $search . '%\'')
        );
        $data['datas'] = $this->DataBerita
            ->searchData(
                $this->numOfContentsPerPage,
                $page,
                'kategori',
                'berita',
                'berita.id_category=kategori.id',
                'title LIKE \'%' . $search . '%\' OR title_ LIKE \'%' . $search . '%\''
            );
        $data['search'] = $search;
        $data['page'] = $page;
        $this->template->set_template('frontend/template');
        foreach ($data['pengaturan'] as $data_setting) {
            $this->template->title = $data_setting->meta_title;
        }

        $this->template->stylesheet->add(base_url() . "public/css/index.css");
        $this->template->content->view('berita/search', $data);
        $this->template->header->view('frontend/partials/header');
        $this->template->footer->view('frontend/partials/footer');
        $this->template->sidebar->view('frontend/partials/sidebar');
        $this->template->publish();
    }

    public function bacaberita($id,$title)
    {
        $result= $this->db->query("SELECT * FROM berita where id=$id");
        foreach ($result->result_array() as $result) {
        }
        $coba= substr(strip_tags($result["content"]),0,200);
        
        $this->template->title =$result["title"].' - Redaksi9.com';
        $this->template->description = $coba;
        $this->template->image = base_url().'uploads/berita/'.$result["img"];
        
        $this->template->twitter_title = str_replace(array('"',"'"),' ',$result["title"]).' - Redaksi9.com';
        $this->template->twitter_description = $coba;
        $this->template->twitter_image = base_url().'uploads/berita/'.$result["img"];
        
        $this->DataAgenda->updateData(array(
        'hit' => $result["hit"]+1
        ), array('id' => $id), 'berita');
        $data['banner'] = $this->DataBanner->getAllData('banner');
        $data['berita'] = $this->DataBerita->getDuatable('4','4','kategori','berita','berita.id_category=kategori.id');
        $data['tes'] = $this->DataBerita->getDuatable('8','4','kategori','berita','berita.id_category=kategori.id');
        $data['anu'] = $this->DataBerita->get_product_keyword('4','0','berita');
        $data['video'] = $this->DataBerita->get_product_keyword('4','0','tv');
        $data['baru'] = $this->DataBerita->get_populer('5','0','berita');
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
        $data['kategori_all'] = $this->DataKategori->getKategoriAll('kategori');
        $data['about'] = $this->DataAbout->getAllData('about');
            
            $data['datas'] = $this->DataBerita->getArsip('4','0','kategori','berita','berita.id_category=kategori.id', $id);
            $data['result'] = $this->DataBerita->getbaca('kategori','','berita','berita.id_category=kategori.id', $id);
            $this->template->set_template('frontend/template');
    
            $this->template->stylesheet->add(base_url() . "public/css/index.css");
            $this->template->content->view('berita/baca', $data);
            $this->template->header->view('frontend/partials/header');
            $this->template->footer->view('frontend/partials/footer');
            $this->template->sidebar->view('frontend/partials/sidebar');
            $this->template->publish();
    }
    
    
    public function cetak()
    {?>
       <html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>MEMBUAT CETAK PRINT LAPORAN DENGAN PHP - WWW.MALASNGODING.COM</title>
</head>
<body>
 
	<center>
		<h2>TUTORIAL CETAK PRINT LAPORAN DENGAN PHP</h2>
		<h4>CONTOH LAPORAN YANG DI PRINT - WWW.MALASNGODING.COM</h4>
	</center>
 
	<br/>
 
	<p>
		Tutorial membuat cetak print laporan dengan php. pada tutorial ini kita akan belajar cara membuat cetak laporan pada PHP dengan cara paling mudah.
	</p>
 
	<p>
		Ini adalah contoh data yang diprint pada tutorial <b>MEMBUAT CETAK PRINT LAPORAN DENGAN PHP</b> dari <b>www.malasngoding.com</b>, halaman ini akan dicetak sesuai dengan format HTML yang terdapat dalam file cetak1.php ini.
	</p>
 
	<script>
		window.print();
	</script>
	
</body>
</html> 
    <?php }
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