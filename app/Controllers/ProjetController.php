<?php 
namespace app\Controllers;
use app\core\Controller;
use app\Models\User;
use app\Models\Categorie;
use app\Models\Tag;
use app\Models\Projet;



class ProjetController extends Controller
{

private Projet $projetModel;
private Categorie $categories;
private Tag $tags;
private User $userModel;

public function __construct()
{
    $this->userModel = new User ();
    $this->projetModel = new Projet();
    $this->categories = new Categorie();
    $this->tags = new Tag();
}


public function index()
{
    if(!isset($_SESSION['user'])){
        $this->render('Home');
    }else{
        $role=$_SESSION['role'];
        $categories = $this->categories->getAll();
        $tags = $this->tags->getAll();

        switch($role->getId()){
            case 1:

                $projets = $this->projetModel->getAll();
               
                // $this->render('ProjetListe',['projets'=>$projets]);
                
            break;

            case 2:

                $projets = $this->projetModel->getMyProjets($_SESSION['user_id']);
              
                $this->render('ProjetListe',['projets'=>$projets]);
             break;

        }



    }
}


public function getAll()
{
    $projets = $this->projetModel->getAll();
if($projets){

 return   $this->render('ProjetListe',['projets'=>$projets]);
  
}
    
}

public function add()
{
    if(isset($_Post['submit']) && !empty($_POST['titre']) && !empty(['description']) && !empty($_POST['budget']) && !empty($_POST['date_debut']) && !empty($_POST['date_fin'])&& !empty($_POST['categorie'])){

        $tags = array();

        foreach($_POST['tags'] as $tagId){
            $tag = new tag();
            $tag->setId($tagId);
            array_push($tags,$tag);
        }
     $this->projetModel->setTitre($_POST['titre']);
     $this->projetModel->setDescription($_POST['description']);
     $this->projetModel->setBudget($_POST['budget']);
     $this->projetModel->setDateDebut($_POST['date_debut']);
     $this->projetModel->setDateFin($_POST['date_fin']);
     $this->projetModel->setClient($_SESSION['user']);
     $this->projetModel->setCategorie($this->categories->getById($_POST['categorie']));
     $this->projetModel->setTags($tags);
      
     $result = $this->projetModel->create();


     if ($result){
        header('Location: ../Dashboard');
        exit();
     }else {
        echo "Erreur lors de l'ajout de la catégorie.";
     }

    }
}



public function delete($id)
{
    $delete = $this->projetModel->delete($id);


    if ($delete){
        header('Location:../');
        exit();

    }
}

}