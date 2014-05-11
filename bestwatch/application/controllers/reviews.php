<?php

if (!defined('BASEPATH'))
    die();

class Reviews extends MY_Controller
{
    public function __construct() {
        parent::__construct();
    }
    
    public function add()
    {
        $author_id = $this->input->post('author_id');
        $show_id = $this->input->post('show_id');
        $review = $this->input->post('review');
        
        $this->load->model('mreview_show');
        $insert_id = $this->mreview_show->add_review($author_id, $show_id, $review);
        if($insert_id>0)
            echo "true";
        else
            echo "false";
    }
}

?>
