<?php
require_once("Models/connection.php");
class author
{
    var $conn;
    function __construct()
    {
        $conn_obj = new Connection();
        $this->conn = $conn_obj->conn;
    }
    function All()
    {
        $query = "select * from authors";
        $data = array();
        $resurt = $this->conn->query($query);
        while ($row = $resurt->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
    function find($id)
    {
        $query = "select * from authors where id =$id";
        return $this->conn->query($query)->fetch_assoc();
    }
    function store()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $status = $_POST['status'];
        $query = "INSERT INTO authors(name,email,password,status) VALUES ('" . $name . "','" . $email . "','" . $password . "'," . $status . ");";
        $status = $this->conn->query($query);   

        if ($status == true) {
            setcookie('msg', 'Thêm mới thành công', time() + 5);
            header('Location: ?mod=author&act=list');
        } else {
            setcookie('msg', 'Thêm vào không thành công', time() + 5);
            header('Location: ?mod=author&act=add');
        }
    }
}
