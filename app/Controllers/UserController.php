<?php

namespace app\Controllers;

use app\core\Controller;
use app\Models\User;
use app\Models\Projet;
use app\Models\Categorie;
use app\Models\Tag;

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
            
            // $this->render('Dashboard');
                // $this->getOne();
                
            switch ($role->getId()) {
                case 1:
                    $projets = $this->projetModel->getAll();
                    $this->render('ProjetListe', ['$projets' => $projets]);
                    break;

                case 2:

                    $projets = $this->projetModel->getMyProjets($_SESSION['user_id']);

                    $this->render('ProjetListe', ['$projets' => $projets]);
                    break;
                case 3:

                    $this->render('Profile');
            }
        }
    }
    public function ShowProfile()
    {
        // var_dump($_SESSION['user_id']);
        // die;
        $user_id = $_SESSION['user_id'];
        if ($this->userModel->ShowProfile($user_id)) {
            // echo "test";
            $this->render('Profile');
        }
    }

    public function getOne()
    {

            $users = $this->userModel->ShowProfile($_SESSION['user_id']);
                var_dump($users);
                die;
                return  $this->render('Dashboard', ['users' => $users]);

      
    }
}
