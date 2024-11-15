<?php
class login extends Dcontroller {
  public $load;
  
  public function __construct() {
      $data = array();
      parent::__construct();
      $this->load = new Load(); // Khởi tạo Load
  }

  public function index() {
    $this->login();
  }

  public function login() {
    $this->load->view('header');
    $this->load->view('cpanel/login');
    $this->load->view('footer');
  }

  public function authentication_login(){
   
    
   
  }
}
?>