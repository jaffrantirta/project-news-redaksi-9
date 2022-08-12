<?php

function hari($h) {

    $ary_con = array("Sunday" => "Minggu", "Monday" => "Senin", "Tuesday" => "Selasa", "Wednesday" => "Rabu", "Thursday" => "Kamis", "Friday" => "Jumat", "Saturday" => "Sabtu");   

    foreach($ary_con as $key => $val){

        if($key==$h){
            $h = $val;
        }

    }

    $hari = $h;

    return $hari;

}

function bulan($b) {

    $ary_con = array("January" => "Januari", "February" => "Februari", "March" => "Maret", "April" => "April", "May" => "Mei", "June" => "Juni", "July" => "Juli", "August" => "Agustus", "September" => "September", "October" => "Oktober", "November" => "November", "December" => "Desember");   

    foreach($ary_con as $key => $val){

        if($key==$b){
            $b = $val;
        }

    }

    $bulan = $b;

    return $bulan;

}
    
//echo hari(date('l'))."&nbsp;";
function createPermalink($link)
{
	$link = str_replace('-','-',$link);
			
	$link = str_replace(' ','-',$link);
	
	$link = str_replace('','',$link);
	
	$link = str_replace(',','-',$link);
	
	$link = str_replace('"','-',$link);
			
	$link = str_replace("'","-",$link);
	
	$link = str_replace('%','-',$link);
	
	$link = str_replace('&','',$link);
	
	$link = str_replace('/','-',$link);
	
	$link = str_replace('(','-',$link);
	
	$link = str_replace(')','-',$link);
					
	return $link.".html";
}
?>
<style>
    .collapse.in {
        display: block;
        height: 560px;
    }
    .sm-simple a, .sm-simple a:hover, .sm-simple a:focus, .sm-simple a:active{
        font-size: 14px;
        font-weight: 900;
    }
    @media screen and (max-width: 767px){
        #defaultNavbar1 {
            background: #ffffff !important;
            padding-top: 5%;
        }
    }
    
    .berita_berjalan{
        color: white;
        font-size: 18px;
        padding: 10px;
        margin-right: 20px;
    }
    .judul_jalan{
        height:30px;
        color: red;
        font-size: 18px;
        padding-top:4px;
        padding-bottom:4px;
        text-align: right;
        background-color: #fcfcfc;
    }
    .berita_berjalan:hover{
        color:black;
    }
    .todays{
        background-color: white;
    }
</style>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'id'}, 'google_translate_element');
}
</script>
<div class="">
    <nav class="navbar navbar-default img-rounded" style="width: 100%; position: relative; background: #fff;margin-bottom: 50px;padding: 12px 0 0 0;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <!-- <div class="navbar-header"> -->
            <div class="row" style="margin-bottom: 20px;">
                
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#defaultNavbar1"
                        aria-expanded="false" style="z-index: 11111;"><span class="sr-only">Toggle navigation</span><span
                            class="icon-bar" style="margin-left: 20%;width: 80%;"></span><span
                            class="icon-bar"></span><span class="icon-bar" style="margin-left:40%; width: 60%;"></span>
                </button>
                <div class="col-md-4 hidden-xs">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="google_translate_element"></div>
                        </div>
                        <div class="col-md-12">
                            <div style="top: 10px;position: relative;"><?= hari(date('l')); ?>, <?php echo date('d').' '; echo bulan(date('F')).' '; echo date('Y'); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                     <?php foreach ($pengaturan as $pengaturan) { ?>
                    <a href="<?= base_url() ?>">
                    <img class="hidden-sm hidden-xs text-center" style="display:block; margin-left:auto; margin-right:auto; width:80%; " src="<?= base_url().'uploads/'.$pengaturan->header; ?>">
                    </a>
                    <a href="<?= base_url() ?>">
                    <img class="hidden-md hidden-lg" style="margin-left:30px; width:250px " src="<?= base_url().'uploads/'.$pengaturan->header; ?>">
                    </a>
                    <?php } ?>
                    
                </div>
                <div class="col-md-4 hidden-xs">
                    <div class="row">
                        <div class="col-md-12">
                            <div style="float: right;">
                                <?php echo form_open('berita/search'); ?>
                                    <div class="input-group" style="width: 250px;">
                                        <input type="text" name="search" class="form-control" placeholder="Cari disini...." style="border-radius: 20px 0px 0px 20px;">
                                        <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit" style="border-radius: 0px 20px 20px 0px;"><i class="fa fa-search"></i></button>
                                    </span>
                                    </div><!-- /input-group -->
                                </form>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div style="top: 10px;position: relative;float: right;">
                            <?php foreach ($media as $data_media) { ?>
                                <a href="<?='http://'.$data_media->url; ?>"><img src="<?php echo base_url().'uploads/'.$data_media->img; ?>"></a>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
        </div>
        <!-- /.container-fluid -->
            <!-- /.navbar-collapse -->
            <div class="collapse navbar-collapse" id="defaultNavbar1" style="border-top:1px solid #E10707;box-shadow: 0px 3px 2px 0px rgba(0, 0, 0, 0.05);">
                <div class="container">
                
                <ul class="nav navbar-nav mytopnav nav-justified" style="margin-left:unset; ;z-index:500000">
                
                        <?php
                            echo menunavbar();
                            
                        ?>
                    </ul>
                </div>
            </div>
            
            <div class="col-md-12">
            <div class="row" style="border-top-style: solid; border-top-color: #dbdbdb">
                <div class="judul_jalan col-md-2 col-sm-4 col-xs-6"><b>BERITA TERKINI</b></div>
                <div class="col-md-10 col-sm-8 col-xs-6" style="color:#000000;height:30px;padding-top: -50px; background-color:red; padding: 3px;">
                    <MARQUEE  onmouseover="this.stop()" onMouseOut="this.start()" direction="left" scrollamount="7" width="100%">
                    <?php
                    $today_news = $this->DataBerita->get_todays_news();
                    $teks_berjalan = '';
                    if(isset($today_news)){
                        foreach($today_news as $hari_ini){
                            $url_nt 	= base_url().'read/'.$hari_ini->id.'/'.createPermalink($hari_ini->title).'';

                            $teks_berjalan .= '<a class="berita_berjalan" href="'.$url_nt.'"><i class="fa fa-check-circle" aria-hidden="true"></i> ';
                            $teks_berjalan .= $hari_ini->title;
                            $teks_berjalan .= '</a>';
                        }
                    }
                    ?>
                        <?= $teks_berjalan; ?>
                    </MARQUEE>
                    
                </div> 
            </div>
            </div>
            
    </nav>
    <!-- <div class="container" >
        <ul class="nav navbar-nav mytopnav visible-lg visible-md visible-sm " style="margin-left:20px ;z-index:500000">
            
                    <?php
                        echo menunavbar();
                        
                    ?>
                </ul>
    </div> -->
    
</div>
<div style="text-align: center; margin-bottom:20px; margin-top:-30px; ">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox" style="height: 90px;">
            <?php 
            if(isset($banner)){ 
                $no=0;
                foreach ($banner as $data_banner) {
                    if($data_banner->position == 'DM02'){
                        $no++;
            ?>
            <!-- Wrapper for slides -->
                <?php if($no==1){ ?>
                <div class="item active">
                    <center>
                    <?php 
                        if($data_banner->url != ''){ 
                            echo("<a href='".$data_banner->url."' target='_blank'>");
                        }
                    ?>
                    <img src="<?php echo base_url().'uploads/banner/'.$data_banner->img;?>" class="banner-adv" width="728" style="object-fit: fill;height: 90px;">
                    <?php if($data_banner->url != ''){ echo("</a>"); } ?>
                    </center>
                </div>
                <?php }else{ ?>
                <div class="item">
                    <center>
                    <?php 
                        if($data_banner->url != ''){ 
                            echo("<a href='".$data_banner->url."' target='_blank'>");
                        }
                    ?>
                    <img src="<?php echo base_url().'uploads/banner/'.$data_banner->img;?>" class="banner-adv" width="728" style="object-fit: fill;height: 90px;">
                    <?php if($data_banner->url != ''){ echo("</a>"); } ?>
                    </center>
                </div>
            <?php } ?>
            <?php
//          }else{
//              echo "<div class='alert alert-danger'>Banner Belum Di Unggah</div>";
            } } }
            ?>
        </div>
    </div>
</div>
