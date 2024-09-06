<?php

class Router{

    private $post = [];
    private $get = [];

    public static function make(){
        $router = new self;
        return $router;
    }

    public function post($uri, $action) {
        $this->post[$uri] = $action;
        return $this;

    }

    public function get($uri, $action) {
        $this->get[$uri] = $action;
        return $this;

    }

    public function resolve($uri, $method){

        if (array_key_exists($uri, $this->$method)) {
            // require $this->$method[$uri];//يروح يجلب المفتاح او كي من مصفوفة الميثود المختار
            $action = $this->$method[$uri];

            $this->callaction(...$action);
            
        }else{
            throw new Exception("page ($uri) not found");
        }
    }

    protected function callaction($x_controller, $action)  {
        // $controller = new $action[0];
        // $method = $action[1];
        // $controller->{$method}();

        $controller = new $x_controller;
        
        $controller->{$action}();
        
    }
}