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
    function delete($id)
    {
        $query =  "DELETE from authors where id=" . $id . "";

        $status = $this->conn->query($query);

        if ($status == true) {
            setcookie('msg', 'Xóa thành công', time() + 5);
        } else {
            setcookie('msg', 'Xóa không thành công', time() + 5);
        }
        header('Location: ?mod=author');
    }
    function update($id,$name,$email,$password,$status){

    $query = "UPDATE authors SET name = '".$name."', email = '".$email."', password = '".$password."', status = '".$status."'   WHERE id = ".$id;

    $result = $this->conn->query($query);
    
    if ($result== true) {
        setcookie('msg','Update mới thành công',time()+5);
        header('Location: ?mod=author');
    }else {
        setcookie('msg','Update vào không thành công',time()+5);
        header('Location: ?mod=author&act=edit?id='.$id);
    }
    }
}
