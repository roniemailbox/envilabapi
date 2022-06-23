<?php
 
require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
 
class Get_product extends REST_Controller{
     
    public function __construct(){
        parent::__construct();
        $this->load->model('mod_product');
    }
     
    public function index_get(){
        $response = $this->mod_product->get_product();
        $this->response($response);
    }
} 
?>