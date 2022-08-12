<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.min.js"></script>
<div class="container">
    <ol class="breadcrumb">
        <li>List</li>
        <li><a href="<?php echo base_url() . 'manage_berita/'; ?>">Data</a></li>
        <li class="active">Add</li>
    </ol>
</div>
<div class="container">
    <div class="container" style="background: #f5f5f5;">
        <h3>Tambah Data</h3>
        <br>
        <?php echo form_open_multipart('manage_berita/tambahberita/','id = frmmenus')?>
        <div class="row">
            <div class="col-md-2">
                <label>Date And Time</label>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input name="date" type='text' class="form-control" required value="<?php echo $this->session->flashdata('date'); ?>" />
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
                <label>Show Date</label>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                <div class='input-group date' id='datetimepicker'>
                    <input name="show_date" type='text' class="form-control" required value="<?php echo $this->session->flashdata('show_date'); ?>"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
				<script type="text/javascript">
            $(function () {
                $('#datetimepicker').datetimepicker();
            });
        </script>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Category</label>
            </div>
            <div class="col-md-10">
                <select name="id_category" id="id_category" class="form-control" required>
                        <option value="">Select Category</option> 
                    <?php
                        foreach($datas as $data){
                          echo '<option value="'.$data->id.'">'.$data->title_.'</option> ';
                        }
                    ?>
                      </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Title</label>
            </div>
            <div class="col-md-10">
                <input name="title" type="text" class="form-control" required value="<?php echo $this->session->flashdata('title'); ?>" />
            </div>
        </div>
        <br>
        <!--<div class="row">
            <div class="col-md-2">
                <label>Sub Title</label>
            </div>
            <div class="col-md-10">-->
                <input name="subtitle" type="text" class="form-control" value="<?php echo $this->session->flashdata('subtitle'); ?>" style="display:none;"/>
            <!--</div>
        </div>
        <br>-->
        <div class="row">
            <div class="col-md-2">
                <label>Content</label>
            </div>
            <div class="col-md-10">
                <?php echo $this->ckeditor->editor("content",$this->session->flashdata('content')); ?>
            </div>
        </div>
        <br>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
        <div class="row">
            <div class="col-md-2">
                <label>Baca Juga</label>
            </div>
            <div class="col-md-10">
                <select id="RelatedNews" class="js-example-basic-single" name="RelatedNews">
                    <option>Pilih Berita</option>
                    <?php
                        foreach($berita as $berita){
                          echo '<option value="' . $berita->id . '" data-titberita="' . $berita->title . '">' . $berita->title . '</option>';
                        }
                    ?>
                </select>
            </div>
        </div>
        <br>          
        <div class="row">
            <div class="col-md-2">
                <label>Foto</label>
            </div>
            <div class="col-md-10">
                <input type="file" name="foto" id="foto" value="<?php echo $this->session->flashdata('foto'); ?>"/>
                <p>note: ukuran gambar 750x480 pixel. (recommended)</p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Watermark Image</label>
            </div>
            <div class="col-sm-10">
                <input style="width:15px" name="watermark" type="checkbox" value="Y" class="form-control">Please check this for create watermark image automatically</input>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Caption Foto</label>
            </div>
            <div class="col-md-10">
                <input name="source_image" type="text" class="form-control" value="<?php echo $this->session->flashdata('source_img'); ?>"/>
            </div>
        </div>
        <br>
        <!--<div class="row">
            <div class="col-md-2">
                <label>Source Video</label>
            </div>
            <div class="col-md-10">
                <input name="source_video" type="text" class="form-control"/>
            </div>
        </div>
        <br>-->
        <div class="row">
            <div class="col-md-2">
                <label>Tags</label>
            </div>
            <div class="col-md-10">
                <input name="tags" type="text" class="form-control" value="<?php echo $this->session->flashdata('tags'); ?>"/>
                <p>*Note: Jangan ada spasi diantara tanda baca! ex: buku;kubu</p>
            </div>
        </div>
        <br>
        <!-- <div class="row">
            <div class="col-md-2">
                <label>Wartawan</label>
            </div>
            <div class="col-md-10">
                <select name="wartawan" id="wartawan" class="form-control">
                        <option value="">Select Wartawan</option> 
                    <?php
                        // foreach($coba as $coba){
                        //   echo '<option value="'.$coba->name.'">'.$coba->name.'</option> ';
                        // }
                    ?>
                      </select>
            </div>
        </div>
        <br> -->
        <div class="row">
            <div class="col-md-2">
                <label>Hit</label>
            </div>
            <div class="col-md-10">
                <input name="hit" type="text" class="form-control" value="<?php echo $this->session->flashdata('hits'); ?>"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Autopost Twitter</label>
            </div>
            <div class="col-sm-10">
                <input style="width:15px" name="autopost" type="checkbox" value="1" class="form-control" value="<?php echo $this->session->flashdata('autopost'); ?>"/>
            </div>
        </div>
        <br>
        <!--<div class="row">-->
        <!--    <div class="col-md-2">-->
        <!--        <label>Autopost Facebook</label>-->
        <!--    </div>-->
        <!--    <div class="col-sm-10">-->
        <!--        <input style="width:15px" name="autopost_fb" type="checkbox" value="1" class="form-control">-->
        <!--    </div>-->
        <!--</div>-->
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Status</label>
            </div>
            <div class="col-md-10">
                <input type="radio" name="status" value="Show" required> Show
                <input type="radio" name="status" value="Hide" required> Hidden<br>
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
            <a href="<?php echo base_url() . 'manage_berita/' ?>" class="btn btn-warning">Cancel</a>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
        <?php form_close(); ?></div>
</div>

<script>
var insertRelatedNews = function(title, url) {
var related = '<b>Baca juga: <a href="' + url + '" target="_blank" title="' + title + '">' + title + '</a></b>';
CKEDITOR.instances.content.insertHtml(related);
}

function doDashes2(str) {
    return str.replace(/[^a-z0-9]+/gi, '-').replace(/^-*|-*$/g, '').toLowerCase();
}


$("#RelatedNews").change(function () {
     var judul = ($(this).find(':selected').data('titberita'));
     var idberita = $(this).children("option:selected").val();
     var baseurl = "<?=  base_url().'read/' ?>";
     var judulurl = doDashes2(judul);
     var url = baseurl + idberita + "/" + judulurl;

     insertRelatedNews(judul,url);
     $(this).prop('selectedIndex',0);
});
</script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
