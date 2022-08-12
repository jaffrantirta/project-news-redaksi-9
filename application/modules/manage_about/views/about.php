<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 

<div class="container">
    <h3><span class="glyphicon glyphicon-file"></span>Tentang Perusahaan</h3>
    <ol class="breadcrumb">
        <li>List</li>
        <li class="active">Data</li>
        <li><a href="<?php echo base_url() . 'manage_about/tambahabout' ?>">Add</a></li>
    </ol>
    <!-- <div class="row">
        <div class="col-md-6">
            <?php //if (isset($search)){ ?>
                <p style="padding: 16px;    background-color: #10be28; color: white;">Hasil pencarian berdasarkan kata
                    kunci <?php //echo isset($search) ? $search : "" ?></p>

                <?php //$this->session->set_flashdata('search', $search); } ?>
        </div>
        <div class="col-md-6">
            <?php //echo form_open('manage_about/'); ?>
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
            <button class="btn btn-default" type="submit">Search</button>
            </span>
            </div>
            </form>
        </div>
    </div> -->
    <br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>Action</th>
            <!--<th>Title</th>-->
            <th>Konten</th>
            <th>Hit</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (isset($datas))
        {
            $index = 1;
            if(isset($page)&&$page!=0)
                $index = $index+$page;
            foreach ($datas as $data)
            {
                echo '<tr>';
                echo '<td>' . $index . '</td>';
                echo '<td><a href="' . base_url() . 'manage_about/editabout/' . $data->id . '" class="btn btn-primary">Edit</a>&nbsp;&nbsp;&nbsp;<button onclick="confirmDelete('.$data->id.',\'about\')" class="btn btn-danger">Delete</button></td>';
                echo '<td>' . $data->title . '</td>';
                //echo '<td>' . $data->content . '</td>';
                echo '<td>' . $data->hit . '</td>';
                echo '</tr>';
                $index++;
            }
        }
        ?>
        </tbody>
    </table>
</div>
<?php echo $this->pagination->create_links(); ?>
<?php echo validation_errors(); ?>
<?php if (isset($result)) echo $result; ?>

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
