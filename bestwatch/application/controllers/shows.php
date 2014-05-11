<?php

if (!defined('BASEPATH'))
    die();

class Shows extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->is_active = 'explore';
    }
    
    public function detail($show_id)
    {
        $this->load->view('include/header');
        $this->load->model('mshows');
        $this->load->model('mreview_show');
        $this->load->model('mrating_show');
        
        $show_detail = $this->mshows->get_by_id($show_id);
        foreach($show_detail as $show)
        {
            $data['show_id']=$show->id;
            $data['name']=$show->name;
            $data['poster']=$show->poster;
            $data['summary']=$show->summary;
            $genres = $this->mshows->get_genres($show->id);
            $data['genres']=$genres;
            
            $reviews = $this->mreview_show->get_reviews_by_show($show->id);
            $data['reviews']=$reviews;
            $data['reviews_count']=count($reviews);
            
            $ratings = $this->mrating_show->get_num_ratings($show->id);
            $data['ratings_count'] = $ratings[0]->count;
        }
        
        $this->load->view('shows_detail',$data);
        $this->load->view('include/footer');
    }
}

?>
