<?php
require_once 'controllers/PageController.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

$controller = new PageController();
$controller->render($page);
?>
