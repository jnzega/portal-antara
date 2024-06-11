<?php

// class App {
//     protected $controller = 'page';
//     protected $method = 'index';
//     protected $params = [];


//     public function __construct(){
//         $url = $this->parseURL();

//         if ( is_null($url) ) {
//             $url[0] = $this->controller;
//         }

//         if(file_exists('#inc/' . $url[0] . '.php')){
//             $this->controller = $url[0];
//             unset($url[0]);
//         }

//         require_once '#inc/' . $this->controller . '.php';
//         $this->controller = new $this->controller;

//         if(isset($url[1])) {
//             if(method_exists($this->controller, $url[1])){
//                 $this->method = $url[1];
//                 unset($url[1]);
//             }
//         }

//         if(!empty($url)){
//             $this->params = array_values($url);
//         }

//         call_user_func_array([$this->controller, $this->method], $this->params);
//     }

//     public function parseURL(){
//         if(isset($_GET['url'])){
//             $url = rtrim($_GET['url'], '/');
//             $url = filter_var($url, FILTER_SANITIZE_URL);
//             $url = explode('/', $url);
//             return $url;
//         }
//     }
// }

class App {
    protected $controller = 'page';
    protected $method = 'index';
    protected $params = [];

    public function __construct(){
        $url = $this->parseURL();

        if (is_null($url)) {
            $url[0] = $this->controller;
        }

        // Replace hyphens with underscores
        $url[0] = str_replace('-', '_', $url[0]);

        if(file_exists('#inc/' . $url[0] . '.php')){
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once '#inc/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        if(isset($url[1])) {
            // Replace hyphens with underscores in method name
            $url[1] = str_replace('-', '_', $url[1]);
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        if(!empty($url)){
            $this->params = array_values($url);
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
