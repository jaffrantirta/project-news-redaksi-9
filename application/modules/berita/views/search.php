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
  <div class="cp-inner-main-banner top-banner-bg1">
	<div class="container">
		<div class="inner-title">
			<?php if (isset($search))
            { ?>
                <h1>
                	Hasil pencarian berdasarkan kata
                    kunci 
                </h1>
                <h1>
                	"<?php echo isset($search) ? $search : "" ?>"
                </h1>
                <?php $this->session->set_flashdata('search', $search);
            } ?>
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
                        $url_n 		= base_url().'read/'.$d_n->id.'/'.str_replace(array(',',' ','!','"'),array('_','-'),$d_n->title).'';
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
                    </nav>
                </div>
                      
						                        
                  </div>
			</div>
		</div><!-- /.Tengah -->
				  
				  
                      
                     