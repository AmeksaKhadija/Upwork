<?php 
namespace app\core;

class Controller
{

protected function render($view){

    include "../app/Views/$view.php";
}




}