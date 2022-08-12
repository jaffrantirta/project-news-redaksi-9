<?php

class Kontak extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
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
        $this->numOfContentsPerPage = 5;
    }

    public function index()
    {
        $data['album'] = $this->DataAgenda->getData('10','0','album');
        $data['agenda'] = $this->DataAgenda->getData('5','0','agenda');
        $data['artikel'] = $this->DataArtikel->getAllData('artikel');
        $data['banner'] = $this->DataBanner->getAllData('banner');
        $this->initialize_pagination(base_url("kontak/index"), 'kontak', 'DataKontak', null);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['datas'] = $this->DataKontak->get_product_keyword($this->numOfContentsPerPage,$page, 'kontak');
        $data['page'] = $page;
        
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
        $this->template->content->view('kontak/index', $data);
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
    
    public function send()
    {
    if ($this->isPost()){
    $filename = $this->technical_submit();
        
    $nama = $this->input->post('nama');
    $alamat = $this->input->post('alamat');
    $email = $this->input->post('email');
    $judul = $this->input->post('judul');
    $isi = $this->input->post('isi');
    $this->load->library('MyPHPMailer');
      
    $mail = new PHPMailer;
	$mail->isSMTP();
	
	/*dipakai debugging,
	 * 0 = off (for production use)
	 * 1 = client messages
	 * 2 = client and server messages
	 * */
	$mail->SMTPDebug = 0;
	//$mail->Debugoutput = 'html';
	$mail->IsHTML(true);
	$mail->Host = 'mail.golkarbali.or.id'; 
	/**jika kebetulan network SMTP di block lewat IPv6 maka gunakan kode ini
	 * $mail->Host = gethostbyname('smtp.gmail.com');
	 * */
	$mail->Port = 465; //ini adalah port default mbah google
	$mail->SMTPSecure = 'ssl'; //security pakai ssl atau tls, tapi ssl telah deprecated
	$mail->SMTPAuth = true; //menandakan butuh authentifikasi
	
	$mail->Priority = 1;
	// MS Outlook custom header
	// May set to "Urgent" or "Highest" rather than "High"
	$mail->AddCustomHeader("X-MSMail-Priority: High");
	// Not sure if Priority will also set the Importance header:
	$mail->AddCustomHeader("Importance: High");	
	
	$mail->Username = "sender@golkarbali.or.id";//email anda
	$mail->Password = "tanyarm2018"; //password anda, silakan diganti
	$mail->setFrom("sender@golkarbali.or.id", 'Hubungi Kami');

	$mail->Subject = "Website golkarbali.or.id";

	//$mail->addReplyTo($email, $nama);
	$date=date("Y-m-d H:i:s");
		$now = date('l j F Y h:i:s A');
	$kontak= $this->DataKontak->getAllData('kontak');
	foreach($kontak as $kontak){	
	$mail->addAddress($kontak->email);
	}
	$pengaturan= $this->DataPengaturan->getAllData('pengaturan');
	foreach($pengaturan as $pengaturan){}
	$website=$pengaturan->website;
	$mail->msgHTML("<table width='100%' cellspacing='1' cellpadding='1' border='0' style='border-collapse:collapse;border: 1px solid #000000;'>
  <tr>
    <td colspan='3' style='background:#000000;color:#FFFFFF;'><div align='center' class='style1'>Hubungi Kami WEBSITE $website </div></td>
  </tr>
  <tr>
    <td width='5%'>&nbsp;</td>
    <td width='1%'>&nbsp;</td>
    <td width='94%'>&nbsp;</td>
  </tr>
  <tr>
    <td>Tanggal</td>
    <td>:</td>
    <td>$now</td>
  </tr>
  <tr>
    <td>Name</td>
    <td>:</td>
    <td>$nama</td>
  </tr>
  <tr>
    <td>Email</td>
    <td>:</td>
    <td>$email</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td>:</td>
    <td>$alamat</td>
  </tr>
  <tr>
    <td>Judul</td>
    <td>:</td>
    <td>$judul</td>
  </tr>
  <tr>
    <td>Isi</td>
    <td>:</td>
    <td>$isi</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>");

	$kirim=$mail->send();
	
	if($kirim){
	    $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>Anda berhasil mengirim pesan</p>
                </div>');  
                redirect(base_url() . 'kontak', 'refresh');
	}else{
	    $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Gagal</h4>
                    <p>Gagal mengirim pesan</p>
                </div>');  
                redirect(base_url() . 'kontak', 'refresh');
	}
    }else{
         $this->template->set_template('backoffice/template');
            $this->template->content->view('kontak');
            $this->template->publish();
    } 
     
    }
    protected function technical_submit()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
        if ($this->form_validation->run() == false)
        {
            $this->session->set_flashdata('error', validation_errors('<p class="alert alert-danger">', '</p>'));
            redirect(base_url() . "kontak#errors");
        }
    }


}