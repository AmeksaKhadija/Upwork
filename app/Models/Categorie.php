<?php 
namespace app\Models;
use app\Config\Database;
use PDO;


class Categorie{

    private int $id ;
    private string $name;
    private string $description="";

    public function __construct(){}


    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function getId(): int
    {
        return  $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }



    public function create(){

        $query = "insert into categories (name , description) VALUES ( ?,?)";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $result= $stmt->execute( [$this->name, $this->description]);
        return $result;

   }


    public function getAll(){
        $query = "select id , name , description FROM categories ";
        $stmt =  Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS , Categorie::class);
        if($result){
            return $result;
        }

       }


       public function delete($deleteid) {
        $query = "delete from categories where id= :id";
        $stmt =  Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(':id',$deleteid);
        $result = $stmt->execute();
        return $result;
     }

    public function getById($id){
        $query = "select id, name , description FROM  categories where id= ? ";
        $stmt =  Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute([$id]);
        $result = $stmt->fetchObject(Categorie::class);
        if ($result) {
            return $result;
        }
     }


    public function searchByName($searchTerm) {
        $query = "select id, name , description FROM  categories where name like ? ";
        $stmt =  Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute(["%$searchTerm%"]);
        $result = $stmt->fetchObject(Categorie::class);
        if ($result) {
            return $result;
        }
     }
}