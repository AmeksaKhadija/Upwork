<?php

namespace app\Controllers;

use app\core\Controller;
use app\Models\Tag;
use app\Models\User;
use app\Models\Role;

class TagsController extends Controller
{
    private Tag $tagModel;
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
        $this->tagModel = new Tag();
    }

public function index(){
   echo "ana hna";
      $this->getAll();
}

    public function getAll()
    {
        $user = $this->userModel->ShowProfile($_SESSION['user_id']);
        $role=new Role();
        $user->setRole($role->findById($user->role_id));
        $tags = $this->tagModel->getAll();
        $role = $_SESSION["role"];
       return $this->render('Dashboard',['tags'=>$tags,'user'=>$user]);
    }








}