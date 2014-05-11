<?php

if (!defined('BASEPATH'))
    die();

class Custom_404 extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->output->set_status_header('404');
        $this->load->view('include/header');
        $this->load->view('404');
        $this->load->view('include/footer');
    }

}

?>
