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
<div class="container">
        <!-- Tengah -->
        <div class="col-md-8">		
				<div class="panel panel-primary">
					<script>
					$(document).ready(function(){

					loadGallery(true, 'a.thumbnail');

					//This function disables buttons when needed
					function disableButtons(counter_max, counter_current){
						$('#show-previous-image, #show-next-image').show();
						if(counter_max == counter_current){
							$('#show-next-image').hide();
						} else if (counter_current == 1){
							$('#show-previous-image').hide();
						}
					}

					
					function loadGallery(setIDs, setClickAttr){
						var current_image,
							selector,
							counter = 0;

						$('#show-next-image, #show-previous-image').click(function(){
							if($(this).attr('id') == 'show-previous-image'){
								current_image--;
							} else {
								current_image++;
							}

							selector = $('[data-image-id="' + current_image + '"]');
							updateGallery(selector);
						});

						function updateGallery(selector) {
							var $sel = selector;
							current_image = $sel.data('image-id');
							$('#image-gallery-caption').text($sel.data('caption'));
							$('#image-gallery-title').text($sel.data('title'));
							$('#image-gallery-image').attr('src', $sel.data('image'));
							disableButtons(counter, $sel.data('image-id'));
						}

						if(setIDs == true){
							$('[data-image-id]').each(function(){
								counter++;
								$(this).attr('data-image-id',counter);
							});
						}
						$(setClickAttr).on('click',function(){
							updateGallery($(this));
						});
					}
				});
					</script>
					<div class="panel-heading" style="background-color:#ef5c26;color:#ffffff;font-size:20px;font-weight:bold">Lihat Album</div>
					<div class="panel-body" style="background:white">
						<h4>
							
							Kumpulan Foto <?php echo $data->title;?>
							
						</h4>
						<hr />
                    
					<?php
                    
                    if (isset($datas))
        {
            $index = 1;
            if(isset($page)&&$page!=0)
                $index = $index+$page;
                $no=0;
                    
                   foreach ($datas as $baris1){
						if($no==3){
							?>
							</div>
							<div class="panel-body" style="background:white">
							<?php
							$no=0;
						}
						?>
						<div class="col-md-4">
							<a class="thumbnail" href="#" data-image-id="<?php echo $baris1->id;?>" data-toggle="modal" data-title="<?php echo $baris1->title;?>" data-caption="<?php echo strip_tags($baris1->content);?>" data-image="<?php echo base_url();?>uploads/foto/<?php echo $baris1->img;?>" data-target="#image-gallery">
								<?php
								if($baris1->img==""){
									?>
									<img class="media-object" src="<?php echo base_url();?>uploads/null.jpg" width="100%" style="border:1px solid #ccc;padding:3px;"/>  
									<?php
								}else{
										?>
										<img class="media-object" src="<?php echo base_url();?>uploads/foto/<?php echo $baris1->img;?>" width="100%" style="border:1px solid #ccc;padding:3px;">
										<?php  
									}
								
								?>
							</a><br>
							
							<div class="modal fade" id="image-gallery" style="z-index:50000"tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<?php /*<div class="modal fade" id="modal-container-<?php echo $baris1["id"];?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">*/?>
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											<h4 class="modal-title" id="myModalLabel image-gallery-title">
												<h5><?php echo $baris1->title;?></h5>
											</h4>
										</div>
										<div class="modal-body">
											<?php
											if($baris1->img==""){
												?>
												<img id="image-gallery-image" class="media-object" src="<?php echo base_url();?>uploads/null.jpg" width="100%"/>  
												<?php
											}else{
													?>
													<img id="image-gallery-image" class="media-object" src="<?php echo base_url();?>uploads/foto/<?php echo $baris1->img;?>" width="100%">
													<?php  
												}
											
											?>
										</div>
										<div class="modal-footer">
											<div class="col-md-2">
												<button type="button" class="btn btn-primary" id="show-previous-image">Previous</button>
											</div>
											<div class="col-md-8 text-justify" id="image-gallery-caption" style="text-align:left;"></div>
											<div class="col-md-2">
												<button type="button" id="show-next-image" class="btn btn-default">Next</button>
											</div>
										</div>
									</div>
									
								</div>
								
							</div>
						</div>
						<?php 
						$no++;
						$index++;
                    }}
					?>
					</div>
					<div class="panel-body" style="background:white">
					
				
				    
				    <?php echo $this->pagination->create_links(); ?>
                    <?php echo validation_errors(); ?>
                    <?php if (isset($result)) echo $result; ?>
				
				   
                	</div>
					<div class="panel-body" style="background:white" align="center">
						<a href="<?php echo base_url();?>foto/" class="btn btn-primary" style="font-weight:bold;">Kembali ke Arsip Foto</a>
					</div>
        		</div>
		</div><!-- /.Tengah -->
