<?php
class Index extends Dcontroller{
  public $load;
  
  public function __construct(){
      $data =array();
      parent::__construct();
      $this->load = new Load(); // Khởi tạo Load
  }

  public function homepage(){
    $this->load->view('header');
    // $homemodel = $this->load->model('homemodel'); 
    // $table_category_product = 'tbl_category_product';
    // $data['category'] = $homemodel->category($table_category_product);
    $this->load->view('home', $data);
    $this->load->view('footer');
  }
}

?>