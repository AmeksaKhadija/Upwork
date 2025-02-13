<?php
require_once dirname(__DIR__) . "\\vendor\\autoload.php";
include '../app/core/Router.php';
session_start();
new Router();
