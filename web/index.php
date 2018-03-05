<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include __DIR__.'/../config.php';

$page='default';
$action='index';

if (!empty($_GET['page'])){
  $page = $_GET['page'];
}

if (!empty($_GET['action'])){
  $action = $_GET['action'];
}

$filename = "../pages/" . $page . "/" . $action . ".php";
$error404 = "../pages/errors/" . $action . ".php";

if (file_exists($filename)) {
  include $filename;
  exit;
} else {
  include $error404;
  exit;
}