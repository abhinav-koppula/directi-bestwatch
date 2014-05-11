<?php

if (!defined('BASEPATH'))
    die();

class Explore extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->is_active = 'explore';
    }

    public function index() {
        $this->genre(0);
    }

    public function genre($genre_id) {
        $this->load->view('include/header');
        $this->load->model('mshows');
        $this->load->model('mgenres');

        if ($genre_id == 0) {
            $result = $this->mshows->get_all_shows();
            $data['genre_id'] = 0;
            $data['genre_name'] = 'all';
            $data['shows'] = $result;
        } else {
            $result = $this->mshows->get_by_genre_id($genre_id);
            $genre = $this->mgenres->get_by_id($genre_id);
            foreach ($genre as $g) {
                $data['genre_id'] = $genre_id;
                $data['genre_name'] = $g->name;
            }

            $data['shows'] = $result;
        }

        $this->load->view('explore', $data);
        $this->load->view('include/footer');
    }

}

?>
