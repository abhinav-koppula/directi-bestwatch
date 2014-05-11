<?php

class Mshows_genres extends CI_Model {
    public function get_genre_by_showid($show_id)
    {
        $this->db->select('genre_id');
        $this->db->from('shows_genres');
        $this->db->where('show_id',$show_id);
        
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_show_by_genreid($genre_id)
    {
        $this->db->distinct('show_id');
        $this->db->from('shows_genres');
        $this->db->where('genre_id',$genre_id);
        
        $query = $this->db->get();
        return $query->result();
    }
}
?>
