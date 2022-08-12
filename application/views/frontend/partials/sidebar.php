<?php if(isset($is_index)){ ?>
<main>
<?php } ?>
<div class="col-md-4 col-xs-12">
	<div class="row">
		<div class="col-md-12 col-xs-12">
			
			<div style="text-align: center;margin-bottom:30px; ">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				  	<div class="carousel-inner" role="listbox" style="height: 350px;">
					<?php 
		            if(isset($banner)){ 
		            	$no=0;
		                foreach ($banner as $data_banner) {
		                    if($data_banner->position == 'DM04'/* && $data_banner->end_date =! date('Y-m-d H:i:s')*/){
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
		            			<img src="<?php echo base_url().'uploads/banner/'.$data_banner->img;?>" class="banner-adv" width="300" style="object-fit: fill;height: 350px;">
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
		            			<img src="<?php echo base_url().'uploads/banner/'.$data_banner->img;?>" class="banner-adv" width="300" style="object-fit: fill;height: 350px;">
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
		<div class="col-md-12 col-xs-12">
			
			<div class="sidebar side-bar right-sidebar">

				<div class="widget latest-posts">
					<div class="most ga--most clearfix">
						<div class="title title--center clearfix">
							<div class="title__content populerlink">Terpopuler</div>
						</div></br>
						<div class="cp-sidebar-content">
							<ul class="small-grid">
			<?php
							$sn_no 			= 1;
							if(count($baru)){
							foreach ($baru as $d_sn){
								// $url_sn 	= base_url().'berita/bacaberita/'.$d_sn->id;
								$url_sn 	= base_url().'read/'.$d_sn->id.'/'.str_replace(array(',',' ','!','"'),array('_','-'),$d_sn->title).'';
			?>				
								<li>
									<div class="small-post">
										<div class="cp-thumb">
											<img class="" src="<?= base_url().'uploads/berita/'.$d_sn->img; ?>" alt="">
										</div>
										<div class="cp-post-content">
											<h3>
												<a href="<?= $url_sn; ?>">
													<?= $d_sn->title."\n"; ?>
												</a>
											</h3>
											<ul class="cp-post-tools">
												<li><i class="fa fa-clock-o"></i> <?= format_date_in(2, substr($d_sn->date, 0, 10)); ?></li>
												<li>Dibaca <?= $d_sn->hit; ?> kali</li>
											</ul>
										</div>
									</div>
								</li>
			<?php
								$sn_no++;
						}}
			?>					
							</ul>
						</div>
						
					</div>
				</div>

				
				<div class="widget advertisement">
					
				</div>

				<div class="widget latest-posts">
					<div class="title title--center clearfix">
						<div class="title__content populerlink">Redaksi9 TV</div>
					</div>
					<br/>
					<div class="cp-sidebar-content">
						<ul class="small-grid">
		<?php
					
					if(isset($video)){
						foreach ($video as $d_sn_2) :
							// $url_sn_2 	= base_url().'video/bacavideo/'.$d_sn_2->id;;
							$url_sn_2 	= base_url().'video/'.$d_sn_2->id.'/'.str_replace(array(',',' ','!','"'),array('_','-'),$d_sn_2->title).'';
							$alamat_img = "https://img.youtube.com/vi/".yt_id($d_sn_2->source)."/hqdefault.jpg";
		?>				
							<li>
								<div class="small-post">
									<div class="cp-thumb">
										<img class="img-responsive" src="<?= $alamat_img; ?>" alt="">
									</div>
									<div class="cp-post-content">
										<h3>
											<a href="<?= $url_sn_2; ?>">
												<?= $d_sn_2->title."\n"; ?>
											</a>
										</h3>
										<ul class="cp-post-tools">
											<li><i class="fa fa-clock-o"></i> <?= format_date_in(2, substr($d_sn_2->date, 0, 10)); ?></li>
										</ul>
									</div>
								</div>
							</li>
		<?php
							$sn_no++;
						endforeach;
					}
		?>					
						</ul>
					</div>
				</div> <!-- .widget latest-posts -->
				
				<!-- PODCAST -->
				<div class="widget latest-posts"> 
					<div class="title title--center clearfix">
						<div class="title__content populerlink">Redaksi9 PODCAST</div>
					</div>
					<br/>
					<div class="cp-sidebar-content">
						<ul class="small-grid">
							<li>
								<div class="small-post">
									<div class="cp-thumb">
										<img class="img-responsive" src="<?= base_url('public/images/podcast_logo.jpg') ?>" alt="">
									</div>
									<div class="cp-post-content">
										<h3>
											<a href="https://anchor.fm/redaksi9">
												Suara Redaksi9
											
											<ul class="" style="font-size: 12px; color: grey;">
												Podcast ini akan membahas tentang berbagai hal yang menarik termasuk berbagi tips kreatif untuk sahabat Redaksi9.com
											</ul>
											</a>
										</h3>
									</div>
								</div>
							</li>			
						</ul>
					</div>
				</div> <!-- .widget latest-posts -->
				

				<div class="widget facebook-widget">
					<!-- <h3 class="side-title">Facebook</h3> -->
					<div class="cp-sidebar-content">
						<div id="fb-root"></div>
						<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) return;
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=346476232456896";
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>
						<?php
						    foreach($pengaturan as $pengaturan){
						        
						    }
						?>
						<div class="fb-page" data-href="<?= $pengaturan->widget_facebook; ?>" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?= $pengaturan->widget_facebook; ?>" class="fb-xfbml-parse-ignore"><a href="<?= $pengaturan->widget_facebook; ?>"><?= $pengaturan->website; ?></a></blockquote></div>
					</div>
				</div> <!-- .widget facebook-widget -->
			</div>
		</div>

		<div class="col-md-12 col-xs-12">
			
			<div style="text-align: center;margin-bottom:30px; ">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				  	<div class="carousel-inner" role="listbox" style="height: 350px;">
					<?php 
		            if(isset($banner)){ 
		            	$no=0;
		                foreach ($banner as $data_banner) {
		                    if($data_banner->position == 'DM05'){
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
		            			<img src="<?php echo base_url().'uploads/banner/'.$data_banner->img;?>" class="banner-adv" width="300" style="object-fit: fill;height: 350px;">
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
		            			<img src="<?php echo base_url().'uploads/banner/'.$data_banner->img;?>" class="banner-adv" width="300" style="object-fit: fill;height: 350px;">
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
		<!-- </div>  -->
	</div>
</div> <!-- .col-md-4 -->
<?php if(isset($is_index)){ ?>
</main>
<?php } ?>