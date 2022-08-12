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
  <div class="cp-inner-main-banner top-banner-bg1" style="background-color: white;padding-bottom: 24px;">
	<div class="container">
		<div class="col-md-12 hidden-xs">
			<!-- <div class="row"> -->
				<div class="col-md-6 col-xs-6">
			        <h1 style="color: black;float: left;">#<?= str_replace("-", " ", $this->uri->segment(2)) ?></h1>
				</div>
				<div class="col-md-6 col-xs-6">
				    <ul class="breadcrumb" style="color: black;float: right;">
				        <li><a href="<?php echo base_url(); ?>" style="color: black;">Home</a></li>
				        <li> Tags</li>
					    <li> <?= str_replace("-", " ", $this->uri->segment(2)) ?></li>
			        </ul>
				</div>
				<div class="col-md-12 col-xs-12"><div class="col-md-12" style="border-bottom: 1px solid #ddd;"></div></div>
			<!-- </div> -->
		</div>
		<div class="inner-title visible-xs">
		    <?php 
		        if(isset($title->title_)){
		            ?>
		            <h1 style="color: black;"><?= $title->title_; ?></h1>
			        <ul class="breadcrumb" style="color: black;">
			        	<li><a href="<?php echo base_url(); ?>" style="color: black;">Home</a></li>
			        	<li> Category</li>
				        <li> <?= $title->title_; ?></li>
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
                  <div class="panel-body" style="background:white">
                  <?php
					
					if (isset($datas))
        {
            $index = 1;
            if(isset($page)&&$page!=0)
                $index = $index+$page;
					foreach ($datas as $d_n)
                    {
                        // $url_n 		= base_url().'berita/bacaberita/'.$d_n->id;
                        $url_n 		= base_url().'read/'.$d_n->id.'/'.getPermalink($d_n->title).'';
?>
						<div class="cp-news-list">
							<ul class="row">
								<li class="col-md-5 col-sm-5">
									<div class="cp-thumb">
											<img alt src="<?php echo base_url().'uploads/berita/'.$d_n->img; ?>">
									</div>
								</li>
								<li class="col-md-7 col-sm-7">
									<div class="cp-post-content">
										<h3>
											<a href="<?= $url_n; ?>">
												<?= $d_n->title."\n"; ?>
											</a>
										</h3>
										<ul class="cp-post-tools">
											<li>
												<i class="fa fa-clock-o"></i> 
												<?= format_date_in(2, substr($d_n->date, 0, 10)); ?>
											</li>
										</ul>
										<p><?= substr(strip_tags($d_n->content), 0, 150)."..."; ?></p>
									</div>
								</li>
							</ul>
						</div>
<?php
                        $index++;
                    }}
                    ?>
                    <div class="pagination-holder">
					<nav>
                    <?php echo $this->pagination->create_links(); ?>
                    <?php echo validation_errors(); ?>
                    <?php if (isset($result)) echo $result; ?>
                    </nav>
                </div>
                      
						                        
                  </div>
			</div>
		</div><!-- /.Tengah -->
				  
				  
                      
                     