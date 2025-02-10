<?php

namespace app\Models;

use Exception;
use PDO;
use app\Config\Database;
use app\Models\Role;


#[\AllowDynamicProperties]



class User
{

    private int $id;
    private string $nom;
    private string $prenom;
    private string $email;
    private string $password;
    private string $photo;
    private Role $role;
    private string $portfolio;
    private float $taux_horaire;


    public function __construct() {}

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function setPhoto(string $photo): void
    {
        $this->photo = $photo;
    }

    public function setRole(Role $role): void
    {
        $this->role = $role;
    }

    public function setTauxHoraire(float $taux_horaire): void
    {
        $this->taux_horaire = $taux_horaire;
    }
    public function setPortfolio(string $portfolio): void
    {
        $this->portfolio = $portfolio;
    }
    public function getId(): int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getPhoto(): string
    {
        return $this->photo;
    }


    public function getRole(): Role
    {
        return $this->role;
    }

    public function getTauxHoraire()
    {
        return $this->taux_horaire;
    }

    public function getPortfolio()
    {
        return $this->portfolio;
    }



    // public function __toString()
    // {
    //      return "(Utilisateur) => id : " . $this->id . " , nom : " . $this->nom . 
    //              " , prenom : " . $this->prenom ." , email : " . $this->email  . 
    //              " , password : " . $this->password ."." ;
    // }

    public function create()
    {
        $id = $this->role->getId();
        $query = "insert into users (nom,prenom,email,password,photo,taux_horaire , role_id,portfolio) values (:nom,:prenom,:email,:password,:photo,:taux_horaire,:role_id,:portfolio)";
        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(':nom', $this->nom);
        $stmt->bindParam(':prenom', $this->prenom);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':taux_horaire', $this->taux_horaire);
        $stmt->bindParam(':photo', $this->photo);
        $stmt->bindParam(':role_id', $id);
        $stmt->bindParam(':portfolio', $this->portfolio);

        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "delete from users where id= :id";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }



    public function findByEmail($email)
    {

        $query = "select id, nom,prenom ,email, password,role_id from users where email =:email";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetchObject(__CLASS__);
    }


    public function login($email, $password)
    {
        $result = $this->findByEmail($email);
        $role = new Role;
        $role = $role->findById($result->role_id);
        $result->setRole($role);


        if ($result && password_verify($password, $result->password)) {
            // var_dump($result);die();
            return $result;

        } else {
            return false;
        }
    }

    public function ShowProfile($user_id)
    {
        
        $query = "select id, nom,prenom ,email, password,role_id from users where id = :id";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(':id',$user_id);
        $stmt->execute();
        $result = $stmt->fetchObject(__CLASS__);
        // var_dump($result);die;
        return $result;
    }
}
