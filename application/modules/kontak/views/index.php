<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 
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
<div class="container">
        <div class="col-sm-8">		
				<div class="panel panel-default">	
				  <div class="panel-heading" style="background-color:#fe9d00;color:#ffffff;font-size:20px;font-weight:bold">Hubungi Kami</div>
                  <div class="panel-body" style="background:white">
                    <hr/>
		<?php echo form_open_multipart('kontak/send'); ?>
        <div class="row">
            <div class="col-md-2">
                <label>Nama</label>
            </div>
            <div class="col-md-10">
                <input name="nama" class="form-control" type="text">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Alamat</label>
            </div>
            <div class="col-md-10">
                <input name="alamat" class="form-control" type="text">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Email</label>
            </div>
            <div class="col-md-10">
                <input name="email" type="text" class="form-control"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Judul</label>
            </div>
            <div class="col-md-10">
                <input name="judul" type="text" class="form-control"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Isi</label>
            </div>
            <div class="col-md-10">
                <textarea name="isi" class="form-control" type="text"></textarea>
            </div>
        </div>
        <br>
        <div>
            <?php if (isset($results))
            {
                foreach ($results as $result)
                {
                    echo $result;
                }
            }; ?>
        </div>
        <div id="errors">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
        <div class="col-md-12 text-center">
             <a href="<?php echo base_url() ?>" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-primary">Kirim</button>
            <hr>
        </div>
        <?php form_close(); ?>
                    </div>
                    
                    </div>
                    
                    </div>
                    
 <style>
    #notifications {
    cursor: pointer;
    position: fixed;
    right: 0px;
    z-index: 9999;
    bottom: 0px;
    margin-bottom: 22px;
    margin-right: 15px;
    min-width: 300px; 
    max-width: 800px;  
}
</style>
<script>   
    $('#notifications').slideDown('slow').delay(3000).slideUp('slow');
</script>
                