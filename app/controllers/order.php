<?php

class order extends Dcontroller{
  public function __construct(){
   parent::__construct();
  }
 public function index(){
  return $this->order();
 }

  public function order(){
    Session::checkSession();  
    $this->load->view('header');
    $this->load->view('order');
    $this->load->view('footer');
  }
}


?>