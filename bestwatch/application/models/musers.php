<?php

class Musers extends CI_Model {

    public function update_profpic($id, $profpic) {
        $data = array(
            'profile_pic' => $profpic
        );

        $this->db->where('login_id', $id);
        $this->db->update('users', $data);
    }

}

?>
