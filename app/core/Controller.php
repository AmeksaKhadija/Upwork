<?php 
namespace app\core;

class Controller
{

protected function render($view , $data=[]){

    extract($data);

    include "../app/Views/$view.php";
    // include '../app/Views/aside.php' ;
}




}