<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function menunavbar()
{
//return the bottom end full nav bar: copyright e.g.

    return menus();
}

function menus()
{
//Don't call this directly.
    $categories = array();
    $pool = array();
    $ci =& get_instance();
    $ci->load->model('DataMenuManager');
    $structure = '';
    $q = $ci->DataMenuManager->returnparentmenus();
    foreach ($q as $row)
    {

//MENU BLOCK START
        if (in_array($row['lvl0_id'], $pool) === false && isset($row['lvl0_name']) && !is_null($row['lvl0_name']))
        {
            $c = array('id'    => $row['lvl0_id'],
                       'name'  => $row['lvl0_name'],
                       'link'  => $row['lv10_link'],
                       'level' => 0);
            $categories[] = $c;
        }

//MENU BLOCKE END


        if (in_array($row['lvl1_id'], $pool) === false && isset($row['lvl1_name']) && !is_null($row['lvl1_name']))
        {
            $c = array('id'    => $row['lvl1_id'],
                       'name'  => $row['lvl1_name'],
                       'link'  => $row['lv11_link'],
                       'level' => 1);
            $categories[] = $c;
        }
        if (in_array($row['lvl2_id'], $pool) === false && isset($row['lvl2_name']) && !is_null($row['lvl2_name']))
        {
            $c = array('id'    => $row['lvl2_id'],
                       'name'  => $row['lvl2_name'],
                       'link'  => $row['lv12_link'],
                       'level' => 2);
            $categories[] = $c;
        }
        if (in_array($row['lvl3_id'], $pool) === false && isset($row['lvl3_name']) && !is_null($row['lvl3_name']))
        {
            $c = array('id'    => $row['lvl3_id'],
                       'name'  => $row['lvl3_name'],
                       'link'  => $row['lv13_link'],
                       'level' => 3);
            $categories[] = $c;
        }
        /* if (in_array($row['lvl4_id'], $pool) === false && isset($row['lvl4_name'])) {
             $c = array('id' => $row['lvl4_id'],
                        'name' => $row['lvl4_name'],
                        'level' => 4);
             $categories[] = $c;
         }*/
        $pool[] = $row['lvl0_id'];
        $pool[] = $row['lvl1_id'];
        $pool[] = $row['lvl2_id'];
        $pool[] = $row['lvl3_id'];
        // $pool[] = $row['lvl4_id'];
    }


    $structure = '<ul id="main-menu" class="sm sm-simple" style="height:42px; background:#fff">';
    $count = count($categories);
    if ($count > 0)
    {

        if ($count == 1)
        {
            //  echo '<li>', $categories[0]['name'], '</li>', "\n";
            $link = $categories[0]["link"];
            $name = stripslashes($categories[0]['name']);
            $structure .= '<li style="color:#fff; position:center"><a href="' . $link . '">' . ($ci->session->lang==="en"?$name_en:$name) . '</a></li>';

        } else
        {
            $i = 0;
            $structure .= '<li style="color:#fff; position:center"><a style="color=:black;" href="'.base_url().'"><img class="" style="margin-top:-7px;" src="'.base_url().'public/images/icon.png"></a>';
            while (isset($categories[$i]))
            {
                // echo '<li>', $categories[$i]['name'];
                $link = $categories[$i]["link"];
                $name = stripslashes($categories[$i]['name']);
                
                if($link=="#"){
                    $structure .= '<li style="color:#fff;position:center"><a style="color=:#000;" href="'.base_url().'page/bacapage/'.$categories[$i]['id'].'">' . ($ci->session->lang==="en"?$name_en:$name) . '</a>';
                }else{
                    if(is_numeric($link)){
                        $structure .= '<li style="color:#fff;position:center"><a style="color=:#000;" href="'.base_url().'category/baca/'.$categories[$i]['link'].'">' . ($ci->session->lang==="en"?$name_en:$name) . '</a>';
                        
                    }else{
                        $structure .= '<li style="color:#fff; position:center"><a style="color=:#000;" href="' . $link . '">' . ($ci->session->lang==="en"?$name_en:$name) . '</a>';
                
                    }
                }
                if ($i < $count - 1)
                {
                    if ($categories[$i + 1]['level'] > $categories[$i]['level'])
                    {
                        $structure .= '<ul>';

                    } else
                    {
                        $structure .= '</li>';

                    }
                    if ($categories[$i + 1]['level'] < $categories[$i]['level'])
                    {
                        $structure .= str_repeat('</ul></li>' . "\n",
                            $categories[$i]['level'] - $categories[$i + 1]['level']);
                    }
                } else
                {
                    $structure .= '</li>';
                    $structure .= str_repeat('</ul></li>' . "\n", $categories[$i]['level']);
                }
                
                $i ++;
            }
            
            
        }

    }
    $structure .= '</ul>';

    return $structure;
}
?>