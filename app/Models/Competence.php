<?php
namespace app\Models;
use Exception;
use PDO;
use app\Config\Database;
use app\Models\Role;



class Competence
{
    private int $id ;
    private string $nom;
    private string $description;
    private string $level;


    public function __construct(){}


    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setNom(string $nom)
    {
        $this->nom = $nom;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function setLevel(string $level)
    {
        $this->level = $level;
    }

    public function getId(): int
    {
        return  $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getLevel(): string
    {
        return $this->level;
    }


         
    
  public function create(){
    $query = 'insert into competences (nom , description ,level) VALUES (?, ?, ?)';
    $stmt = Database::getInstance()->getConnection()->prepare($query);
    $stmt->execute([$this->nom, $this->description , $this->level]);
    if($stmt){
        return true;
    }
}

    public function getAll(){
        $query = "select id, nom , description , level FROM competences ";
        $stmt =  Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS , Competence::class);
       return $result;
    
    }



    public function delete($deleteid) {
        $query = "delete from competences where id= :id";
        $stmt =  Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(':id',$deleteid);
        $result = $stmt->execute();
        return $result;
    }



    public function update(){

        $upid=$this->id;
        $upname = $this->nom;
        $updescription = $this->description;
        $uplevel = $this->level;
        $query = "update competences set nom = ? , description = ?, level = ? where id= ?";
        $stmt =  Database::getInstance()->getConnection()->prepare($query);
        $result=  $stmt->execute([$upname ,$updescription,$upid, $uplevel]);
        if($result){
            return true;
        }
    }
}


