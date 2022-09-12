<?php
session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");
require_once('connection.php');
if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
    if (isset($_GET['action']))
        $action = $_GET['action'];
    else $action = 'index';
} else {
    $controller = 'superadmin';
    $action = 'login';
}
require_once('routers.php');
