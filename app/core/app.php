<?php
Class App{

    private $controller = "cities";

    private $method = "index";

    private $params = [];

    public function __construct(){
        
        if(!isset($_GET["url"])){
            require_once "app/controllers/$this->controller.php";
            
            $this->controller = new $this->controller;

            call_user_func_array([$this->controller, $this->method], $this->params);
            return;
        }

        $url = self::parseUrl($_GET["url"]);

        if(file_exists("app/controllers/".$url[0].".php")){            
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once "app/controllers/$this->controller.php";
        $this->controller = new $this->controller;

        if(isset($url[1]) && method_exists($this->controller, $url[1])){
            $this->method = $url[1];
            unset($url[1]);
        }

        $this->params = $url ? $url : [];

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function parseUrl($url = null){
        return explode("/", filter_var(rtrim($url), FILTER_SANITIZE_URL));
    }

}