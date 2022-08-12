<div class="container">
    <ol class="breadcrumb">
        <li>List</li>
        <li><a href="<?php echo base_url() . 'manage_menumanager/' ?>">Data</a></li>
        <li class="active">Edit</li>
        <li><a href="<?php echo base_url() . 'manage_menumanager/sorting' ?>">Sorting</a></li>
    </ol>
</div>
<div class="container">
    <div class="container" style="background: #f5f5f5;">
        <h3>Edit Menu Manager</h3>
        <br>
        <?php echo form_open_multipart('manage_menumanager/editmenumanager/'.$menu->id); ?>
        <div class="row">
            <div class="col-md-2">
                <label>Top Menu</label>
            </div>
            <div class="col-md-10">
                <select name="top_menu" class="form-control">
                    <option value="0">None</option>
                    <?php
                    if (isset($top_menus))
                    {
                        foreach ($top_menus as $top_menu)
                        {
                            echo '<option value="' . $top_menu->id . '"' . ($this->session->flashdata('top_menu') == $top_menu->id ? 'selected' : '') . '>' . $top_menu->MENU_TITLE . '</option>';
                        }
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
                <input name="title_id" type="text" class="form-control"
                       value="<?php echo $menu->MENU_TITLE ?>"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Content</label>
            </div>
            <div class="col-md-10">
                <?php echo $this->ckeditor->editor("content_id", $menu->MENU_KONTEN); ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>URL</label>
            </div>
            <div class="col-md-10">
                <input name="url" type="text" class="form-control"
                       value="<?php echo $menu->URL ?>"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Target</label>
            </div>
            <div class="col-md-10">
                <input type="radio" name="target" value="0" <?php echo $menu->MENU_TARGET == 0 ? "checked" : ""; ?>> New Window
                <input type="radio" name="target" value="1" <?php echo $menu->MENU_TARGET == 1 ? "checked" : ""; ?>> Same Window<br>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <label>Status</label>
            </div>
            <div class="col-md-10">
                <input type="radio" name="status" value="0" <?php echo $menu->STATUS == 0 ? "checked" : ""; ?>> Show
                <input type="radio" name="status" value="1" <?php echo $menu->STATUS == 1 ? "checked" : ""; ?>> Hidden<br>
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
            <a href="<?php echo base_url() . 'manage_menumanager/' ?>" class="btn btn-warning">Cancel</a>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
        <?php form_close(); ?></div>
</div>