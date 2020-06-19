<?php
require_once("models/author.php");
class AuthorController
{
    var $author_model;
    public function __construct()
    {
        $this->author_model = new author();
    }
    public function list()
    {
        $data = $this->author_model->All();
        require_once("Views/authors/list.php");
    }
    public function detail()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 1;
        $data = $this->author_model->find($id);
        require_once("Views/authors/detail.php");
    }
    public function add()
    {
        require_once("Views/authors/add.php");
    }
    public function store()
    {
        $data = array(
            'name' =>    $_POST['name'],
            'email'  =>   $_POST['email'],
            'password' => md5($_POST['password']),
            'status' => $_POST['status']
        );
        $this->author_model->store($data);
    }
    public function delete()
    {
        $id = $_GET['id'];
        $this->author_model->delete($id);
    }
    public function edit()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 1;
        $data = $this->author_model->find($id);
        require_once("Views/authors/edit.php");
    }
    public function update()
    {
        $data = array(
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => md5($_POST['password']),
            'status' => $_POST['status']
        );

        $this->author_model->update($data);
    }
}
