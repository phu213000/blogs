<?php
class Main{
  
  public $url;
  public $controllerName = "index";
  public $methodName = "index";
  public $controllerPath = "app/controllers/";
  public $controller;

  public function __construct(){
    $this->getUrl();
    $this->loadController();
    $this->callMethod();
  }
  
  // Hàm getUrl() dùng để lấy URL
  public function getUrl(){
    $this->url = isset($_GET['url']) ? $_GET['url'] : NULL;
    if($this->url != NULL){
      $this->url = rtrim($this->url, '/');
      $this->url = explode('/', filter_var($this->url, FILTER_SANITIZE_URL));
    } else {
      unset($this->url);
    }
  }
  
  public function loadController(){
    if(!isset($this->url[0])){
      include $this->controllerPath . $this->controllerName . '.php';
      $this->controller = new $this->controllerName();
    } else {
      $this->controllerName = $this->url[0];
      $fileName = $this->controllerPath . $this->controllerName . '.php';

      if(file_exists($fileName) && class_exists($this->controllerName)){
        include $fileName;
        $this->controller = new $this->controllerName();
      }
    }
  }

  public function callMethod(){
    if (isset($this->url[2])) {
        $this->methodName = $this->url[1];
        if (method_exists($this->controller, $this->methodName)) {
            $this->controller->{$this->methodName}($this->url[2]);
        } else {
            // Chuyển hướng đến trang notfound nếu method không tồn tại
            header("Location: " . rtrim(BASE_URL, '/') . "/index/notfound");
            exit;
        }
    } else {
        if (isset($this->url[1])) {
            $this->methodName = $this->url[1];
            if (method_exists($this->controller, $this->methodName)) {
                $this->controller->{$this->methodName}();
            } else {
                // Chuyển hướng đến trang notfound nếu method không tồn tại
                header("Location: " . rtrim(BASE_URL, '/') . "/index/notfound");
                exit;
            }
        } else {
            if (method_exists($this->controller, $this->methodName)) {
                $this->controller->{$this->methodName}();
            } else {
                // Chuyển hướng đến trang notfound nếu method không tồn tại
                header("Location: " . rtrim(BASE_URL, '/') . "/index/notfound");
                exit;
            }
        }
    }
}
  
}
?>