<?php 
namespace app\Models;
use app\Config\Database;



class Categorie{





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