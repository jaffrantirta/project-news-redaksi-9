<?php

/**
 * Created by PhpStorm.
 * User: Budy
 * Date: 12/13/2017
 * Time: 10:04 AM
 */
class Technical_support extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataPengaturan');
        $this->load->library('ckeditor');
        $this->load->helper('form');
        $this->load->library('ckfinder');
        $this->ckeditor->basePath = '/new/public/ckeditor/';
        $this->ckeditor->config['language'] = 'en';
        $this->ckeditor->config['width'] = '730px';
        $this->ckeditor->config['height'] = '300px';
        $this->ckfinder->SetupCKEditor($this->ckeditor, '/new/public/ckfinder/');
        if (empty($this->session->userdata('logged_in')))
            redirect(base_url() . 'backoffice');
    }

    public function index()
    {
        $this->template->set_template('backoffice/template');
        $this->template->content->view('technical_support/technical-support');
        $this->template->publish();
    }
    public function send()
    {
    if ($this->isPost()){
    $filename = $this->technical_submit();
        
    $nama = $this->input->post('nama');
    $email = $this->input->post('email');
    $title = $this->input->post('title');
    $konten = $this->input->post('konten');
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
	$mail->IsHTML(false);
	$mail->Host = 'mail.redaksi9.com'; 
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
	
	$mail->Username = "sender@redaksi9.com";//email anda
	$mail->Password = "tanyarm2019#"; //password anda, silakan diganti
	$mail->setFrom('sender@redaksi9.com', 'Technical support Redaksi9');

	$mail->Subject = "Website Redaksi9.com";

	//$mail->addReplyTo($email, $nama);
	$date=date("Y-m-d H:i:s");
		$now = date('l j F Y h:i:s A');
	$mail->addAddress("team@rumahmedia.com");
	$pengaturan= $this->DataPengaturan->getAllData('pengaturan');
	foreach($pengaturan as $pengaturan){}
	$website=$pengaturan->website;
	$mail->msgHTML("<table width='100%' cellspacing='1' cellpadding='1' border='0' style='border-collapse:collapse;border: 1px solid #000000;'>
  <tr>
    <td colspan='3' style='background:#000000;color:#FFFFFF;'><div align='center' class='style1'>HELP SUPPORT WEBSITE $website </div></td>
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
    <td>Title</td>
    <td>:</td>
    <td>$title</td>
  </tr>
  <tr>
    <td>Content</td>
    <td>:</td>
    <td>$konten</td>
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
                redirect(base_url() . 'technical_support', 'refresh');
	}else{
	    $this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Gagal</h4>
                    <p>Gagal mengirim pesan</p>
                </div>');  
                redirect(base_url() . 'technical_support', 'refresh');
	}
    }else{
         $this->template->set_template('backoffice/template');
            $this->template->content->view('technical_support/technical_support');
            $this->template->publish();
    } 
     
    }
    protected function technical_submit()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('konten', 'Konten', 'required');
        if ($this->form_validation->run() == false)
        {
            $this->session->set_flashdata('error', validation_errors('<p class="alert alert-danger">', '</p>'));
            redirect(base_url() . "technical_support#errors");
        }
    }
}