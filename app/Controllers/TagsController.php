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
//    echo "ana hna";
      $this->getAll();
     $tags= $this->tagModel->getAll();
      $this->render('TagListe',['tags'=>$tags],['tags'=>$tags]);
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


    
    public function add()
    {
        if (isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['logo'])) {

            $this->tagModel->setName($_POST['name']);
            $this->tagModel->setDescription($_POST['description']);
            $this->tagModel->setLogo($_POST['logo']);
            $result = $this->tagModel->create();


            if ($result) {

                header('Location: ../Tags');
                exit();
            } else {

                echo "Erreur lors de l'ajout du tag.";
            }
        }
    }


    public function update()
    {
        if($_SERVER['REQUEST_METHOD']){
            $this->tagModel->setName($_POST['name']);
            $this->tagModel->setDescription($_POST['description']);
            $this->tagModel->setLogo($_POST['logo']);
            $this->tagModel->setId($_POST['id']);

           $tags = $this->tagModel->update();
            header('location: /Tags');
            

        }
    }





}