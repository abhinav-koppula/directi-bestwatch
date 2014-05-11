<?php

if (!defined('BASEPATH'))
    die();
session_start();

class Home extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->is_active = 'home';

        parse_str($_SERVER['QUERY_STRING'], $_REQUEST);

        $this->config->load('config_facebook');

        $this->load->library('Facebook', array("appId" => $this->config->item('appId'), "secret" => $this->config->item('secret')));

        $this->user = $this->facebook->getUser();
    }

    public function index() {
        $this->load->view('include/header');
        $data = array();
        if ($this->user) {
            $data['url'] = $logout = base_url() . 'login/logout';
        } else {
            $params = array(
                'scope' => 'email',
                'redirect_uri' => base_url().'login/fblogin'
            );
            $data['url'] = $login = $this->facebook->getLoginUrl($params);
        }
        $this->load->model('mshows');
        $rand = rand(0,11);
        $result = $this->mshows->get_twelve_random_shows($rand);
        $data['shows'] = $result;
        
        $this->load->model('mrating_show');
        $this->load->model('mshows');
        $lim = 4;
        $highest_rated = $this->mrating_show->get_highest_rated($lim);
        $top = array();
        $x = array();
        foreach($highest_rated as $h)
        {
            $show_id = $h->show_id;
            $rating = $h->rating;
            $show_res = $this->mshows->get_by_id($show_id);
            foreach($show_res as $s)
            {
                $show = $s->name;
                $id = $s->id;
            }
            $x['id']=$id;
            $x['name']=$show;
            $x['rating']=$rating;
            array_push($top, $x);
        }
        $data['top_rated'] = $top;
        $this->load->view('home', $data);
        $this->load->view('include/footer');
    }

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
