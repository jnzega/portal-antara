<?php

class Controller {
    public function view($view, $data = []){
        require_once './' . $view . '.php';
    }
}