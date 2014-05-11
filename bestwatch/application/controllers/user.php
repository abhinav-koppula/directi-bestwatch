<?php

if (!defined('BASEPATH'))
    die();

class User extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->is_active = 'user';
    }

    public function add() {
        $this->form_validation->set_rules('user_name', 'Name', 'required');

        $this->form_validation->set_rules('user_password', 'Password', 'required');

        $this->form_validation->set_rules('user_email', 'Email', 'required|valid_email|callback_email_check');

        $this->form_validation->set_message('email_check', 'Email already in use');


        $this->load->view('include/header');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('home');
        } else {
            $this->load->model('mlogin');
            $name = $this->input->post('user_name');
            $email = $this->input->post('user_email');
            $password = $this->input->post('user_password');
            $login_id = $this->mlogin->insert_user($name, $email, $password);

            $sess_array = array(
                'login_id' => $login_id,
                'email' => $email,
                'name' => $name,
                'profile_pic'=>'avatar.jpg'
            );
            $this->session->set_userdata('logged_in', $sess_array);
            redirect(base_url() . 'explore');
        }
        $this->load->view('include/footer');
    }
    //return FALSE since email_check test failed as result is TRUE as email exists
    function email_check($str) {
        $this->load->model('mlogin');
        $result = $this->mlogin->check_email_existing($str);
        if($result==TRUE)
            return FALSE;
        else
            return TRUE;
    }

    public function view_detail($id) {
        $this->load->view('include/header');
        $this->load->model('mlogin');
        $result = $this->mlogin->get_user_by_id($id);
        foreach ($result as $res) {
            $data['name'] = $res->name;
            $data['email'] = $res->email;
            $data['id'] = $res->id;
            $data['profile_pic'] = $res->profile_pic;
        }
        $this->load->view('profile', $data);

        $this->load->view('include/footer');
    }

    public function edit() {
        $this->load->view('include/header');
        $this->load->model('mlogin');
        if ($this->session->userdata('logged_in')) {
            $data['edit_flag'] = 1;
            $session_data = $this->session->userdata('logged_in');
            $data['id'] = $session_data['login_id'];
            $data['email'] = $session_data['email'];
            $data['name'] = $session_data['name'];
            $data['profile_pic'] = $session_data['profile_pic'];
            
            $this->load->view('profile', $data);
        } else {
            echo "Please log in to continue";
        }
        $this->load->view('include/footer');
    }

    public function upload_profpic() {
        
        $this->load->view('include/header');
        $this->load->model('musers');
        $session_data = $this->session->userdata('logged_in');
        $data['id'] = $session_data['login_id'];
        $data['email'] = $session_data['email'];
        $data['name'] = $session_data['name'];
        $data['profile_pic'] = $session_data['profile_pic'];
        $data['edit_flag'] = 1;
        
        $config['upload_path'] = 'assets/img/temp/profpics/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '3073';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $error = $this->upload->display_errors();
            $data['error'] = $error;
            $this->load->view('profile', $data);
        } else {
            $upload_data = $this->upload->data();
            $this->musers->update_profpic($data['id'], $upload_data['file_name']);
            $session_data['profile_pic'] = $upload_data['file_name'];
            $this->session->set_userdata('logged_in', $session_data);
            redirect('user/edit');
        }
        
        $this->load->view('include/footer');
    }

}

?>