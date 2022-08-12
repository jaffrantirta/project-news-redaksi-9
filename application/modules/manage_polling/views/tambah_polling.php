<div class="container">
    <ol class="breadcrumb">
        <li>List</li>
        <li><a href="<?php echo base_url() . 'manage_polling/'; ?>">Data</a></li>
        <li class="active">Add</li>
    </ol>
</div>
<div class="container">
    <div class="container" style="background: #f5f5f5;">
        <h3>Tambah Data</h3>
        <br>
        <?php echo form_open_multipart('manage_polling/tambahpolling/')?>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Pendapat</label>
            </div>
            <div class="col-md-10">
                <input name="pendapat" type="text" class="form-control"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Jawaban 1</label>
            </div>
            <div class="col-md-10">
                <input name="jwb1" type="text" class="form-control"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Jawaban 2</label>
            </div>
            <div class="col-md-10">
                <input name="jwb2" type="text" class="form-control"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Jawaban 3</label>
            </div>
            <div class="col-md-10">
                <input name="jwb3" type="text" class="form-control"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Jawaban 4</label>
            </div>
            <div class="col-md-10">
                <input name="jwb4" type="text" class="form-control"/>
            </div>
        </div>
        <br><div class="row">
            <div class="col-md-2">
                <label>Polling 1</label>
            </div>
            <div class="col-md-10">
                <input name="pol1" type="text" class="form-control"/>
            </div>
        </div>
        <br>
        <br><div class="row">
            <div class="col-md-2">
                <label>Polling 2</label>
            </div>
            <div class="col-md-10">
                <input name="pol2" type="text" class="form-control"/>
            </div>
        </div>
        <br>
        <br><div class="row">
            <div class="col-md-2">
                <label>Polling 3</label>
            </div>
            <div class="col-md-10">
                <input name="pol3" type="text" class="form-control"/>
            </div>
        </div>
        <br>
        <br><div class="row">
            <div class="col-md-2">
                <label>Polling 4</label>
            </div>
            <div class="col-md-10">
                <input name="pol4" type="text" class="form-control"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Status</label>
            </div>
            <div class="col-md-10">
                <input type="radio" name="status" value="Show"> Show
                <input type="radio" name="status" value="Hide"> Hidden<br>
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
             <a href="<?php echo base_url() . 'manage_polling/' ?>" class="btn btn-warning">Cancel</a>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
        <?php form_close(); ?></div>
</div>