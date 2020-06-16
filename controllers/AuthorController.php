<?php 
    require_once("models/author.php");
    class AuthorController{
        var $author_model;
        function __construct()
        {
            $this->author_model = new author();
        }
        function list(){
            $data = $this->author_model->All();
            require_once("Views/authors/list.php");
        }
        function detail(){
            $id = isset($_GET['id'])?$_GET['id']:1;
            $data = $this->author_model->find($id);
            require_once("Views/authors/detail.php");
        }
        function add(){
            require_once("Views/authors/add.php");
        }
        function store(){
            $this->author_model->store();
        }
    }

?>