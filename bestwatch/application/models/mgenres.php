<?php

class Mgenres extends CI_Model {
    public function get_all_genres()
    {
        $this->db->select('*');
        $this->db->from('genres');

        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('genres');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_by_name($name)
    {
        $this->db->select('*');
        $this->db->from('genres');
        $this->db->where('name',$name);
        $query = $this->db->get();
        return $query->result();
    }
        
}

?>
