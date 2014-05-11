<?php
class MY_Controller extends CI_Controller {

   public $header_explore_menu;
   public $is_active;
   
   function __construct() {
       parent::__construct();
       
       $this->header_explore_menu = array();
       $this->load->model('mgenres');
       $result = $this->mgenres->get_all_genres();
       foreach($result as $res)
       {
           $temp['id'] = $res->id;
           $temp['name'] = $res->name;
           array_push($this->header_explore_menu, $temp);
       }
   }
}
?>
