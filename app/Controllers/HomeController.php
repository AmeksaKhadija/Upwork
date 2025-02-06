<?php 
namespace app\Controllers;

use app\core\Controller;

class HomeController extends Controller
{

    public function index()
    {
        // include '../app/Views/Home.php';

        $this->render('Home');
    }



}
