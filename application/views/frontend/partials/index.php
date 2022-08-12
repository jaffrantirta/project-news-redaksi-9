<?php
function getPermalink($link)
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

<style type="text/css">
    hr.garis {
	border: 0;
	margin-top:20px;
	clear:both;
	display:block;
	width: 96%;               
	background-color:#cfcfcf;
	height: 2px;
	}
	
	/* width */
	::-webkit-scrollbar {
	  width: 10px;
	}

	/* Track */
	::-webkit-scrollbar-track {
	  background: #f1f1f1; 
	}
	 
	/* Handle */
	::-webkit-scrollbar-thumb {
	  background: #888; 
	}

	/* Handle on hover */
	::-webkit-scrollbar-thumb:hover {
	  background: #555; 
	}
	@media (max-width: 767px) { 
		.headline a img {
			width: 100%;
		}

		.headline span {
		    font-weight: bold;
		    font-size: 20px;
		    line-height: 100%;
		    color: #fff;
		}

		.headline small {
			color: #fff;
			font-size: 12px;
		}

		.headline .big {
			padding: 0px;
		}

		.headline .small, .headline .small-div {
			padding: 0px;
		}

		.headline-big-wrapper, .headline-small-wrapper, .headline-column-wrapper {
			position: relative;
		}

		.banner-adv {
			width: 350px;
			height: 50px;
		}

		.with-padding {
			padding: 15px 15px !important;
		}

		.img-continue{
			height: unset !important;
		}

		.title-wrap{
			font-size: 20px !important;
		}
	}

	@media (min-width: 767px) {
		.headline .big {
			padding: 0px;
		}

		.headline .small, .headline .small-div {
			padding: 0px;
		}

		.main-content.slider {
			padding-top: 0px;
			padding-bottom: 0px;
		}

		.headline {
			padding: 0 15px;
		}

		.headline .right {
			padding-left: 2px;
		}

		.headline .left {
			padding-right: 2px;
		}

		.headline .top {
			padding-bottom: 4px;
		}

		.headline-small-wrapper {
			height: 150px;
			object-fit: cover;
			overflow: hidden;
			position: relative;
		}

		.headline-column-wrapper {
			height: 200px;
			object-fit: cover;
			overflow: hidden;
			position: relative;
		}

		.headline-column-wrapper img {
			width: 100%;
		    height: 200px;
		    object-position: 50% 50%;
		}

		.headline-big-wrapper img {
			width: 100%;
			height: 454px;
			/*object-fit: none;*/
			object-position: 50% 50%;
		}

		.headline-small-wrapper img {
			width: 100%;
		    /*object-fit: none;*/
		    /*object-position: 50% 100%;*/
		}

		.headline-big-wrapper {
			height: 354px;
			overflow: hidden;
			position: relative;
		}

		.headline-big-wrapper p, .headline-small-wrapper p {
			margin: 0px;
		}

		.headline-caption-column span {
		    font-weight: bold;
		    font-size: 20px;
		    line-height: 100%;
		    color: #fff;
		}

		.headline-caption-column small {
			color: #fff;
			font-size: 12px;
		}

		.headline-caption span, .headline-caption-big span {
		    font-weight: bold;
		    font-size: 24px;
		    line-height: 100%;
		    color: #fff;
		}

		.headline-caption small, .headline-caption-big small {
			color: #fff;
			font-size: 12px;
		}
	}
	

	.headline-caption {
		background: linear-gradient(to bottom,transparent 0,rgba(0,0,0,.47) 31%,rgba(0,0,0,.7) 100%);
		width: 100%;
		left: auto;
		right: auto;
		bottom: 0;
		text-align: left;
		padding: 10px;
		position: absolute;
	}

	.headline-caption-big {
		background: linear-gradient(to bottom,transparent 0,rgba(0,0,0,.47) 31%,rgba(0,0,0,.7) 100%);
		width: 100%;
		left: auto;
		right: auto;
		bottom: 0;
		text-align: left;
		padding: 20px;
		position: absolute;
	}

	.headline-caption-column {
		background: linear-gradient(to bottom,transparent 0,rgba(0,0,0,.47) 31%,rgba(0,0,0,.7) 100%);
		width: 100%;
		left: auto;
		right: auto;
		bottom: 0;
		text-align: left;
		padding: 10px;
		position: absolute;
	}

	.no-padding {
		padding: 0;
	}

	.headline a:hover img {
	    opacity: .7;
	    transform: scale(1.02);
	}

</style>


<div class="container slider" style="padding-top: 20px;">
	<div class="row headline">
		<div class="col-md-12">
			<div class="row">
				
<?php
	

	$countnya = 1;

	if(isset($news)){
	foreach ($news as $d_hl) :
		// $url_hl 	= base_url().'berita/bacaberita/'.$d_hl->id.'';
		$url_hl 	= base_url().'read/'.$d_hl->id.'/'.getPermalink($d_hl->title).'';

		if ($countnya==1) :
?>
				<div class="col-md-6 big left">
					<div class="col-md-12 no-padding with-padding">
						<div class="headline-big-wrapper">
							<a href="<?php echo $url_hl; ?>">
								<img src="<?php echo base_url().'uploads/berita/'.$d_hl->img; ?>" class="img-responsive">
								<div class="headline-caption-big">
									<div class="catname">
										<a class="catname-btn btn-purple btn-xs waves-effect waves-button" href="<?= base_url().'category/baca/'.$d_hl->id_category; ?>" style="font-size: 10px;background-color: #FF474F;">
											<?= $d_hl->title_; ?>
										</a>
									</div></br>
									<span><a href="<?php echo $url_hl; ?>" style="color: white;"><?php echo $d_hl->title; ?></a></span>
									<p><small><?= format_date_in(2, substr($d_hl->date, 0, 10)); ?></small></p>
								</div>
							</a>
						</div> <!-- .headline-big-wrapper -->
					</div> 
				</div> <!-- .col-md-6 big left -->
<?php
		endif;

		if ($countnya==2 || $countnya==3 || $countnya==4 || $countnya==5) :
				if ($countnya==2) :
?>
			<div class="col-md-3 big right">
				<div class="row-fluid">
					<div class="col-md-12 small top with-padding">
						<div class="headline-small-wrapper">
							<a href="<?php echo $url_hl; ?>">
								<img src="<?php echo base_url().'uploads/berita/'.$d_hl->img; ?>">
								<div class="headline-caption">
									<div class="catname">
										<a class="catname-btn btn-purple btn-xs waves-effect waves-button" href="<?= base_url().'category/baca/'.$d_hl->id_category; ?>" style="font-size: 9px;background-color: #ff6600;">
											<?= $d_hl->title_; ?>
										</a>
									</div></br>
									<span class="title-wrap" style="font-size: 15px;"><a href="<?php echo $url_hl; ?>" style="color: white;"><?php echo $d_hl->title; ?></a></span>
									<p><small><?= format_date_in(2, substr($d_hl->date, 0, 10)); ?></small></p>
								</div>
							</a>
						</div>
					</div>
<?php
				endif;

				if ($countnya==3) :
?>				
					<div class="col-md-12 small-div left">
						<div class="col-md-12 no-padding with-padding">
							<div class="headline-column-wrapper">
								<a href="<?php echo $url_hl; ?>">
									<img src="<?php echo base_url().'uploads/berita/'.$d_hl->img; ?>">
									<div class="headline-caption-column">
										<div class="catname">
											<a class="catname-btn btn-green btn-xs waves-effect waves-button" href="<?= base_url().'category/baca/'.$d_hl->id_category; ?>" style="font-size: 9px;background-color: #8eb021;">
												<?= $d_hl->title_; ?>
											</a>
										</div></br>
										<span class="title-wrap" style="font-size: 15px;"><a href="<?php echo $url_hl; ?>" style="color: white;"><?php echo $d_hl->title; ?></a></span>
										<p><small><?= format_date_in(2, substr($d_hl->date, 0, 10)); ?></small></p>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php
				endif;
				
								if ($countnya==4) :
?>
<div class="col-md-3 big right">
				<div class="row-fluid">
					<div class="col-md-12 small top with-padding">
						<div class="headline-small-wrapper">
							<a href="<?php echo $url_hl; ?>">
								<img src="<?php echo base_url().'uploads/berita/'.$d_hl->img; ?>">
								<div class="headline-caption">
									<div class="catname">
										<a class="catname-btn btn-purple btn-xs waves-effect waves-button" href="<?= base_url().'category/baca/'.$d_hl->id_category; ?>" style="font-size: 9px;background-color: #ff6600;">
											<?= $d_hl->title_; ?>
										</a>
									</div></br>
									<span class="title-wrap" style="font-size: 15px;"><a href="<?php echo $url_hl; ?>" style="color: white;"><?php echo $d_hl->title; ?></a></span>
									<p><small><?= format_date_in(2, substr($d_hl->date, 0, 10)); ?></small></p>
								</div>
							</a>
						</div>
					</div>
<?php
				endif;

				if ($countnya==5) :
?>				
					<div class="col-md-12 small-div left">
						<div class="col-md-12 no-padding with-padding">
							<div class="headline-column-wrapper">
								<a href="<?php echo $url_hl; ?>">
									<img src="<?php echo base_url().'uploads/berita/'.$d_hl->img; ?>">
									<div class="headline-caption-column">
										<div class="catname">
											<a class="catname-btn btn-green btn-xs waves-effect waves-button" href="<?= base_url().'category/baca/'.$d_hl->id_category; ?>" style="font-size: 9px;background-color: #8eb021;">
												<?= $d_hl->title_; ?>
											</a>
										</div></br>
										<span class="title-wrap" style="font-size: 15px;"><a href="<?php echo $url_hl; ?>" style="color: white;"><?php echo $d_hl->title; ?></a></span>
										<p><small><?= format_date_in(2, substr($d_hl->date, 0, 10)); ?></small></p>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			
<?php
				endif;
//END TAMBAHAN
?>

<?php
		endif;
		$countnya++;

	endforeach;
	}
?>
			</div>
		</div>
		<!--<div class="col-md-4">-->
		<!--	<div class="title__content">Ekonomi dan Bisnis</div></br>-->
		<!--	<div class="col-md-12 small-div right" style="padding-left: unset;">-->
		<!--		<div class="col-md-12 no-padding">-->
					<?php 
					//foreach ($ekobisnis as $data_ekobisnis) {
						// $url_ekobisnis 	= base_url().'berita/bacaberita/'.$data_ekobisnis->id.'';
						//$url_ekobisnis 	= base_url().'read/'.$data_ekobisnis->id.'/'.getPermalink($data_ekobisnis->title).'';
					?>
					<!--<div class="headline-column-wrapper" style="height:316.4px;">-->
					<!--	<a href="<?php echo $url_ekobisnis; ?>">-->
					<!--		<img src="<?php echo base_url().'uploads/berita/'.$data_ekobisnis->img; ?>" style="height: -webkit-fill-available;">-->
					<!--		<div class="headline-caption-column">-->
					<!--			<span><?php echo $data_ekobisnis->title; ?></span>-->
					<!--			<p><small><?= format_date_in(2, substr($data_ekobisnis->date, 0, 10)); ?></small></p>-->
					<!--		</div>-->
					<!--	</a>-->
					<!--</div>-->
				<?php //}  ?>
		<!--		</div>-->
		<!--	</div>-->

		<!--</div>-->
	</div> <!-- .row headline -->
</div>

<!-- <br> -->
<br>

<div class="main-content">
<div class="container">
<div class="row">
	<div class="col-md-12">
		<div style="text-align: center;margin-bottom:30px; ">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		        <div class="carousel-inner" role="listbox" style="height: 90px;">
		            <?php 
		            if(isset($banner)){ 
		                $no=0;
		                foreach ($banner as $data_banner) {
		                    if($data_banner->position == 'DM03'){
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
	</div>
	<div class="col-md-8">
	    <div class="row" style="margin-bottom: 40px;">
	    	<div class="col-md-4">
	    		<div class="cp-news-grid-style-5 m20" style="height: 1900px;overflow: auto;">
					<div class="title__content">Berita Global</div>
					<div>
		<?php
					
				if(isset($global)){
					foreach ($global as $d_nt) :
						// $url_nt 	= base_url()."berita/bacaberita/".$d_nt->id;
						$url_nt 	= base_url().'read/'.$d_nt->id.'/'.getPermalink($d_nt->title).'';
						

						$url_kat_nt	= base_url()."category/baca/".$d_nt->id_category;
		?>						
						<div class="cp-news-list">
							<ul class="row">
								
								<li class="col-md-9 col-sm-9">
									<div class="cp-post-content" style="padding: 0 0 15px 0;">
										<h4>
											<a href="<?= $url_nt; ?>">
												<?= $d_nt->title."\n"; ?>
											</a>
										</h4>
										<ul class="cp-post-tools">
											<li class="besar">
												<a style="color:red" href="<?= $url_kat_nt; ?>">
													<?= $d_nt->title_."\n"; ?>
												</a>
											</li>
											<li>
												<?= str_replace("-", "/", substr($d_nt->date, 0, 10)).", ".substr($d_nt->date, 10, 6)." WITA"; ?>
											</li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
		<?php
					endforeach;
				}else{
					echo "<div class='alert alert-danger'>Data Belum Diunggah Unggahan</div>";
				}
		?>	
						
					</div>
				</div> <!-- .cp-news-grid-style-5 m20 -->
	    	</div>
			<div class="col-md-8">
				<div class="cp-news-grid-style-5 m20" style="height: 1900px;overflow: auto;">
					<div>
		<?php
					
				if(isset($news_cat)){
					foreach ($news_cat as $d_nt) :
						// $url_nt 	= base_url()."berita/bacaberita/".$d_nt->id;
						$url_nt 	= base_url().'read/'.$d_nt->id.'/'.getPermalink($d_nt->title).'';
						
						
						$url_kat_nt	= base_url()."category/baca/".$d_nt->id_category;
		?>						
						<div class="cp-news-list">
							<ul class="row">
								<li class="col-md-3 col-sm-3">
									<div class="cp-thumb">
										<img src="<?php echo base_url().'uploads/berita/'.$d_nt->img; ?>" class="img-continue" style="height: 100px;">
									</div>
								</li>
								<li class="col-md-9 col-sm-9">
									<div class="cp-post-content">
										<h3 style="font-family: 'Noto Serif' !important;font-weight: 900;">
											<a href="<?= $url_nt; ?>">
												<?= $d_nt->title."\n"; ?>
											</a>
										</h3>
										<ul class="cp-post-tools">
											<li class="besar">
												<a style="color:red" href="<?= $url_kat_nt; ?>">
													<?= $d_nt->title_."\n"; ?>
												</a>
											</li>
											<li>
												<?= str_replace("-", "/", substr($d_nt->date, 0, 10)).", ".substr($d_nt->date, 10, 6)." WITA"; ?>
											</li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
		<?php
					endforeach;
				}else{
					echo "<div class='alert alert-danger'>Data Berita Kurang Dari 5 Unggahan</div>";
				}
		?>				
					</div>
				</div> <!-- .cp-news-grid-style-5 m20 -->
			</div>
			
			<!--tambahan-->
			<div style="clear:both;"></div>
			<br>
			
			<hr class="garis">

			<div class="row">
				<div class="col-md-12">
					<div class="col-md-12" style="color:#fc2121;">
						<h2>Kategori</h2>
					</div>
				</div>

			
			<?php
			$kanal_news = $this->db->query("SELECT * FROM kategori WHERE id IN (1,2,3,4,5,8,9,10) ORDER BY FIELD(id, 1,2,3,4, 5,10,8,9)");
			
			foreach ($kanal_news->result_array() as $k_news){?>
			
					<div class="col-md-6 no-padding">
						<div class="kanal-body">
							<h4><?=$k_news['title_'];?></h4>
							<ul>
								<?php
								$coba=$k_news['id'];
								$count = 1;
								$berita = $this->db->query("SELECT * FROM berita WHERE id_category=$coba ORDER BY date DESC LIMIT 3");

			

									foreach ($berita->result_array() as $berita) {
										// $url_k 	= base_url().'berita/bacaberita/'.$berita["id"];
										$url_k 	= base_url().'read/'.$berita["id"].'/'.str_replace(array(',',' ','!','"'),array('_','-'),$berita["title"]).'';
											if ($count==1) {
								?>
													<li class="media top">
														<p><i class="fa fa-clock-o"></i> <?= format_date_in(2, substr($berita["date"], 0, 10)); ?></p>
														<div class="media-left">
															<img src="<?php echo base_url().'uploads/berita/'.$berita["img"]; ?>" style="height: 60px;">
														</div>
														<div class="media-body top">
															<a href="<?= $url_k; ?>"><?= $berita["title"]; ?></a>
														</div>
													</li>
								<?php
											} else {
								?>					
													<li class="media">
														<div class="media-body">
															<a href="<?= $url_k; ?>">
															<?= $berita["title"]; ?></a>
														</div>
													</li>
								<?php
											}
										$count++;
									}
									?>
							</ul>
						</div>
					</div>
				
			<?php
			}
			?>
			</div> <!-- .row -->
			
	    </div>
</div> <!-- .col-md-8 -->












