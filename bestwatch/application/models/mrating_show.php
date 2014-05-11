<?php

class Mrating_show extends CI_Model
{
    public function add_rating($show_id, $user_id, $rating)
    {
        $data = array(
            'show_id' => $show_id,
            'user_id' => $user_id,
            'rating' => $rating
        );
        $this->db->insert('rating_show', $data);
        return $this->db->insert_id();
    }
    
    public function get_rating($show_id)
    {
        $sql = "SELECT round(avg(rating),2) AS rating FROM `rating_show` WHERE show_id = ?";
        $query = $this->db->query($sql, $show_id);
        
        return $query->result();
    }
    
    public function check_rating_exists($show_id, $user_id)
    {
        $this->db->select('*');
        $this->db->from('rating_show');
        $this->db->where('user_id', $user_id);
        $this->db->where('show_id', $show_id);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function get_highest_rated($limit)
    {
        $sql = "SELECT show_id, avg(rating) AS rating FROM `rating_show` GROUP BY show_id ORDER BY rating DESC LIMIT ?";
        $query = $this->db->query($sql, array($limit));
        return $query->result();
    }
    
    public function get_num_ratings($show_id)
    {
        $sql = "SELECT count(rating) AS count FROM `rating_show` WHERE show_id = ?";
        $query = $this->db->query($sql, $show_id);
        return $query->result();
    }
}
?>
