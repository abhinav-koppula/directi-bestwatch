<?php

class Mlogin extends CI_Model {

    public function login_check($username, $password) {
        $this->db->select('*');
        $this->db->from('login');
        $this->db->join('users','users.login_id=login.id');
        $this->db->where('email', $username);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    public function check_email_existing($str)
    {
        $this->db->select('id');
        $this->db->from('login');
        $this->db->where('email', $str);
        $this->db->limit(1);
        
        $query = $this->db->get();
        
        if($query->num_rows() == 1)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    
    public function insert_user($name, $email, $password)
    {
        $data = array(
            'email'=>$email,
            'password'=> MD5($password)
        );
        
        $this->db->insert('login',$data);
        $insert_id = $this->db->insert_id();
        
        $data = array(
        'login_id'=>$insert_id,
            'name'=>$name
        );
        
        $this->db->insert('users', $data);
        
        return $insert_id;
    }
    
    public function insert_fb_user($name, $email)
    {
        $data = array(
            'email'=>$email,
        );
        
        $this->db->insert('login',$data);
        $insert_id = $this->db->insert_id();
        
        $data = array(
        'login_id'=>$insert_id,
            'name'=>$name
        );
        
        $this->db->insert('users', $data);
        
        return $insert_id;
    }
    public function get_user_by_id($login_id)
    {
        $sql = "SELECT l.id,email,name,profile_pic FROM login l INNER JOIN users u ON l.id=u.login_id WHERE l.id=?";
        $query = $this->db->query($sql,array($login_id));
        return $query->result();
    }
    
    public function get_user_by_email($email)
    {
        $sql = "SELECT l.id,email,name,profile_pic FROM login l INNER JOIN users u ON l.id=u.login_id WHERE l.email=?";
        $query = $this->db->query($sql,array($email));
        return $query->result();
    }
}

?>
