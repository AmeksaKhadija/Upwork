<?php
namespace app\Models;

class Proposition
{
private int $id;
private string $description;
private float $amount;
private Projet $projet;
private User $freelancer;
private string $status;
private string $date_debut;
private string $date_fin;

public function __construct(){}

public function getId(){
    return $this->id;
}

public function getDescription(){
    return $this->description;
}

public function getAmount(){
    return $this->amount;
}

public function getProject(){
    return $this->projet;
}

public function getFreelancer(){
    return $this->freelancer;
}

public function getStatus(){
    return $this->status;
}

public function getDateDebut(){
    return $this->date_debut;
}

public function getDatefin(){
    return $this->date_fin;
}

public function setId($id){
 $this->id =$id;
}

public function setAmount($amount){
    $this->amount = $amount;
}

public function setDescription($description){
    $this->description=$description;
}

public function setProjet($projet){
    $this->projet = $projet;
}

public function setFreelancer($freelancer){
    $this->freelancer=$freelancer;
}



}