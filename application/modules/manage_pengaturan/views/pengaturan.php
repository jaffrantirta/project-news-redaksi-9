
<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 
<div class="container">
    <h2 class="text-center">Pengaturan Tampilan</h2>
    <hr>
    <div id="errors">
                        <?php echo $this->session->flashdata('error'); ?>
    </div>
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        Logo</a>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse in">
                <div class="panel-body">
                    <?php echo form_open_multipart('manage_pengaturan/editfoto/'.$data->id); ?>
                    <div class="col-md-4">
                    <label><strong>Logo</strong></label>
                    <br>
                    <img class="img-responsive" src="<?php echo base_url()."uploads/".$data->header;?>"/>
                    <input type="file" name="foto" id="foto">
                    <p>Recommended: ukuran gambar 183x56 pixel</p>
                    </div>
                    <div class="col-md-12 text-center">
                         <a href="<?php echo base_url() . 'backoffice/' ?>" class="btn btn-warning">Cancel</a>
                        <button type="submit" class="btn btn-success">Simpan Pengaturan</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
            
    </div>
    <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                        Background</a>
                </h4>
            </div>
            <div id="collapse2" class="panel-collapse collapse">
                <div class="panel-body">
                    <?php echo form_open_multipart('manage_pengaturan/editbackground/'.$data->id); ?>
                    <div class="col-md-4">
                    <label><strong>Background</strong></label>
                    <br>
                   <img src="<?php echo base_url()."uploads/".$data->background;?>"/>
                    <input type="file" name="background" id="background">
                    <p>Recommended: ukuran gambar 2040x408 pixel</p>
                    </div>
                    <div class="col-md-12 text-center">
                         <a href="<?php echo base_url() . 'backoffice/' ?>" class="btn btn-warning">Cancel</a>
                        <button type="submit" class="btn btn-success">Simpan Pengaturan</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
            
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                    Teks & Tulisan</a>
            </h4>
        </div>
        <div id="collapse3" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="container">
                    <div class="container" style="background: #f5f5f5;">
                         <?php echo form_open_multipart('manage_pengaturan/editpengaturan/'.$data->id); ?>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Company</label>
                            </div>
                            <div class="col-md-10">
                                <input name="company" type="text" class="form-control" value="<?php echo $data->company ?>"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Address</label>
                            </div>
                            <div class="col-md-10">
                                <input name="address" type="text" class="form-control" value="<?php echo $data->address ?>"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-10">
                                <input name="phone" type="text" class="form-control" value="<?php echo $data->phone ?>"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Fax</label>
                            </div>
                            <div class="col-md-10">
                                <input name="fax" type="text" class="form-control" value="<?php echo $data->fax ?>"/>
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
                                <label>Website</label>
                            </div>
                            <div class="col-md-10">
                                <input name="website" type="text" class="form-control" value="<?php echo $data->website ?>"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Widget Facebook</label>
                            </div>
                            <div class="col-md-10">
                                <input name="widget_facebook" type="text" class="form-control" value="<?php echo $data->widget_facebook ?>"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Widget Twitter</label>
                            </div>
                            <div class="col-md-10">
                                <input name="widget_twitter" type="text" class="form-control" value="<?php echo $data->widget_twitter ?>"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Skyep</label>
                            </div>
                            <div class="col-md-10">
                                <input name="skype" type="text" class="form-control" value="<?php echo $data->skype ?>"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Yahoo Messanger</label>
                            </div>
                            <div class="col-md-10">
                                <input name="ym" type="text" class="form-control" value="<?php echo $data->ym ?>"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Map</label>
                            </div>
                            <div class="col-md-10">
                                <input name="map" type="text" class="form-control" value="<?php echo $data->map ?>"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Meta Title</label>
                            </div>
                            <div class="col-md-10">
                                <input name="meta_title" type="text" class="form-control" value="<?php echo $data->meta_title ?>"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Meta Description</label>
                            </div>
                            <div class="col-md-10">
                                <input name="meta_description" type="text" class="form-control" value="<?php echo $data->meta_description ?>"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Meta Keyword</label>
                            </div>
                            <div class="col-md-10">
                                <input name="meta_keyword" type="text" class="form-control" value="<?php echo $data->meta_keyword ?>"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Copyright</label>
                            </div>
                            <div class="col-md-10">
                                <input name="copyright" type="text" class="form-control" value="<?php echo $data->copyright ?>"/>
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
                        <div class="col-md-12 text-center">
                            <a href="<?php echo base_url() . 'backoffice/' ?>" class="btn btn-warning">Cancel</a>
                            <button type="submit" class="btn btn-success">Simpan Pengaturan</button>
                        </div>
                        <?php form_close(); ?></div>
                </div>
            </div>
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
