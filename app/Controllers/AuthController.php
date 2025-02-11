<?php

namespace app\Controllers;

use app\core\Controller;
use app\Models\User;
use app\Models\Role;

class AuthController extends Controller
{
    private $userModel;
    private $roleModel;

    public function __construct()
    {
        $this->userModel = new User();
        $this->roleModel = new Role();
    }

    public function index()
    {
        // include '../app/Views/Login.php';
        $this->render('Login');
    }

    public function signup()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) && $_POST['submit'] == 'signup') {
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $photo = htmlspecialchars($_POST['photo']);
            $portfolio = htmlspecialchars($_POST['portfolio']);
            $tauxhoraire = htmlspecialchars($_POST['tauxhoraire']);
            $roleName = htmlspecialchars($_POST['role']);

            $errors = [];

            if (empty($nom) || empty($prenom) || empty($photo) || empty($portfolio) ||  !filter_var($email, FILTER_VALIDATE_EMAIL)) {

                echo $errors['general'] = "Veuillez remplir tous les champs correctement.";
            }

            if (empty($password) || !preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $password)) {
                echo  $errors['password'] = "Le mot de passe doit contenir au moins 8 caractères, une lettre et un chiffre.";
            }

            if (empty($errors)) {
                $this->userModel->setNom($nom);
                $this->userModel->setPrenom($prenom);
                $email = $this->userModel->setEmail($email);
                $password = $this->userModel->setPassword($password);
                $this->userModel->setPhoto($photo);
                $this->userModel->setPortfolio($portfolio);
                $this->userModel->setTauxHoraire($tauxhoraire);
                $this->userModel->setRole($this->roleModel->findByName($roleName));

                if ($this->userModel->create()) {
                    $this->render('Login');
                }
            } else {
                echo $errors['general'];
            }
        } else {
            $this->render('Signup');
        }
    }


    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'login') {
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $errors = [];

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo $errors['email'] = "L'email n'est pas valide.";
            }

            if (empty($password) || !preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $password)) {
                echo $errors['password'] = "le mot de passe doit contenir au moins 8 caractères, une lettre et un chiffre.";
            }

            if (empty($errors)) {

                $user = $this->userModel->login($email, $password);
                
                // var_dump($user);
                // die;
                if ($user) {
                    $_SESSION['nom'] = $user->getNom();
                    $_SESSION['prenom'] = $user->getPrenom();
                    $_SESSION['email'] = $user->getEmail();
                    $_SESSION['role'] = $user->getRole();
                    $_SESSION['user_id'] = $user->getId();
                    $_SESSION['user'] = $user;
                    
                     header('location:../');
                    // $this->render('Dashboard');
                }
            }

        } else {

            unset($_Post);
            $this->render('Login');
        }
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
