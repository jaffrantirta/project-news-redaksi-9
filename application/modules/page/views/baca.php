  <?php
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
<div class="main-content">
	<div class="cp-post-details">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="cp-single-post">
					    <div class="cp-post-content">
							<ul class="breadcrumb">
								<li><a href="<?php echo base_url(); ?>">Home</a></li>
								<li> <?= $result->MENU_TITLE; ?></li>
							</ul>
							<h3><a href="#!"><?= $result->MENU_TITLE; ?></a></h3>
                  <?php
				  
				    
				    echo '
                      <p>
                      <div style="text-align: justify;">
                      '.$result->MENU_KONTEN.' 
                      </div>
                      </p>
                      <hr />';
				  ?>
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
						                        
                  </div>
			
		</div><!-- /.Tengah -->
				  
				  
                      
                     