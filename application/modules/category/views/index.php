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
?>
<!-- Tengah -->
<div class="cp-inner-main-banner top-banner-bg1">
	<div class="container">
		<div class="inner-title">
			
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li> Category</li>
			</ul>
		</div>
	</div>
</div>
<div class="main-content">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
				    <div>
                    
					<?php
					
					if (isset($datas))
        {
            $index = 1;
            if(isset($page)&&$page!=0)
                $index = $index+$page;
					foreach ($datas as $d_n)
                    {
                        $url_n 		= "";
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
                    
              
              
              
