  <?php
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
  ?>
<div class="main-content">
	<div class="cp-post-details">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="cp-single-post">
						<div class="cp-post-content">
							<ul class="breadcrumb">
								<li><a href="<?php echo base_url(); ?>">Home</a></li>
								<li><a href="<?php echo base_url().'video/'; ?>">Redaksi9 TV</a></li>
							</ul>
							<style type="text/css">
								.video-container {
									position:relative;
									padding-bottom:56.25%;
									padding-top:30px;
									height:0;
									overflow:hidden;
								}

								.video-container iframe, .video-container object, .video-container embed {
									position:absolute;
									top:0;
									left:0;
									width:100%;
									height:100%;
								}
							</style>
							<h3><a href="#!"><?= $result->title; ?></a></h3>
							<ul class="cp-post-tools">
								<li><i class="fa fa-calendar"></i> <?= format_date_in(2, substr($result->date, 0, 10)); ?></li>
								<li><i class="fa fa-clock-o"></i> <?= substr($result->date, 10, 6)." WITA"; ?></li>
							</ul>
							<div class="media well">
                        <iframe width="100%" height="320" src="<?= $result->source?>" frameborder="0" allowfullscreen></iframe>
                      </div>
							<?= $result->content; ?>
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
							

							$on_no = 0;
							if(isset($datas)){
							foreach ($datas as $d_on) :
								// $url_on 	= base_url().'video/bacavideo/'.$d_on->id;
								$url_on 	= base_url().'video/'.$d_on->id.'/'.str_replace(array(',',' ','!','"'),array('_','-'),$d_on->title).'';
								$alamat_img = "https://img.youtube.com/vi/".yt_id($d_on->source)."/hqdefault.jpg";
								
								if ($on_no % 2 == 0) {
									echo '</ul>';
									echo '<ul class="grid">';
								}
?>
								<li class="col-md-6 col-sm-6">
									<div class="cp-news-post-excerpt">
										<div class="cp-thumb">
											<img class="img-responsive" src="<?= $alamat_img; ?>" alt="">
										</div>
										<div class="cp-post-content">
											<div class="catname">
												<a class="catname-btn btn-purple waves-effect waves-button" href="<?= $url_on; ?>">
													<?= "Redaksi9 TV"."\n"; ?>
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

		