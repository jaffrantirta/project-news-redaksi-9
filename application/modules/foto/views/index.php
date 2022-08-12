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
				<div class="panel panel-primary">	
				  <div class="panel-heading" style="background-color:#ef5c26;color:#ffffff;font-size:20px;font-weight:bold">Arsip Foto</div>
                  <div class="panel-body" style="background:white">
                    <hr/>
					<?php
					if (isset($datas))
        {
            $index = 1;
            if(isset($page)&&$page!=0)
                $index = $index+$page;
                $no=0;
					foreach ($datas as $baris1)
                    {
                        if($no==2){
							echo '</div>
							<div class="panel-body" style="background:white">';
							$no=0;
						}
						echo '<div class="col-md-6" style="text-align:center;">';
					    echo '<a class="pull-left" href="'.base_url().'foto/bacafoto/'.$baris1->id.'">'; 
						if($baris1->img==""){
							echo '<img class="media-object" src="'.base_url().'uploads/null.jpg" width="100%" vspace="6" hspace="6" style="margin:5px; float:left;" /> '; 
						}else{
						echo '<img class="media-object" src="'.base_url().'uploads/album/'.$baris1->img.'" width="100%">';
						}
						echo '</a><br>';
						echo '<a href="'.base_url().'foto/bacafoto/'.$baris1->id.'" style="color:#000;"><h5>'.$baris1->title.'</h5></a>
							
						</div>';
                        $index++;
                        $no++;
                    }}
                    ?>
                    
                    
                     </div>
                    <div class="panel-body" style="background:white">
                    <?php echo $this->pagination->create_links(); ?>
                    <?php echo validation_errors(); ?>
                    <?php if (isset($result)) echo $result; ?>
                    </div>
                    
                    </div>
                    
                    </div>
                    
                 