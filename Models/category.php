<?php
require_once("connection.php");
class Category
{
    var $conn;
    function __construct()
    {
        $conn_obj = new Connection();
        $this->conn = $conn_obj->conn;
    }

    function All()
    {
        $query = "select * from categories";
        $data = array();
        $resurt = $this->conn->query($query);
        while ($row = $resurt->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    function store()
    {
        $title = $_POST['title'];
        $descripition = $_POST['descripition'];
        $query = "INSERT INTO categories(title,descripition) VALUES ('" . $title . "','" . $descripition . "');";
        $resurt = $this->conn->query($query);

        if ($resurt == true) {
            setcookie('msg', 'Thêm mới thành công', time() + 5);
            header('Location:?mod=category&act=add');
        } else {
            setcookie('msg', 'Thêm vào không thành công', time() + 5);
            header('Location: ?mod=category&act=add');
        }
    }
    function find($id)
    {
        $query = "select * from categories where id  =$id";

        return $this->conn->query($query)->fetch_assoc();
    }
    function delete($id)
    {
        $query = "DELETE from categories where id=$id";


        $status = $this->conn->query($query);
        if ($status == true) {
            setcookie('msg', 'Xóa thành công', time() + 5);
        } else {
            setcookie('msg', 'Xóa không thành công', time() + 5);
        }
        header('Location: ?mod=category&act=list');
    }
    function update($id, $title, $descripition)
    {
        $query = "UPDATE categories  SET title = '".$title."', descripition= '".$descripition." 'WHERE id = ".$id;
        $resurt = $this->conn->query($query);

        if ($resurt == true) {
            setcookie('msg', 'Update mới thành công', time() + 5);
            header('Location:?mod=category');
        } else {
            setcookie('msg', 'Thêm vào không thành công', time() + 5);
            header('Location: ?mod=category&act=edit&id='.$id);
        }
    }
}
