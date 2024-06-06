<?php

class Controller {
    public function view($view, $data = []) {
        require_once '../views/templates/header.php';
        require_once '../views/' . $view . '.php';
        require_once '../views/templates/footer.php';
    }
}
?>
