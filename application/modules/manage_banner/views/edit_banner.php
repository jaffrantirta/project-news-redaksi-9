<div class="container">
    <ol class="breadcrumb">
        <li>List</li>
        <li><a href="<?php echo base_url() . 'manage_banner/' ?>">Data</a></li>
        <li class="active">Add</li>
    </ol>
</div>
<div class="container">
    <div class="container" style="background: #f5f5f5;">
        <h3>Edit Banner</h3>
        <br>
        <?php echo form_open_multipart('manage_banner/editbanner/'.$data->id); ?>
        <div class="row">
            <div class="col-md-2">
               <label>Start Date And Time</label>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input name="start_date" type='text' class="form-control" VALUE="<?php echo $data->start_date ?>" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
				<script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
               <label>End Date And Time</label>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                <div class='input-group date' id='datetimepicker2'>
                    <input name="end_date" type='text' class="form-control" VALUE="<?php echo $data->end_date ?>" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
				<script type="text/javascript">
            $(function () {
                $('#datetimepicker2').datetimepicker();
            });
        </script>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Posisi</label>
            </div>
            <div class="col-md-10">
                <select name="position" id="position" class="form-control">
                        <!-- <option value="DM01" <?php //echo $data->position == "DM01" ? "selected" : ""; ?>>DM01 (500  x 500)</option> -->
                        <option value="DM02" <?php echo $data->position == "DM02" ? "selected" : ""; ?>>Posisi Atas Memanjang Kesamping (728 x 90)</option>
                        <option value="DM03" <?php echo $data->position == "DM03" ? "selected" : ""; ?>>Posisi Tengah Memanjang Kesamping (728 x 90)</option>
                        <option value="DM04" <?php echo $data->position == "DM04" ? "selected" : ""; ?>>Posisi Kanan Atas Memanjang Kebawah (300 x 250)</option>
                        <option value="DM05" <?php echo $data->position == "DM05" ? "selected" : ""; ?>>Posisi Kanan Bawah Memanjang Kebawah (300 x 250)</option>
                        <!--<option value="DM06" <?php echo $data->position == "DM06" ? "selected" : ""; ?>>Posisi Bawah Memanjang Kesamping (728 x 90)</option>-->
                      </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Title</label>
            </div>
            <div class="col-md-10">
                <input name="title" type="text" class="form-control" value="<?php echo $data->title ?>"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
               <label>URL</label>
            </div>
            <div class="col-md-10">
                <input name="url" type="text" class="form-control" value="<?php echo $data->url ?>"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
               <label>Hit</label>
            </div>
            <div class="col-md-10">
                <input name="hit" type="text" class="form-control" value="<?php echo $data->hit ?>"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Status</label>
            </div>
            <div class="col-md-10">
                <input type="radio" name="status" value="Show" <?php echo $data->status == "Show" ? "checked" : ""; ?>> Show
                <input type="radio" name="status" value="Hide" <?php echo $data->status == "Hide" ? "checked" : ""; ?>> Hidden<br>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Foto</label>
            </div>
            <div class="col-md-10">
                <input type="file" name="foto" id="foto">
                <p>note: ukuran gambar sesuai posisi</p>
                <br>
                <img src="<?php echo base_url()."uploads/banner/".$data->img;?>" width="100%" height="100%">
                <input type="hidden" name="existing_foto" value="<?php echo $data->img ?>">
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
            <a href="<?php echo base_url() . 'manage_banner/' ?>" class="btn btn-warning">Cancel</a>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
        <?php form_close(); ?></div>
</div>