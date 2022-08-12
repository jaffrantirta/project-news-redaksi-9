<div class="container">
    <ol class="breadcrumb">
        <li>List</li>
        <li><a href="<?php echo base_url() . 'manage_media/' ?>">Data</a></li>
        <li class="active">Add</li>
    </ol>
</div>
<div class="container">
    <div class="container" style="background: #f5f5f5;">
        <h3>Edit Sosial Media</h3>
        <br>
        <?php echo form_open_multipart('manage_media/editmedia/'.$data->id); ?>
        <div class="row">
            <div class="col-md-2">
                <label>Nama</label>
            </div>
            <div class="col-md-10">
                <input name="name" type="text" class="form-control" value="<?php echo $data->name ?>"/>
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
                <label>Icon</label>
            </div>
            <div class="col-md-10">
                <input type="file" name="foto" id="foto">
                <p>note: ukuran gambar 30x30 pixel</p>
                <br>
                <img src="<?php echo base_url()."uploads/".$data->img;?>" width="100%" height="100%">
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
            <a href="<?php echo base_url() . 'manage_media/' ?>" class="btn btn-warning">Cancel</a>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
        <?php form_close(); ?></div>
</div>