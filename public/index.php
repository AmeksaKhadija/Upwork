<?php
require_once dirname(__DIR__) . "\\vendor\\autoload.php";
include '../app/core/Router.php';
session_start();
// session_unset();
//  var_dump( $_SESSION['user'] );
//  die;
new Router ();


?>