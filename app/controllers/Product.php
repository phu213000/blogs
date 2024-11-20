<?php
class product extends Dcontroller{
  public function __construct(){
    parent::__construct();
  }

 public function index(){
  $this->add_product();
 }

 public function add_product(){
  $this->load->view('cpanel/header');
  $this->load->view('cpanel/menu');
  $this->load->view('cpanel/product/add_product');
  $this->load->view('cpanel/footer');
 }
}
?>