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
              $categories=$this->categories->getAll();
              $tags = $this->tags->getAll();

                $this->render('ProjetListe',['projets'=>$projets,'categorie'=>$categories ,'tags'=>$tags]);
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
    
    if(isset($_POST['submit']) &&  !empty($_POST['titre']) && !empty(['description']) && !empty($_POST['budget']) && !empty($_POST['date_debut']) && !empty($_POST['date_fin'])&& !empty($_POST['categorie'])){
          // var_dump($_POST["tags"]);
            // die;
        $tags = array();

        foreach($_POST['tags'] as $tagId){
            // var_dump($tagId);
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
     header("Location: ".$_SERVER['HTTP_REFERER']);//katrej3ek lpage li kenti fiha 
        //    var_dump($result);
        //     die;

    //  if ($result){
    //     header('Location: ../Projet');
    //     exit();
    //  }else {
    //     echo "Erreur lors de l'ajout du projet.";
    //  }

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