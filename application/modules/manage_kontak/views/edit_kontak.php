<div class="container">
    <ol class="breadcrumb">
        <li>List</li>
        <li><a href="<?php echo base_url() . 'manage_kontak/' ?>">Data</a></li>
        <li class="active">Add</li>
    </ol>
</div>
<div class="container">
    <div class="container" style="background: #f5f5f5;">
        <h3>Edit Kontak Email</h3>
        <br>
        <?php echo form_open_multipart('manage_kontak/editkontak/'.$data->id); ?>
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
               <label>Email</label>
            </div>
            <div class="col-md-10">
                <input name="email" type="text" class="form-control" value="<?php echo $data->email ?>"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Status</label>
            </div>
            <div class="col-md-10">
                <input type="radio" name="status" value="Aktif" <?php echo $data->status == "Aktif" ? "checked" : ""; ?>> Aktif
                <input type="radio" name="status" value="Nonaktif" <?php echo $data->status == "Nonaktif" ? "checked" : ""; ?>> Nonaktif<br>
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
            <a href="<?php echo base_url() . 'manage_kontak/' ?>" class="btn btn-warning">Cancel</a>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
        <?php form_close(); ?></div>
</div>