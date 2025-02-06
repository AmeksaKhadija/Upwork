<?php
namespace app\Controllers;

use app\core\Controller;
class AuthController extends Controller
{


    public function index()
    {
        // include '../app/Views/Login.php';
        $this->render('Login');
    }

    public function signup()
    {
        echo 'compte created';
    }



    public function logout()
    {

        session_unset();
        session_destroy();

        // header('location: /');

        $this->render('Home');

        exit();
    }




}