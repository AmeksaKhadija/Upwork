<?php
namespace app\Models;

use app\Config\Database;
use app\Models\Categorie;
use app\Models\Tag;
use PDO;

class Projet
{
    private int  $id;
    private string $titre ;
    private string $description;
    private float $budget;
    private string $date_debut ;
    private string $date_fin ;
    private ?Categorie $categorie=null;
    private User $client;
    private string $status;
    private array $tags=[];


    public function __construct(){}


    public function getId(): int
    {
        return $this->id;

    }


    public function getTitre(): string
    {
        return $this->titre;

    }


    public function getDescription():string
    {
        return $this->description;

    }

    public function getBudget(): float
    {
        return $this->budget;

    }

    public function getDateDebut(): string {

        return $this->date_debut;

    }

    public function getDateFin(): string {

        return $this->date_fin;

    }

    public function getStatus():string{

            return $this->status;
    }

    public function getClient():User{

            return $this->client;
    }

    public function getCategorie()
    {
        return $this->categorie;
    }

    public function getTags(): array
    {
        return $this->tags;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setCategorie(Categorie $categorie): void
    {
        $this->categorie = $categorie;
    }

    public function setTags(array $tags): void
    {
        $this->tags = $tags;
    }

    public function setStatus($status):void
    {
        $this->status=$status;
    }

    public function setClient($client):void
    {
        $this->client=$client;
    }

    public function setDateDebut($date_debut):void
    {
        $this->date_debut=$date_debut;
    }

    public function setDateFin($date_fin):void
    {
        $this->date_debut=$date_fin;
    }

    public function setBudget($budget):void
    {
        $this->budget=$budget;

    }

    public function create(){

    $cat = $this->categorie->searchByName($this->categorie->getName());
    $client= $this->getClient()->getId();

        $query="insert into projets (titre,description,budget,date_debut,date_fin,categorie_id,client_id,status)
                values (:titre, :description, :budget, :date_debut , :date_fin ,:categorie_id,:client_id , :status)";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(':titre',$this->titre);
        $stmt->bindParam(':description',$this->description);
        $stmt->bindParam(':budget',$this->budget);
        $stmt->bindParam(':date_debut',$this->date_debut);
        $stmt->bindParam(':date_fin',$this->date_fin);
        $stmt->bindParam(':categorie_id',$cat->getId());
        $stmt->bindParam(':client_id',$client);
       if($stmt->execute()) {
         
        $id=Database::getInstance()->getConnection()->lastInsertId();

        foreach($this->tags as $tag){
            $tagId = $tag->getId();

            $sql= "insert into projets_tags (projet_id , tag_id) values (:projet_id , :tag_id)";
            $stmt=Database::getInstance()->getConnection()->prepare($sql);
            $stmt->bindParam(':project_id',$id);
            $stmt->bindParam(':tag_id',$tagId);
            

        }

       }

       return true;
    }

    public function getAll(){
        $query="select p.* , u.nom , u.prenom , c.name  from projets p join users u on p.client_id = u.id join categories c on p.categorie_id = c.id";
        $stmt=Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();
        $projets = $stmt->fetchAll(PDO::FETCH_CLASS, Projet::class);
        foreach ($projets as $projet):
            $sql = "select t.* from tags t join projets_tags pt on t.id = pt.tag_id where pt.projet_id=:id";
            $stmt=Database::getInstance()->getConnection()->prepare($sql);
            $stmt->bindParam(':id',$projet->id);
            $stmt->execute();
            $projet->tags = $stmt->fetchAll(PDO::FETCH_CLASS, Tag::class);
        
        endforeach;
        // var_dump($projets);
        // die;
        return $projets;
        
    }


public function getMyProjets($id){

    $query = "select p.* , u.nom ,u.prenom , c.name  from projets p join users u on p.client_id = u.id join categories c on p.categorie_id = c.id where u.id = :id ";
    $stmt = Database::getInstance()->getConnection()->prepare($query);
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    $projets=$stmt->fetchAll(PDO::FETCH_CLASS, Projet::class);

    foreach($projets as $projet){
        $sql = "select t.* from tags t join projets_tags pt on t.id = pt.tag_id where pt.projet_id = :id";
        $stmt = Database::getInstance()->getConnection()->prepare($sql);
        $stmt->bindParam(':id',$projet->id);
        $stmt->execute();
        $tag=$stmt->fetchAll(PDO::FETCH_CLASS , Tag::class);
        $projet->tags =$tag ;
     
    }
    // var_dump($projets[3]->tags);
    // die();
    return $projets;
}


public function delete($id)
{
    $query = 'delete from projets where id = :id';
    $stmt = Database::getInstance()->getConnection()->prepare($query);
    $stmt->bindParam('id' , $id);
    return $stmt->execute();
}


// public function getPostulerProjet($id)
// {
//     $query = "select p.* , cat.name as catName , u.nom from projets p join poropositions prs  on p.id = prs.projet_id join categories c on c.id = p.categorie_id join users u on p.client_id = u.id where prs.freelancer_id =: id";
//     $stmt = Database::getInstance()->getConnection()->prepare($query);
//     $stmt->bindParam(':id',$id);
//     $stmt->execute();
//     $result = $stmt->fetchAll(PDO::FETCH_CLASS , Projet::class);

//     return $result;
// }

























}