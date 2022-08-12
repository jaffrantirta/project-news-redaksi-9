<?php

/**
 * Created by PhpStorm.
 * User: Budy
 * Date: 12/13/2017
 * Time: 4:26 PM
 */
class DataBerita extends MY_Model {
    	
    public function get_product_keyword($limit, $start, $table)
    {
        $data = null;
        if (isset($limit) && isset($start))
            $this->db->limit($limit, $start);
            
        $this->db->order_by('id', 'DESC');
        $this->db->like('status','Show');
        $query = $this->db->get($table);
        if ($query->num_rows() >= 0)
        {
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }

            return $data;
        }

        return $data;
    }

}