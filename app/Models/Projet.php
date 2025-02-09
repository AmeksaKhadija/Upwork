<?php
namespace app\Models;

use app\Models\Categorie;
class Projet
{
private int  $id;
private string $titre ;
private string $description;
private float $budget;
private $date_debut ;
private $date_fin ;
private Categorie $categorie;
private User $client;
private string $status;


public function __construct(){}


public function getId(): int
{
    return $this->id;

}















}