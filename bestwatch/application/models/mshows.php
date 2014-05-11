<?php

class Mshows extends CI_Model {

    public function get_all_shows() {
        $this->db->select('*');
        $this->db->from('shows');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_by_id($id) {
        $this->db->select('*');
        $this->db->from('shows');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_by_name($name) {
        $this->db->select('*');
        $this->db->from('shows');
        $this->db->where('name', $name);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_by_genre($genre) {
        $sql = 'SELECT * FROM shows AS s INNER JOIN (
            SELECT DISTINCT sg.show_id FROM shows_genres AS sg WHERE sg.genre_id = 
            ( SELECT g.id FROM genres g WHERE g.name = ? )
            )T ON T.show_id = s.id';
        $query = $this->db->query($sql, array($genre));
        return $query->result();
    }
    
    public function get_by_genre_id($genre_id) {
        $sql = 'SELECT * FROM shows AS s INNER JOIN (
            SELECT DISTINCT sg.show_id FROM shows_genres AS sg WHERE sg.genre_id = ?
            )T ON T.show_id = s.id';
        $query = $this->db->query($sql, array($genre_id));
        return $query->result();
    }
    
    public function get_genres($show_id)
    {
        $this->load->model('mshows_genres');
        $this->load->model('mgenres');
        $genres = $this->mshows_genres->get_genre_by_showid($show_id);
        
        $genre_names = array();
        $i=0;
        foreach($genres as $genre)
        {
            $row = $this->mgenres->get_by_id($genre->genre_id);   
            $genre_names[$i]['name']= $row[0]->name;
            $genre_names[$i]['id']= $row[0]->id;
            $i++;
        }
        return $genre_names;
    }
    
    public function get_twelve_random_shows($start)
    {
        $sql = "SELECT * FROM `shows` WHERE 1 LIMIT ?,?";
        $query = $this->db->query($sql, array($start,12));
        return $query->result();
    }
}

?>
