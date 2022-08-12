</div>
</div> <!-- .row -->
</div> <!-- .container -->
</div> <!-- .main-content -->

<style type="text/css">
	#footer p, #footer h2 {
		color: #999999;
	}
</style>
<footer id="footer" class="footer" style="background: #950000;padding-top: 1%;">

<div class="footer-one footer-widgets" style="padding:unset;">
	<div class="container">
		<div class="row">
			<div class="col-md-6 text-center">
				<?php foreach ($pengaturan as $pengaturan) { ?>
                <img class="hidden-sm hidden-xs text-center" style="display:block; margin-left:auto; margin-right:auto; width:50%; " src="<?= base_url().'uploads/'.$pengaturan->header; ?>">
                <img class="hidden-md hidden-lg" style="margin-left:30px; width:300px " src="<?= base_url().'uploads/'.$pengaturan->header; ?>">
                <?php } ?>
				<p>Info Kontak: <?php echo $pengaturan->address; ?>, Phone: <?php echo $pengaturan->phone; ?>,</br> e-mail: <?php echo $pengaturan->email; ?></p>
			</div>
			<div class="col-md-6">
				<div class="row">
					<?php foreach ($kategori_all as $data_kat) { ?>
					<div class="col-md-4 col-xs-4">
						<ul class="list-unstyled">
							<li style="margin-bottom: 10px;"><a href="<?= base_url().'category/baca/'.$data_kat->id; ?>"><?= $data_kat->title_; ?></a></li>
						</ul>
					</div>
					<?php } ?>
				</div>
			</div>
			<div class="col-md-12 text-center">
				<hr width="100%" color="white">
			</div>
			<div class="col-md-12 text-center">
			<?php foreach ($about as $data_about) { ?>
				<span style="padding: 7px;"><a href="<?= base_url().'about/read/'.$data_about->id; ?>"><?= $data_about->title; ?></a></span>
			<?php } ?>
				<!--<p style="margin-top: 10px;">Copyright &copy; <?php echo date("Y"); ?> Redaksi9.com. All Rights Reserved. Design & Maintenance by <a href="https://rumahmedia.com/" target="_blank">Bali Web Design RumahMedia</a></p>-->
			</div>
		</div> <!-- .row -->
	</div>
</div>
</footer>