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
				  <div class="panel-heading" style="background-color:#fe9d00;color:#ffffff;font-size:20px;font-weight:bold">Arsip Berita</div>
                  <div class="panel-body" style="background:white">
							<h4>Berita Terbaru</h4>
                    <hr/>
					<?php
					if (isset($datas))
        {
            $index = 1;
            if(isset($page)&&$page!=0)
                $index = $index+$page;
					foreach ($datas as $baris1)
                    {
                        echo '<div class="media">';
                        echo '<a href="'.base_url().'berita/bacaberita/'. $baris1->id.'"><h4 class="media-heading">'.$baris1->title.'</h4></a>';
                        echo '<a class="pull-left" href="'.base_url().'berita/bacaberita/'. $baris1->id.'">'; 
						if($baris1->img==""){
                            echo '<img class="media-object" src="'.base_url().'uploads/berita/null.jpg" width="260" height="195">'; 
   					    }else{
						    echo '<img class="media-object" src="'.base_url().'uploads/berita/'.$baris1->img.'" width="260" height="195">';
						}
						echo '</a>';
                        echo '<div class="media-body" align="justify">
                            <p>';
                        echo substr(strip_tags($baris1->content),0,210);
                        echo '</p>
                            <p>';
                        echo '<a href="'.base_url().'berita/bacaberita/'. $baris1->id.'"';
                        echo '<span class="label label-default">Selengkapnya...</span></a>
                            </p>
                          </div>
                        </div>
                        <p></p>';
                        echo '<i class="icon-user"></i> Oleh : <a href="">'.$baris1->entry_by.'</a>'; 
                        echo '  | <i class="icon-calendar"></i> ';
                        echo format_date_in(2,substr ($baris1->date, 0, 10)); 
                        echo '  | <i class="icon-comment"></i> Dibaca : <span class="label label-default">'.$baris1->hit.'</span> Pengunjung
                        </p>
                        <hr>
                        ';
                        $index++;
                    }}
                    ?>
                    <?php echo $this->pagination->create_links(); ?>
                    <?php echo validation_errors(); ?>
                    <?php if (isset($result)) echo $result; ?>
                    <p>
                      <h4>Lihat Arsip Berita Lainnya :</h4>
                      <div class="well">
                      <form method="post" action="#" target="_self">
                        <select name="month" class="form-control" id="month">
                          <option selected="selected" value=""> - Bulan - </option>
                          <option value="01">Januari</option>
                          <option value="02">Februari</option>
                          <option value="03">Maret</option>
                          <option value="04">April</option>
                          <option value="05">Mei</option>
                          <option value="06">Juni</option>
                          <option value="07">Juli</option>
                          <option value="08">Agustus</option>
                          <option value="09">September</option>
                          <option value="10">Oktober</option>
                          <option value="11">November</option>
                          <option value="12">Desember </option>
                        </select>&nbsp;
                        <select name="years" class="form-control" id="years">
                          <option selected="selected" value="">- Tahun - </option>
                          <?php
                          for($i=2007;$i<=date('Y');$i++){
                            if($i% 1==0){
                                echo"<option value=".$i.">".$i."</option>";
                            }
                          }
                          ?>
                        </select>
                        <hr />
                        <input value="Search" name="cari" id="submit" type="submit" class="btn btn-primary btn-lg btn-block"/>
                      	
                      </form>
                      </div>
                      </p>
                    </div>
                    
                    </div>
                    
                    </div>
                    
                 