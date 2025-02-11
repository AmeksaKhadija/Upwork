<?php

namespace app\Controllers;

use app\core\Controller;
use app\Models\Tag;

class TagsController extends Controller
{
    private Tag $tagModel;


    public function __construct()
    {
        $this->tagModel = new Tag();
    }


    public function getAll()
    {
        $tags = $this->tagModel->getAll();
        $role = $_SESSION["role"];
        $this->render('Dashboard',['tags'=>$tags]);
    }








}