<?php
class login extends Dcontroller {
  public $load;
  
  public function __construct() {
      // $message = array();
      $data = array();
      parent::__construct();
      // $this->load = new Load(); // Khởi tạo Load
  }

  public function index() {
    $this->login();
  }

  public function login() {
    $this->load->view('header');
    $this->load->view('cpanel/login');
    $this->load->view('footer');
  }

  public function dashboard() {
    // Session::checkSession();
    echo "Welcome to Dashboard";
  }
  public function authentication_login(){
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Mật khẩu phải là MD5

    $table_admin = 'tbl_admin';
    $loginmodel = $this->load->model('loginmodel');

    $count = $loginmodel->login($table_admin, $username, $password);

    // $count = $loginmodel->login($table_admin, $username, $password);


    
    // switch ($count) {
    //     case 0:
    //         header("Location:".BASE_URL."/login");
    //         exit;
    //     default:
    //         header("Location:".BASE_URL."/login/dashboard");
    //         exit;
    // }
  
  }

  // public function logout(){
  //   Session::init();
  //   Session::destroy();
  //   header('Location:'.BASE_URL.'/login/dashboard');
  // }
}
?>