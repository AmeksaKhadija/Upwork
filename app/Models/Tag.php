<?php
namespace app\Models;
use Exception;
use PDO;
use app\Config\Database;
use app\Models\Role;



class Tag
{
    private int $id ;
    private string $name;
    private string $description;
    private string $logo;


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

    public function setLogo(string $logo)
    {
        $this->logo = $logo;
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

    public function getLogo(): string
    {
        return $this->logo;
    }


         
    
  public function create(){
    $query = 'insert into tags (name , description ,logo) VALUES (? ,  ?)';
    $stmt = Database::getInstance()->getConnection()->prepare($query);
    $stmt->execute([$this->name, $this->description , $this->logo]);
    if($stmt){
        return true;
    }
}

    public function getAll(){
        $query = "select id, name , description , logo FROM tags ";
        $stmt =  Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS , Tag::class);
       return $result;
    
    }



    public function delete($deleteid) {
        $query = "delete from tags where id= :id";
        $stmt =  Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(':id',$deleteid);
        $result = $stmt->execute();
        return $result;
    }



    public function update(){

        $upid=$this->id;
        $upname = $this->name;
        $updescription = $this->description;
        $query = "update tags set name = ? , description = ? where id= ?";
        $stmt =  Database::getInstance()->getConnection()->prepare($query);
        $result=  $stmt->execute([$upname ,$updescription,$upid ]);
        if($result){
            return true;
        }


    }
     







}


