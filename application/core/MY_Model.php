<?php

/**
 * Created by PhpStorm.
 * User: Budy
 * Date: 12/14/2017
 * Time: 2:10 PM
 */
class MY_Model extends CI_Model {
    
     public function get_product_keyword($limit, $start, $table)
    {
        $data = null;
        if (isset($limit) && isset($start))
            $this->db->limit($limit, $start);
            
        $this->db->order_by('date', 'DESC');
        $this->db->where('status','Show');
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
    
    public function get_todays_news(){
        $tanggal = date('Y-m-d');
        $data = null;
            
        $this->db->order_by('date', 'DESC');
        $this->db->where('status','Show');
        $this->db->where('date_format(date, "%Y-%m-%d")=',$tanggal);
        $query = $this->db->get('berita');
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
    
    public function get_populer($limit, $start, $table)
    {
        $bulans = date('Y-m');
        $data = null;
        if (isset($limit) && isset($start))
            $this->db->limit($limit, $start);
            
        $this->db->order_by('hit', 'DESC');
        $this->db->where('status','Show');
        $this->db->where('date_format(date, "%Y-%m")=',$bulans);
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
    
    public function getVideo($limit, $start, $table, $id)
    {
        $data = null;
        if (isset($limit) && isset($start))
            $this->db->limit($limit, $start);
            
        $this->db->order_by('date', 'DESC');
        $this->db->where('id!=',$id);
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
    
    public function getArsip($limit, $start, $table, $table2, $join, $id) {
       
        $data = null;
        if (isset($limit) && isset($start))
            $this->db->limit($limit, $start);
            
        $this->db->order_by("$table2.date", 'DESC');
        $this->db->join($table2,$join);
        $this->db->where("$table2.id!=",$id);
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
    
    public function getFoto($limit, $start, $table)
    {
        $data = null;
        if (isset($limit) && isset($start))
            $this->db->limit($limit, $start);
            
        $this->db->order_by('id', 'DESC');
        $this->db->where('source','');
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
    
    public function getAlbum($limit, $start, $table, $id)
    {
        $data = null;
        if (isset($limit) && isset($start))
            $this->db->limit($limit, $start);
            
        $this->db->order_by('date', 'DESC');
        $this->db->where('id_category',$id);
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
    
    public function getcategory($limit, $start, $table, $table2, $join, $id) {
       
        $data = null;
        if (isset($limit) && isset($start))
            $this->db->limit($limit, $start);
            
        $this->db->order_by("$table2.date", 'DESC');
        $this->db->join($table2,$join);
        $this->db->where('id_category',$id);
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
    
    
    public function getbaca($table, $select, $referencedTable, $condition, $id)
    {
        if (empty($select))
            $select = '*';
        $this->db->select($select);
        $this->db->from($table);
        $this->db->join($referencedTable, $condition);
        $this->db->where("$referencedTable.id",$id);
        $row = $this->db->get()->row();
        if (isset($row))
            return $row;
        else
            return null;
    }
    
    public function getduatable($limit, $start, $table, $table2, $join) {
       
        $data = null;
        if (isset($limit) && isset($start))
            $this->db->limit($limit, $start);
            
        $this->db->order_by("$table2.id", 'DESC');
        $this->db->join($table2,$join);
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

    public function getKategoriGlobal($limit, $start, $table, $table2, $join) {
       
        $data = null;
        if (isset($limit) && isset($start))
            $this->db->limit($limit, $start);
            
        $this->db->order_by("$table2.id", 'DESC');
        $this->db->join($table2,$join);
        $this->db->where("$table2.id_category",'6');
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
    
    public function getKategoriEkobisnis($limit, $start, $table, $table2, $join) {
       
        $data = null;
        if (isset($limit) && isset($start))
            $this->db->limit($limit, $start);
            
        $this->db->order_by("$table2.id", 'DESC');
        $this->db->join($table2,$join);
        $this->db->where("$table2.id_category",'1');
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

    public function getBerita($limit, $start, $table)
    {
        $data = null;
        if (isset($limit) && isset($start))
            $this->db->limit($limit, $start);
            
        $this->db->order_by('date', 'DESC');
        $this->db->where('id_category','6');
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
    public function getkategori($limit, $start, $table)
    {
        $data = null;
        if (isset($limit) && isset($start))
            $this->db->limit($limit, $start);
            
        $this->db->order_by('date', 'DESC');
        $this->db->where('status','Show');
        $this->db->where('id_category','15');
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
    public function getKategoriAll($table)
    {
        $data = null;
       
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
    public function getkritik($limit, $start, $table)
    {
        $data = null;
        if (isset($limit) && isset($start))
            $this->db->limit($limit, $start);
            
        $this->db->order_by('date', 'DESC');
        $this->db->where('status','Show');
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
    public function count($table, $id)
    {
        $this->db->get($table);
        $this->db->where('id_album',$id); 
        
        return $this->db->count_all($table);
        
        
        
    }
    public function record_count($table)
    {
        return $this->db->count_all($table);
    }
    
    function addData($table, $data)
    {
        $this->db->insert($table, $data);
    }
    
    function addDataNews($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    function deleteData($table, $where)
    {
        $this->db->from($table);
        $this->db->where($where);
        $row = $this->db->get()->row();
        if (isset($row->FOTO) && $row->FOTO != 'null.png')
            unlink('./uploads/' . $row->FOTO);
        $this->db->delete($table, $where);
    }

    public function updateData($data, $where, $table)
    {
        $this->db->set($data);
        $this->db->where($where);
        $this->db->update($table);
    }

    public function getRelationshipSpecificData($table, $select, $referencedTable, $condition, $where)
    {
        if (empty($select))
            $select = '*';
        $this->db->select($select);
        $this->db->from($table);
        $this->db->join($referencedTable, $condition);
        $this->db->where($where);
        $row = $this->db->get()->row();
        if (isset($row))
            return $row;
        else
            return null;
    }

    function getRelationshipData($limit, $start, $table,$select, $referencedTable, $condition)
    {
        $data = null;
        if (isset($limit) && isset($start))
            $this->db->limit($limit, $start);
        if (empty($select))
            $select = '*';
        $this->db->select($select);
        $this->db->from($table);
        $this->db->join($referencedTable, $condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 0)
        {
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }

            return $data;
        }

        return false;
    }

    public function searchData($limit, $start, $table, $referencedTable, $condition, $where)
    {
        $data = null;
        if (isset($limit) && isset($start))
            $this->db->limit($limit, $start);
        if (isset($referencedTable))
            $this->db->order_by("$referencedTable.id", 'DESC');
            
        $this->db->select('*');
        $this->db->from($table);
        if (isset($referencedTable))
            $this->db->join($referencedTable, $condition);
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() >= 0)
        {
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }

            return $data;
        }

        return false;
    }

    function countSearchData($table, $referencedTable, $condition, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        if (isset($referencedTable))
            $this->db->join($referencedTable, $condition);
        $this->db->where($where);
        $query = $this->db->get();

        return $query->num_rows();
    }

    public function getData($limit, $start, $table)
    {
        $data = null;
        if (isset($limit) && isset($start))
            $this->db->limit($limit, $start);
            
        $this->db->order_by('id', 'DESC');
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

    public function getAllData($table)
    {
        $data = null;$this->db->order_by('id', 'DESC');
        $query = $this->db->get($table);
        if ($query->num_rows() >= 0)
        {
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }

            return $data;
        }

        return null;
    }

    public function getSpecificData($table, $where)
    {
        $this->db->from($table);
        $this->db->where($where);
        $row = $this->db->get()->row();

        return $row;
    }

    public function checkRecord($table,$where)
    {
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }

    }

    public function incrementLikeCount($table, $where)
    {
        $count = $this->getSpecificData($table,$where);
        $count->LIKE_COUNT++;
        $this->db->set('LIKE_COUNT', $count->LIKE_COUNT);
        $this->db->where($where);
        $this->db->update($table);
    }
}