<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 
<div class="container">
    <div class="container" style="background: #f5f5f5;">
        <h3 class="text-center">Support Teknis Rumah Media</h3>
        <br>
        <?php echo form_open_multipart('technical_support/send'); ?>
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
                <label>Email</label>
            </div>
            <div class="col-md-10">
                <input name="email" type="text" class="form-control"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Title</label>
            </div>
            <div class="col-md-10">
                <input name="title" type="text" class="form-control"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Konten</label>
            </div>
            <div class="col-md-10">
                <?php echo $this->ckeditor->editor("konten",""); ?>
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
             <a href="<?php echo base_url() . 'backoffice/' ?>" class="btn btn-warning">Cancel</a>
            <button type="submit" class="btn btn-success">Kirim</button>
            <hr>
        </div>
        <?php form_close(); ?>
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
