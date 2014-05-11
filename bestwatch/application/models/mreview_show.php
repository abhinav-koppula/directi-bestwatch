<?php

class Mreview_show extends CI_Model {

    public function get_reviews_by_author($author_id) {
        $sql = "SELECT u.id AS user_id,u.name AS user_name,u.profile_pic AS profile_pic, r.id AS review_id,r.review,s.id AS show_id,s.name AS show_name,s.poster AS show_poster, s.summary AS show_summary FROM users u, review_show r, shows s WHERE u.login_id=r.author_id AND r.show_id=s.id AND r.author_id=?";
        $query = $this->db->query($sql, array($author_id));
        return $query->result();
    }

    public function get_reviews_by_show($show_id) {
        $sql = "SELECT u.id AS user_id,u.name AS user_name,u.profile_pic AS profile_pic, r.id AS review_id,r.review,s.id AS show_id,s.name AS show_name,s.poster AS show_poster, s.summary AS show_summary FROM users u, review_show r, shows s WHERE u.login_id=r.author_id AND r.show_id=s.id AND r.show_id=?";
        $query = $this->db->query($sql, array($show_id));
        return $query->result();
    }

    public function add_review($author_id, $show_id, $review) {
        $data = array(
            'author_id' => $author_id,
            'show_id' => $show_id,
            'review' => $review
        );
        $this->db->insert('review_show', $data);
        return $this->db->insert_id();
    }

}

?>
