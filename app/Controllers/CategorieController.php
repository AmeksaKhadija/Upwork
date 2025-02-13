<?php
namespace  app\Controllers;
use app\Models\Categorie;
use app\Models\User;
use app\Models\Role;
use app\core\Controller;

class CategorieController extends Controller{

private Categorie $categorieModel;
private User $userModel;



public function __construct()
{
    $this->categorieModel= new Categorie ();
    $this->userModel= new User ();
}


public function index(){
    $this->getAll();
    $categories = $this->categorieModel->getAll();

    $this->render('CategorieListe',['categories'=>$categories]);

}


public function getAll(){
 $user = $this->userModel->ShowProfile($_SESSION['user_id']);
 $role = new Role ();
 $user->setRole($role->findById($user->role_id));

 $categories= $this->categorieModel->getAll();
 $role=$_SESSION['role'];

    return $this->render('Dashboard',['categories'=>$categories , 'user'=>$user ]);
}


public function add(){

    if (isset( $_POST['submit'])  && !empty($_POST['name']) && !empty($_POST['description'])){

        $this->categorieModel->setName($_POST['name']);
        $this->categorieModel->setDescription($_POST['description']);
        $result =  $this->categorieModel->create();

        if ($result){
            
            if ($result) {

                header('Location: ../Categorie');
                exit();
            } else {

                echo "Erreur lors de l'ajout du tag.";
            }
        }




    }
}

public function delete($id)
{


    $delete = $this->categorieModel->delete($id);
    if($delete){

    header('location:../');
        exit();
    }

}


public function update(){
  if($_SERVER['REQUEST_METHOD']){

    $this->categorieModel->setName($_POST['name']);
    $this->categorieModel->setDescription($_POST['description']);
    $this->categorieModel->setId($_POST['id']);

    $categories = $this->categorieModel->update();
    header('location: /Categorie');
  }



}






}