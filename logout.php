<?php
session_start();
session_unset();
session_destroy();

// Redirect ke halaman utama setelah logout
header('Location: http://localhost/portal-antara/');
exit();
?>