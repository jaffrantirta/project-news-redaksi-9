<style type="text/css">
	.kanal-body {
		padding: 20px 30px 5px 30px;
		/*border: 1px solid #BFBFBF;*/
	}
	.kanal-body.middle {
		border-left: none;
		border-right: none;
	}
	.bottom .kanal-body {
		border-top: none;
	}
	.kanal-body a {
		color: #000;
	}
	.kanal-body h4 {
		text-transform: uppercase;
		border-bottom: 1px solid;
		padding-bottom: 10px;
		margin: 4px 0;
	}
	.kanal-body .media-left img {
		width: 85px;
		height: auto;
	}
	.kanal-body .media {
		margin: 0;
		padding: 10px 0;
		border-bottom: 1px dotted #BFBFBF;
		height: 70px;
    	overflow: hidden;
	}
	.kanal-body .media.top {
		height: 100px;
	}
	.kanal-body li.media:last-child {
		border-bottom: none;
	}
	.kanal-body .media-body {
		vertical-align: middle;
	}
	.kanal-body .media-body.top {
		font-weight: bolder;
	}
	.kanal-body p {
		font-size: 12px;
		margin-bottom: 5px;
	}
	.kanal-body ul {
	    list-style: none;
	    padding: 0;
	}
	.no-padding {
		padding: 0;
	}
</style>



<div class="col-md-12 col-xs-12" style="display: none;">
	
	<div style="text-align: center;margin-bottom:30px; ">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			 <div class="carousel-inner" role="listbox" style="height: 90px;">
			            <?php 
			            if(isset($banner)){ 
			                $no=0;
			                foreach ($banner as $data_banner) {
			                    if($data_banner->position == 'DM06'){
			                        $no++;
			            ?>
			            <!-- Wrapper for slides -->
			                <?php if($no==1){ ?>
			                <div class="item active">
			                    <center>
			                    <img src="<?php echo base_url().'uploads/banner/'.$data_banner->img;?>" class="banner-adv" width="728" style="object-fit: fill;height: 90px;">
			                    </center>
			                </div>
			                <?php }else{ ?>
			                <div class="item">
			                    <center>
			                    <img src="<?php echo base_url().'uploads/banner/'.$data_banner->img;?>" class="banner-adv" width="728" style="object-fit: fill;height: 90px;">
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
<main>
<div>
</div>
</main>
