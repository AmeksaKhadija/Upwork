<?php
namespace app\Controllers;

use app\core\Controller;
class ErrorController extends Controller{



    public function index()
    {
        $this->error();
    }

    public function error()
    {
        $this->render('404',[]);
        // include_once '../app/Views/404.php';
        
    }

}