<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.min.js"></script>
<script>
$(function () {
  $("select").select2();
});    
</script>
<style>
    @import url(https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css);
</style>
<div class="container">
    <ol class="breadcrumb">
        <li>List</li>
        <li><a href="<?php echo base_url() . 'manage_berita/' ?>">Data</a></li>
        <li class="active">Add</li>
    </ol>
</div>
<div class="container">
    <div class="container" style="background: #f5f5f5;">
        <h3>Edit Berita</h3>
        <br>
        <?php echo form_open_multipart('manage_berita/editberita/'.$data->id); ?>
        <div class="row">
            <div class="col-md-2">
               <label>Date And Time</label>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input name="date" type='text' class="form-control" required VALUE="<?php echo $data->date ?>" />
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
                    <input name="show_date" type='text' class="form-control" required VALUE="<?php echo $data->show_date ?>" />
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
                        <?php
                        foreach($datas as $datas){
                            ?>
                          <option value="<?php echo $datas->id?>" <?php echo $data->id_category == "$datas->id" ? "selected" : ""; ?>><?php echo $datas->title_.'</option> ';
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
                <input name="title" type="text" class="form-control" required value="<?php echo str_replace(array('"',"'"), array('&#34;','&#39;'), $data->title) ?>"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Content</label>
            </div>
            <div class="col-md-10">
                <?php echo $this->ckeditor->editor("content",$data->content); ?>
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
                <input type="file" name="foto" id="foto">
                <p>note: ukuran gambar 750x480 pixel. (recommended)</p>
                <br>
                <img src="<?php echo base_url()."uploads/berita/".$data->img;?>" width="100%" height="100%">
                <input type="hidden" name="existing_foto" value="<?php echo $data->img ?>">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Watermark Image</label>
            </div>
            <div class="col-sm-10">
                <input style="width:15px" name="watermark" type="checkbox" value="Y" class="form-control" <?php echo $data->watermark == "Y" ? "checked" : ""; ?>>Please check this for create watermark image automatically</input>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Caption Foto</label>
            </div>
            <div class="col-md-10">
                <input name="source_image" type="text" class="form-control" value="<?php echo $data->source_image ?>"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Hit</label>
            </div>
            <div class="col-md-10">
                <input name="hit" type="text" class="form-control" required value="<?php echo $data->hit ?>"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Tags</label>
            </div>
            <div class="col-md-10">
                <input name="tags" type="text" class="form-control" value="<?php echo $data->tags ?>"/>
                <p>*Note: Jangan ada spasi diantara tanda baca! ex: buku;kubu</p>
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