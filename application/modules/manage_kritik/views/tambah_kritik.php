<div class="container">
    <ol class="breadcrumb">
        <li>List</li>
        <li><a href="<?php echo base_url() . 'manage_kritik/'; ?>">Data</a></li>
        <li class="active">Add</li>
    </ol>
</div>
<div class="container">
    <div class="container" style="background: #f5f5f5;">
        <h3>Tambah Kritik</h3>
        <br>
        <?php echo form_open_multipart('manage_kritik/tambahkritik/')?>
        <div class="row">
            <div class="col-md-2">
                <label>Date And Time</label>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input name="date" type='text' class="form-control" />
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
                <label>Nama</label>
            </div>
            <div class="col-md-10">
                <input name="name" type="text" class="form-control"/>
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
                <label>Content</label>
            </div>
            <div class="col-md-10">
                <?php echo $this->ckeditor->editor("content",$this->session->flashdata('content')); ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Respon</label>
            </div>
            <div class="col-md-10">
                <?php echo $this->ckeditor->editor("respon",$this->session->flashdata('respon')); ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Hit</label>
            </div>
            <div class="col-md-10">
                <input name="hit" type="text" class="form-control"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Respon Date And Time</label>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                <div class='input-group date' id='datetimepicker2'>
                    <input name="respon_date" type='text' class="form-control" />
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
            <a href="<?php echo base_url() . 'manage_kritik/' ?>" class="btn btn-warning">Cancel</a>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
        <?php form_close(); ?></div>
</div>