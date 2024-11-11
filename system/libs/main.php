<?php
class Main
{
    public $url;
    public $controllerName = "index";
    public $methodName = "index";
    public $controllerPath = "app/controllers/";
    public $controller;

    public function __construct()
    {
        $this->getUrl();
        $this->loadController();
        $this->callMethod();
    }

    // Lấy URL từ request
    public function getUrl()
    {
        $this->url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : null;
        $this->url = $this->url ? explode('/', filter_var($this->url, FILTER_SANITIZE_URL)) : [];
    }

    // Tải controller tương ứng
    public function loadController()
    {
        $this->controllerName = isset($this->url[0]) ? $this->url[0] : $this->controllerName;
        $fileName = $this->controllerPath . $this->controllerName . '.php';

        if (file_exists($fileName)) {
            include $fileName;
            if (class_exists($this->controllerName)) {
                $this->controller = new $this->controllerName();
                return;
            }
        }
        $this->redirectNotFound();
    }

    // Gọi method của controller
    public function callMethod()
    {
        $this->methodName = isset($this->url[1]) ? $this->url[1] : $this->methodName;
        $params = array_slice($this->url, 2);

        if (method_exists($this->controller, $this->methodName)) {
            call_user_func_array([$this->controller, $this->methodName], $params);
        } else {
            $this->redirectNotFound();
        }
    }

    // Chuyển hướng đến trang không tìm thấy
    private function redirectNotFound()
    {
        header("Location: " . BASE_URL . "/index/notfound");
        exit();
    }
}
?>