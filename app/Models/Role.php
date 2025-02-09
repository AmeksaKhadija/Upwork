<?php
namespace app\Models;
use app\Config\Database;
class Role
{
    private int $id=0;
    private string $role_name;
    private string $description="";
    
    public function __construct(){}

    public function __call($name, $arguments)
    {
        if($name == "construct")
        {
            if(count($arguments) == 1)
            {
                $this->role_name = $arguments[0];
            }
            if(count($arguments) == 2)
            {
                $this->role_name=$arguments[0];
                $this->description=$arguments[1];
            }
            
        }
    }

    public static function instanceWithRolename(string $role_name){
        $instance = new self();
        
        $instance->role_name=$role_name;
        return $instance;
    }

    public function setId(int $id)
    {
        $this->id=$id;
    }

    public function setRoleName(string $role_name)
    {
        $this->role_name=$role_name;
    }

    public function setDescription(string $role_description)
    {
    $this->description=$role_description;
    }


    public function getId():int
    {
        return $this->id;
    }

    public function getRoleNAme():string
    {
        return $this->role_name;
    }

    public function getDescription():string
    {
        return $this->description;
    }


    public function __toString()
    {
        return "(role) => id : " .$this->id. " , name : " .$this->role_name. " , description : " .$this->description." .";
    }



    public function create(){


        $query="insert into roles (role_name,description) values (:role_name,:description) ";
        $stmt= Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(':role_name',$this->role_name);
        $stmt->bindParam(':description',$this->description);
        $stmt->execute();

        return  $this->setId(Database::getInstance()
        ->getConnection()
        ->lastInsertId());
    }




    public function findByName($name)
    {
        //  $fid=$this->getName();
        $query="select id ,role_name,description from roles where role_name=:name";
        $stmt=Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(':name',$name );
        $stmt->execute();

       $result=$stmt->fetchObject(__CLASS__);
    return $result;
    
      
    }

    public function findById($id)
    {
        //  $fid=$this->getName();
        $query="select id ,role_name,description   from roles where id=:id";
        $stmt=Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->execute();

       $result=$stmt->fetchObject(__CLASS__);
        return $result;

    }

}