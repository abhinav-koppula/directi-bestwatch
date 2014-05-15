<?php

if (!defined('BASEPATH'))
    die();

class Login extends MY_Controller {

    public function __construct() {

        parent::__construct();

        parse_str($_SERVER['QUERY_STRING'], $_REQUEST);

        $this->config->load('config_facebook');

        $this->load->library('Facebook', array("appId" => $this->config->item('appId'), "secret" => $this->config->item('secret')));

        $this->user = $this->facebook->getUser();
    }

    public function checklogin() {
        $this->load->model('mlogin', '', TRUE);
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $result = $this->mlogin->login_check($username, $password);
        if ($result) {
            $sess_array = array();
            foreach ($result as $res) {
                $sess_array = array(
                    'login_id' => $res->login_id,
                    'email' => $res->email,
                    'name' => $res->name,
                    'profile_pic' => $res->profile_pic
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            $data = "true";
        } else {
            $data = "false";
        }
        echo $data;
    }

    public function fblogin() {
        $this->load->model('mlogin');
        if ($this->user) {

            try {

                $user_profile = $this->facebook->api('/me');
                $profile_picture = 'http://graph.facebook.com/' . $user_profile['id'] . '/picture?type=large';


                if (($this->mlogin->check_email_existing($user_profile['email'])) == TRUE) {
                    $result = $this->mlogin->get_user_by_email($user_profile['email']);
                    foreach ($result as $res) {
                        $sess_array = array(
                            'login_id' => $res->id,
                            'email' => $res->email,
                            'name' => $res->name,
                            'profile_pic' => $res->profile_pic
                        );
                    }
                    $this->session->set_userdata('logged_in', $sess_array);
                } else {
                    $insert_id = $this->mlogin->insert_fb_user($user_profile['name'], $user_profile['email']);
                    $this->load->model('musers');
                    $this->musers->update_profpic($insert_id, $profile_picture);
                    if(isset($user_profile['email']) && isset($user_profile['name']))
                    {
                        $sess_array = array(
                            'login_id' => $insert_id,
                            'email' => $user_profile['email'],
                            'name' => $user_profile['name'],
                            'profile_pic' => $profile_picture
                        );
                        $this->session->set_userdata('logged_in', $sess_array);
                    }
                }
                redirect(base_url() . 'explore');
            } catch (FacebookApiException $e) {

                print_r($e);
                $user = null;
            }
        }
    }
    
    public function logout() {
        $this->facebook->destroySession();
        $this->session->unset_userdata('logged_in');
        redirect(base_url());
    }

}

?>
