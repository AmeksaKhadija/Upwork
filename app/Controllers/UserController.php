<?php

namespace app\Controllers;

use app\core\Controller;
use app\Models\User;
use app\Models\Projet;
use app\Models\Categorie;
use app\Models\Tag;

use app\Models\Role;



class UserController extends Controller
{
    private $userModel;
    private Projet $projetModel;
    private Categorie $categories;
    private Tag $tags;

    public function __construct()
    {
        $this->userModel = new User();
        $this->projetModel = new Projet();
        $this->categories = new Categorie();
        $this->tags = new Tag();
    }

    public function index()
    {
        if (!isset($_SESSION['user'])) {

            $this->render('Home', []);
        } else {
            $role = $_SESSION['role'];


            // var_dump($role);
            // die;
            // $this->render('Dashboard');
            $this->getOne();



            switch ($role->getId()) {
                case 1:
                    $projets = $this->projetModel->getAll();


                    $this->render('ProjetListe', ['projets' => $projets]);

                    break;

                case 2:

                    $projets = $this->projetModel->getMyProjets($_SESSION['user_id']);
                    $categories=$this->categories->getAll();
                    $tags = $this->tags->getAll();
      

                    $this->render('ProjetListe', ['projets' => $projets,'categories'=>$categories ,'tags'=>$tags]);
                    break;
                case 3:

                    $projets = $this->projetModel->getAll();
                    $this->render('ProjetListe', ['projets' => $projets]);
                    break;
            }
        }
    }
    
    public function ShowProfile()
    {
        // var_dump($_SESSION['user_id']);
        // die;
        $user_id = $_SESSION['user_id'];
        $result = $this->userModel->ShowProfile($user_id);
        if ($result) {
            // include '../app/Views/Profile.php';
            $this->render('Profile', ['result' => $result]);
            // return $result;
        }
    }

    public function getOne()
    {

        $users = $this->userModel->ShowProfile($_SESSION['user_id']);

        $role = new Role();
        $users->setRole($role->findById($users->role_id));
        // var_dump($users);
        // die;
        return  $this->render('Dashboard', ['user' => $users]);
    }
}
