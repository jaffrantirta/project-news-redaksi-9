<a href="https://www.beritabali.com" style=""><img alt="Media Berita Online Bali Terkini, Kabar Terbaru Bali - Beritabali.com" src="https://www.beritabali.com/uploads/dot.png" style="display:none"></a>
<?php
  $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  function yt_id($url) {
	$pattern = 
		'%^# Match any youtube URL
		(?:https?://)?  # Optional scheme. Either http or https
		(?:www\.)?      # Optional www subdomain
		(?:             # Group host alternatives
		  youtu\.be/    # Either youtu.be,
		| youtube\.com  # or youtube.com
		  (?:           # Group path alternatives
			/embed/     # Either /embed/
		  | /v/         # or /v/
		  | /watch\?v=  # or /watch\?v=
		  )             # End path alternatives.
		)               # End host alternatives.
		([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
		$%x'
		;
	$result = preg_match($pattern, $url, $matches);
	if ($result) {
		return $matches[1];
	}
	return false;
}
  function format_date_in($option_format, $date){

		list($yyyy, $mm, $dd) = explode('-', $date);

		$ary_month = array("01" => "Januari","02" => "Februari","03" => "Maret","04" => "April","05" => "Mei","06" => "Juni","07" => "Juli","08" => "Agustus","09" => "September","10" => "Oktober","11" => "November","12" => "Desember",);

		

		foreach($ary_month as $key => $val){

			if($key==$mm){$mm = $val;}

		}			

		switch($option_format){

			case "1"	:

				$date = $mm." ".$dd.", ".$yyyy;

				break;

			case "2"	:

				$date = $dd." ".$mm." ".$yyyy;

				break;	

		

		}

		return 	$date;	

	}
  ?>
  <?php foreach($pengaturan as $pengaturan){}?>
<link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/rrssb.css">
<link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">
<script src="<?php echo base_url(); ?>/public/js/rrssb.min.js"></script>
  <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
<style>
	.btn-circle{
		border-radius: 7px;
	}
	.btn-whatsapp:hover {
	    color: #fff;
	    background-color: #59ba00;
	    border-color: rgba(0,0,0,0.2);
	}
	 @media (max-width: 767px) {
        .h3-mob{
            font-size:24px !important;
        }
        .col-col{
            width:20% !important;
        }
    }
</style>	
<style>
    @media screen {
    #print_content { display: none; }
    #print_content.show { display: block; }
}
@media print {
    #print_content { display: block !important; }
}
</style>

<div class="col-md-12" id="print_content" style="">
    <center><img class="text-center" style="margin-left:auto; margin-right:auto; width:30%; " src="<?= base_url().'uploads/'.$pengaturan->header; ?>"></center>
    <br>
    <h3 style="font-size:28px"><?= $result->title; ?></h3>
	<ul class="cp-post-tools" style="list-style:none">
		<li style="display:inline; ">&#128197; <?= format_date_in(2, substr($result->date, 0, 10)); ?></li>
		<li style="display:inline; ">&#128337; <?= substr($result->date, 10, 6)." WITA"; ?></li>
		<li style="display:inline; ">&#128193; <?= $result->title_; ?></li>
	</ul>
	<div class="cp-thumb post">
		<figure style="background-color: white;">
		    
			<img class="img-responsive" src="<?php echo base_url().'uploads/berita/'.$result->img; ?>" alt="">
			<figcaption style="margin-top: 5px;text-align: justify;">
				<em><?= $result->source_image; ?></em>
			</figcaption>
		</figure>
	</div>
	<?= $result->content; ?>
</div>
<iframe style="display:none;" id="printJS" srcdoc="<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><title>Document</title></head><body></body></html>"></iframe>
<script type="text/javascript">
    $(document).ready(function() {
      
        $("#but_print").click( function(){
           $('img#print_log').show("fast");
           var counter = 5;
           setInterval(function() {
           counter--;
            
            if (counter === 0) {
             printJS('print_content', 'html');
             $('img#print_log').hide("fast");
             }
           }, 100);
            
        });

    });
</script>
<div class="main-content" >
	<div class="cp-post-details">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-xs-12">
					<div class="cp-single-post">
						<div class="cp-post-content">
							<ul class="breadcrumb">
								<li><a href="<?php echo base_url(); ?>">Home</a></li>
								<li> <?= $result->title_; ?></li>
							</ul>
							<h3><a href="#!"><?= $result->title; ?></a></h3>
							<ul class="cp-post-tools">
								<li><i class="fa fa-calendar"></i> <?= format_date_in(2, substr($result->date, 0, 10)); ?></li>
								<li><i class="fa fa-clock-o"></i> <?= substr($result->date, 10, 6)." WITA"; ?></li>
								<li>
									<i class="fa fa-folder-o"></i> 
									<a href="">
										<?= $result->title_; ?>
									</a>
								</li>
								<li>
								<i class="fa fa-eye" aria-hidden="true"></i>
								<?= $result->hit; ?>
								</li>
								<!-- <div style="float: right;"> -->
								<div class="rrssb-buttons">
									<!-- <ul class="rrssb-buttons"> -->
										<li class="rrssb-facebook">
											<!--  Replace with your URL. For best results, make sure you page has the proper FB Open Graph tags in header:
												  https://developers.facebook.com/docs/opengraph/howtos/maximizing-distribution-media-content/ -->
											<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $actual_link; ?>" class="popup">
											  <span class="rrssb-icon">
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29 29"><path d="M26.4 0H2.6C1.714 0 0 1.715 0 2.6v23.8c0 .884 1.715 2.6 2.6 2.6h12.393V17.988h-3.996v-3.98h3.997v-3.062c0-3.746 2.835-5.97 6.177-5.97 1.6 0 2.444.173 2.845.226v3.792H21.18c-1.817 0-2.156.9-2.156 2.168v2.847h5.045l-.66 3.978h-4.386V29H26.4c.884 0 2.6-1.716 2.6-2.6V2.6c0-.885-1.716-2.6-2.6-2.6z"/></svg>
											  </span>
											  <span class="rrssb-text">facebook</span>
											</a>
										</li>

										<li class="rrssb-twitter">
									        <!-- Replace href with your Meta and URL information  -->
									        <a href="https://twitter.com/intent/tweet?text=<?php echo $actual_link; ?>"
									        class="popup">
									          <span class="rrssb-icon">
									            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28"><path d="M24.253 8.756C24.69 17.08 18.297 24.182 9.97 24.62a15.093 15.093 0 0 1-8.86-2.32c2.702.18 5.375-.648 7.507-2.32a5.417 5.417 0 0 1-4.49-3.64c.802.13 1.62.077 2.4-.154a5.416 5.416 0 0 1-4.412-5.11 5.43 5.43 0 0 0 2.168.387A5.416 5.416 0 0 1 2.89 4.498a15.09 15.09 0 0 0 10.913 5.573 5.185 5.185 0 0 1 3.434-6.48 5.18 5.18 0 0 1 5.546 1.682 9.076 9.076 0 0 0 3.33-1.317 5.038 5.038 0 0 1-2.4 2.942 9.068 9.068 0 0 0 3.02-.85 5.05 5.05 0 0 1-2.48 2.71z"/></svg>
									          </span>
									          <span class="rrssb-text">twitter</span>
									        </a>
									      </li>

									      <li class="rrssb-whatsapp"><a href="whatsapp://send?text=<?php echo $actual_link; ?>" data-action="share/whatsapp/share"><span class="rrssb-icon">
												  <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" viewbox="0 0 90 90">
													<path d="M90 43.84c0 24.214-19.78 43.842-44.182 43.842a44.256 44.256 0 0 1-21.357-5.455L0 90l7.975-23.522a43.38 43.38 0 0 1-6.34-22.637C1.635 19.63 21.415 0 45.818 0 70.223 0 90 19.628 90 43.84zM45.818 6.983c-20.484 0-37.146 16.535-37.146 36.86 0 8.064 2.63 15.533 7.076 21.61l-4.64 13.688 14.274-4.537A37.122 37.122 0 0 0 45.82 80.7c20.48 0 37.145-16.533 37.145-36.857S66.3 6.983 45.818 6.983zm22.31 46.956c-.272-.447-.993-.717-2.075-1.254-1.084-.537-6.41-3.138-7.4-3.495-.993-.36-1.717-.54-2.438.536-.72 1.076-2.797 3.495-3.43 4.212-.632.72-1.263.81-2.347.27-1.082-.536-4.57-1.672-8.708-5.332-3.22-2.848-5.393-6.364-6.025-7.44-.63-1.076-.066-1.657.475-2.192.488-.482 1.084-1.255 1.625-1.882.543-.628.723-1.075 1.082-1.793.363-.718.182-1.345-.09-1.884-.27-.537-2.438-5.825-3.34-7.977-.902-2.15-1.803-1.793-2.436-1.793-.63 0-1.353-.09-2.075-.09-.722 0-1.896.27-2.89 1.344-.99 1.077-3.788 3.677-3.788 8.964 0 5.288 3.88 10.397 4.422 11.113.54.716 7.49 11.92 18.5 16.223 11.01 4.3 11.01 2.866 12.996 2.686 1.984-.18 6.406-2.6 7.312-5.107.9-2.513.9-4.664.63-5.112z"></path>
												  </svg></span><span class="rrssb-text">Whatsapp</span>
											</a>
										</li>

									      <li class="rrssb-googleplus">
									        <!-- Replace href with your meta and URL information.  -->
									        <a href="https://plus.google.com/share?url=<?php echo $actual_link; ?>" class="popup">
									          <span class="rrssb-icon">
									            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M21 8.29h-1.95v2.6h-2.6v1.82h2.6v2.6H21v-2.6h2.6v-1.885H21V8.29zM7.614 10.306v2.925h3.9c-.26 1.69-1.755 2.925-3.9 2.925-2.34 0-4.29-2.016-4.29-4.354s1.885-4.353 4.29-4.353c1.104 0 2.014.326 2.794 1.105l2.08-2.08c-1.3-1.17-2.924-1.883-4.874-1.883C3.65 4.586.4 7.835.4 11.8s3.25 7.212 7.214 7.212c4.224 0 6.953-2.988 6.953-7.082 0-.52-.065-1.104-.13-1.624H7.614z"/></svg>            </span>
									          <span class="rrssb-text">google+</span>
									        </a>
									      </li>

									      <li class="rrssb-linkedin">
										      <div class="line-it-button" data-lang="en" data-type="share-d" data-url="<?php echo $actual_link; ?>" style="display: none;"></div>
										</li>
									<!-- </ul> -->
								</div>
							</ul>
							
							<div class="cp-thumb post">
								<figure style="background-color: white;">
								    
									<img class="img-responsive" src="<?php echo base_url().'uploads/berita/'.$result->img; ?>" alt="">
									<figcaption style="margin-top: 5px;text-align: justify;">
										<em><?= $result->source_image; ?></em>
									</figcaption>
								</figure>
							</div>
							<?= $result->content; ?>
						</div>
						<!--Tak-->
        				<div class="col-col col-md-1 col-xs-3" style="padding:unset; width:12%">
                            <p style="margin-top:5px"><i class="glyphicon glyphicon-tags"></i> TAGS :</p>
                        </div>
                        <style>
                    .tag__article__link {
                        padding: 5px 10px;
                        border-radius: 5px;
                        background: #dfdfdf;
                        display: block;
                        color:#333;
                    }
                    .tag__article__link:hover{
                        color:white;
                        background:#1966c1;
                    }
                </style>
                        <div class="col-md-10 col-xs-9" style="padding:unset">
                             <ul class="" style="list-style: none; padding-left:unset">
                                <?php 
                                //$tag = explode(";", $result->tags);
                                $tag = preg_split('/;|,/', $result->tags); 
                                foreach ($tag as $tag) {
                                    if($tag!="" && $tag!="0"){?>
                                        <li class="" style="padding-right:10px; display: inline-block; padding-bottom:5px"><a class="tag__article__link" style="font-size:12px" href="<?= base_url()?>tag/<?php echo str_replace(" ", "-", $tag);?>"><?php echo ucwords($tag)?></a></li>
                                        <?php 
                                    }
                                }?>
                            </ul>
                        </div>
                        <!--end Tak-->
						<div class="cp-post-share-tags">
							<div class="row">
								<div class="col-md-6">
									<ul class="cp-post-tags">
										<li><span><i class="fa fa-folder-o"></i></span></li>
										<li><a href="<?php echo base_url().'category/baca/'.$result->id_category;?>"><?= $result->title_; ?></a></li>
										<li>
    										<button class="but_print" id="but_print" style="background: transparent;border: unset;">
                                                <span><i class="fa fa-print"></i></span>  Print
                                            </button>
                                        </li>
									</ul>
								</div>
							</div>
						</div>
						
						<div class="cp-post-comments m50">
							<div class="section-title blue-border">
								<h2>Komentar</h2>
							</div>
							<div id="fb-root"></div>
						<script>(function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s); js.id = id;
                        js.src = "//connect.facebook.net/id_ID/all.js#xfbml=1&appId=89533811750";
                        fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));
                        </script>
                        <div class="fb-comments" data-href="<?php echo $url="https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>"
        data-num-posts="20" data-width="485">
                      </div>
						</div>
					</div> <!-- .cp-single-post -->

					<div class="cp-news-grid-style-1 m50">
						<div class="section-title blue-border">
							<h2>Berita Lainnya</h2>
							<small></small> 
						</div>
						<div class="row">
							<ul class="grid">
<?php
							
						if(isset($datas)){
							$on_no = 0;
							foreach ($datas as $d_on) :
								// $url_on 	= base_url().'berita/bacaberita/'.$d_on->id;
								$url_on 	= base_url().'read/'.$d_on->id.'/'.str_replace(array(',',' ','!','"'),array('_','-'),$d_on->title).'';
								
								
								if ($on_no % 2 == 0) {
									echo '</ul>';
									echo '<ul class="grid">';
								}
?>
								<li class="col-md-6 col-sm-6">
									<div class="cp-news-post-excerpt">
										<div class="cp-thumb">
											<img class="img-responsive" src="<?php echo base_url().'uploads/berita/'.$d_on->img; ?>" alt="">
										</div>
										<div class="cp-post-content">
											<div class="catname">
												<a class="catname-btn btn-purple waves-effect waves-button" href="">
													<?= $d_on->title_."\n"; ?>
												</a>
											</div>
											<h3>
												<a href="<?= $url_on; ?>">
													<?= $d_on->title."\n"; ?>
												</a>
											</h3>
											<ul class="cp-post-tools">
												<li><i class="fa fa-clock-o"></i> <?= format_date_in(2, substr($d_on->date, 0, 10)); ?></li>
											</ul>
										</div>
									</div>
								</li>
<?php
								$on_no++;
							endforeach;
						}
?>								

							</ul>
						</div>
					</div>

				</div> <!-- .col-md-8 -->

		