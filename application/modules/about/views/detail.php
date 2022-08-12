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
<div class="cp-inner-main-banner top-banner-bg1" style="background-color: white;padding-bottom: 24px;">
	<div class="container">
		<div class="col-md-12 hidden-xs">
			 <div class="row"> 
			    <?php 
			        if(isset($data_about->title)){
			            ?>
				<div class="col-md-6 col-xs-6">
			        <h1 style="float: left;"><a href="#!" style="color: black;"><?= $data_about->title; ?></a></h1>
				</div>
				<div class="col-md-6 col-xs-6">
				    <ul class="breadcrumb" style="color: black;float: right;">
				        <li><a href="<?php echo base_url(); ?>" style="color: black;">Home</a></li>
				        <li> Category</li>
					    <li> <?= $data_about->title; ?></li>
			        </ul>
				</div>
			    <?php
			        }else{
			    ?>
			        <div class="col-md-6 col-xs-12">
				        <h1 style="color: black;">All Category</h1>
					</div>
					<div class="col-md-6 col-xs-12">
					    <ul class="breadcrumb" style="color: black;">
					        <li><a href="<?php echo base_url(); ?>" style="color: black;">Home</a></li>
					        <li> Category</li>
						    <li> All Category</li>
				        </ul>
					</div>
			    <?php
			        }
			    ?>
				<div class="col-md-12 col-xs-12"><div class="col-md-12" style="border-bottom: 1px solid #ddd;"></div></div>
			 </div> 
		</div>
		<div class="inner-title visible-xs">
		    <?php 
		        if(isset($data_about->title)){
		            ?>
		            <h1 style="color: black;"><?= $data_about->title; ?></h1>
			        <ul class="breadcrumb" style="color: black;">
			        	<li><a href="<?php echo base_url(); ?>" style="color: black;">Home</a></li>
			        	<li> Category</li>
				        <li> <?= $data_about->title; ?></li>
		        	</ul>
		    <?php
		        }else{
		    ?>
		        <h1 style="color: black;">All Category</h1>
			        <ul class="breadcrumb" style="color: black;">
			        	<li><a href="<?php echo base_url(); ?>" style="color: black;">Home</a></li>
			        	<li>Category</li>
				        <li>All Category</li>
		            </ul>
		    <?php
		        }
		    ?>
		
		</div>
	</div>
</div>

   <div class="container">
       <div class="cp-news-grid-style-5">
   <!-- Tengah -->
        <div class="col-sm-8">		
			<div class="panel panel-default">	
                 <div class="cp-single-post">
					<div class="cp-post-content">
						<!--<h3><a href="#!"><?php //echo $data_about->title; ?></a></h3>-->
						<?= $data_about->content; ?>
					</div>
				</div>
			</div>
		</div><!-- /.Tengah -->
				  
				  
                      
                     