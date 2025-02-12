<?php

session_start();

require_once dirname(__DIR__) . "\\vendor\\autoload.php";
include '../app/core/Router.php';
// session_unset();

//  var_dump( $_SESSION['user'] );
//  die;
new Router();
