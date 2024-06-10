<?php

class Controller {
    public function view($view, $data = []){
        require_once '#inc/views/' . $view . '.php';
    }
}