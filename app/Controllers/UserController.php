<?php

namespace app\Controllers;

use app\core\Controller;
use app\Models\User;

class UserController extends Controller {
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function index()
    {
        $this->render('Profile');
    }

    public function ShowProfile(){
        var_dump($_SESSION['user_id']);
        die;
        $user_id = $_SESSION['user_id'];
        if ($this->userModel->ShowProfile($user_id)){
            // echo "test";
            $this->render('Profile');
        }
    }
}
