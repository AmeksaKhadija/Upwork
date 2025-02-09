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
       if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) && $_POST['submit'] == 'signup'){
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $photo = htmlspecialchars($_POST['photo']);
        $portfolio = htmlspecialchars($_POST['portfolio']);
        $roleName = htmlspecialchars($_POST['role']);
        
       }
    }


    public function login()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'login'){
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $errors = [];

            if (empty($email) || !filter_var($email , FILTER_VALIDATE_EMAIL)){
                echo $errors['email'] = "L'email n'est pas valide.";
            }

            if (empty($password) || !preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/' , $password)){
                echo $errors['password'] = "le mot de passe doit contenir au moins 8 caractères, une lettre et un chiffre.";
            }

            if (empty($errors)){

                $user= $this->userModel->login($email, $password);
                if($user) {
                    $_SESSION['nom'] = $user->getNom();
                    $_SESSION['prenom'] = $user->getPrenom();
                    $_SESSION['email'] = $user->getEmail();
                    $_SESSION['role'] = $user->getRole();
                    $_SESSION['user_id'] = $user->getId();
                    $_SESSION['user'] = $user;

                    header('location:/');
                }
            }

        }else{
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