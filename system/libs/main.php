<?php
class Main{
  
  public $url;
  public $controllerName = "Index";
  public $methodName = "homepage";
  public $controllerPath = "app/controllers/";
  public $controller;

  public function __construct(){
    
  }
  
  #ham getUrl() dung de lay url
  #neu co url thi cat url va luu vao bien url
  #neu khong co url thi unset url
  public function getUrl(){
    $this->url = isset($_GET['url']) ? $_GET['url'] : NULL;
    if($this->url != NULL){
      $this->url = rtrim($this->url, '/');
      $this->url = explode('/', filter_var($this->url, FILTER_SANITIZE_URL));
    }else{
      unset($this->url);
    }

  }
  
  public function loadController(){
    if(!isset($this->url[0])){
      include $this->controllerPath.$this->controllerName.'.php';
      $this->controller = new $this->controllerName();
      $this->controller->{$this->methodName}();
    }else{
      $this->controllerName = $this->url[0];
      $fileName = $this->controllerPath.$this->controllerName.'.php';
      if(file_exists($fileName)){
        include $fileName;
        if(class_exists($this->controllerName)){
          $this->controller = new $this->controllerName();
          if(isset($this->url[2])){
            if(method_exists($this->controller, $this->url[1])){
              $this->methodName = $this->url[1];
              $this->controller->{$this->methodName}($this->url[2]);
            }else{
              header('Location: '.BASE_URL.'/Index/homepage');
            }
          }else{
            if(isset($this->url[1])){
              if(method_exists($this->controller, $this->url[1])){
                $this->methodName = $this->url[1];
                $this->controller->{$this->methodName}();
              }else{
                header('Location: '.BASE_URL.'/Index/homepage');
              }
            }else{
              $this->controller->{$this->methodName}();
            }
          }
        }else{
          header('Location: '.BASE_URL.'/Index/homepage');
        }
      }else{
        header('Location: '.BASE_URL.'/Index/homepage');
      }
    }

  }

  
}
?>