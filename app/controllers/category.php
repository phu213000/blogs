<?php
class category extends Dcontroller{
  
  public function __construct(){
      $data =array();
      $message = array();
      parent::__construct();
      $this->load = new Load(); // Khởi tạo Load
  }
  public function list_category(){
      $this->load->view('header');

      $categorymodel = $this->load->model('categorymodel'); 
      $table_category_product = 'tbl_category_product';
      $data['category'] = $categorymodel->category($table_category_product);
      $this->load->view('category', $data);

      $this->load->view('footer');
  }
  public function catebyid(){
    $this->load->view('header');
    $categorymodel = $this->load->model('categorymodel'); 
    $id =1 ;
    $table_category_product = 'tbl_category_product';
    $data['categorybyid'] = $categorymodel->categorybyid($table_category_product,$id);
    $this->load->view('categorybyid', $data);
    $this->load->view('footer');
  }

  public function insertcategory(){
    $categorymodel = $this->load->model('categorymodel'); 

    // $id = 2 ;
    $table_category_product = 'tbl_category_product';

    $title = $_POST['title_category_product'];
    $desc = $_POST['desc_category_product'];

    $data = array(
      'title_category_product' => $title,
      'desc_category_product' => $desc
    );
    
    $resutl = $categorymodel->insertcategory($table_category_product, $data);
    if($resutl == 1){
      $message['msg'] = "Thêm dữ liệu thành công";
    }else{
      $message['msg'] = "Thêm dữ liệu thất bại";
    }
    $this->load->view('add_category', $message);
  }
  public function add_category(){
    $this->load->view('header');
    $this->load->view('add_category');
    $this->load->view('footer');
  }
  public function update_category(){

  }
  public function delete_category(){

  }


}

?>