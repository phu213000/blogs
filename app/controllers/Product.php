<?php
class product extends Dcontroller{
  public function __construct(){
    parent::__construct();
  }

<<<<<<< HEAD
 public function index(){
  $this->add_product();
 }

 public function add_product(){
  $this->load->view('cpanel/header');
  $this->load->view('cpanel/menu');
  $this->load->view('cpanel/product/add_product');
  $this->load->view('cpanel/footer');
 }
=======
  public function index(){
    $this->add_product(); 
  }

  public function add_product(){
    $this->load->view('cpanel/header');
    $this->load->view('cpanel/menu');
    $this->load->view('cpanel/product/add_product');
    $this->load->view('cpanel/footer');
  } 

>>>>>>> 8576426d1c340246fb93f9dd1f10c7145d19037f
}
?>