<?php 
namespace app\core;

class Controller
{

protected function render($view , $data=[]){

    extract($data);
   // include '../app/Views/aside.php' ;
    include "../app/Views/$view.php";
}




}