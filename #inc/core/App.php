<?php

class App {
    protected $controller = 'page';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseURL();

        if (is_null($url)) {
            $url[0] = $this->controller;
        }

        // Check if URL contains underscores and redirect if true
        foreach ($url as $segment) {
            if (strpos($segment, '_') !== false) {
                $this->redirectHome();
            }
        }

        // Menangani direktori 'page'
        if ($url[0] == 'page') {
            unset($url[0]);
            if (isset($url[1]) && ($url[1] == 'antara' || $url[1] == 'ppid')) {
                // Handle subdirectory 'antara' or 'ppid'
                $this->controller = $url[1];
                unset($url[1]);
                if (isset($url[2])) {
                    $this->method = str_replace('-', '_', $url[2]);
                    unset($url[2]);
                }
            } else {
                // Handle root 'page'
                $this->controller = 'page';
                if (isset($url[1])) {
                    $this->method = str_replace('-', '_', $url[1]);
                    unset($url[1]);
                }
            }
        } else {
            $url[0] = str_replace('-', '_', $url[0]);
            $this->controller = $url[0];
            unset($url[0]);
            if (isset($url[1])) {
                $this->method = str_replace('-', '_', $url[1]);
                unset($url[1]);
            }
        }

        // Load the controller
        if (file_exists('#inc/controller/' . $this->controller . '.php')) {
            require_once '#inc/controller/' . $this->controller . '.php';
            $this->controller = new $this->controller;
        } else {
            $this->redirectHome();
        }

        if (!method_exists($this->controller, $this->method)) {
            $this->redirectHome();
        }

        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
        return null;
    }

    private function redirectHome() {
        header("Location: /portal-antara");
        exit();
    }
}
