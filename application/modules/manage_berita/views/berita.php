<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .fa {
        padding: 10px;
        font-size: 20px;
        width: 42px;
        text-align: center;
        text-decoration: none;
    }

    .fa:hover {
        opacity: 0.7;
    }

    .fa-facebook {
      background: #3B5998;
      color: white;
    }
</style>
<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 

<div class="container">
    <h3><span class="glyphicon glyphicon-file"></span>Berita</h3>
    <ol class="breadcrumb">
        <li>List</li>
        <li class="active">Data</li>
        <li><a href="<?php echo base_url() . 'manage_berita/tambahberita' ?>">Add</a></li>
    </ol>
    <div class="row">
        <div class="col-md-6">
            <?php if (isset($search))
            { ?>
                <p style="padding: 16px;    background-color: #10be28; color: white;">Hasil pencarian berdasarkan kata
                    kunci <?php echo isset($search) ? $search : "" ?></p>

                <?php $this->session->set_flashdata('search', $search);
            } ?>
        </div>
        <div class="col-md-6">
            <?php echo form_open('manage_berita/'); ?>
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
            <button class="btn btn-default" type="submit">Search</button>
            </span>
            </div><!-- /input-group -->
            </form>
        </div>
    </div>
    <br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>Action</th>
            <th>Share</th>
            <th>Tanggal</th>
            <th>Kategori</th>
            <th>Title</th>
            <th>Hit</th>
            <th>Status</th>
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
                $links = str_replace(array(',',' ','!','"',"'"),array('_','-'),$data->title);
                $url_links = base_url('read/'.$data->id.'/'.$links);
                
                echo '<tr>';
                echo '<td>' . $index . '</td>';
                echo '<td><a href="' . base_url() . 'manage_berita/editberita/' . $data->id . '" class="btn btn-primary">Edit</a>&nbsp;&nbsp;&nbsp;<button onclick="confirmDelete('.$data->id.',\'berita\')" class="btn btn-danger">Delete</button></td>';
        ?>
                <td>
                    <a href="#" class="fa fa-facebook" onclick="myFunction('<?php echo $url_links; ?>')"></a>
                </td>
        <?php 
                echo '<td>' . $data->date . '</td>';
                if(isset($data->title_ )){
                    echo '<td>' . $data->title_ . '</td>';
                }else{
                    echo '<td></td>';
                }
                echo '<td>' . $data->title . '</td>';
                echo '<td>' . $data->hit . '</td>';
                if($data->status=="Hide"){
                    echo '<td class="text-center"><span style="font-weight: bold;padding: 1% 6%;color: white;background: red">Hide</span></td>';
                }else{
                    echo '<td class="text-center"><span style="font-weight: bold;padding: 1% 6%;color: white;background: green">Show</span></td>';
                }
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
    
    function myFunction(val) {
        var url = "https://www.facebook.com/sharer/sharer.php?u="+val;
        console.log(val);
        window.open(url, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=500,width=500,height=500");
    }
</script>
