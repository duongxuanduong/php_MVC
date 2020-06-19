<?php
$mod = isset($_GET['mod']) ? $_GET['mod'] : "categories";
$act = isset($_GET['act']) ? $_GET['act'] : "list";

switch ($mod) {
    case 'categories':
        require_once('controllers/CategoryController.php');
        $controller_obj = new CategoryController();
        switch ($act) {
            case 'list':
                $controller_obj->list();
                break;
            case 'add':
                $controller_obj->add();
                break;
            case 'store':
                $controller_obj->store();
                break;
            case 'detail':
                $controller_obj->detail();
                break;
            case 'delete':
                $controller_obj->delete();
                break;
            case 'edit':
                $controller_obj->edit();
                break;
            case 'update':
                $controller_obj->update();
                break;
            default:
                $controller_obj->list();
                break;
        }
        break;
    case 'authors':
        require_once('controllers/AuthorController.php');
        $controller_obj = new AuthorController();
        switch ($act) {
            case 'list':
                $controller_obj->list();
                break;
            case 'detail':
                $controller_obj->detail();
                break;
            case 'add':
                $controller_obj->add();
                break;
            case 'store':
                $controller_obj->store();
                break;
            case 'delete':
                $controller_obj->delete();
                break;
            case 'edit':
                $controller_obj->edit();
                break;
            case 'update':
                $controller_obj->update();
                break;
            default:
                $controller_obj->list();
                break;
        }
        break;
    case 'user':
        echo "Ban ban vao chuc nang quan ly nhân viên";
        # code...
        break;

    default:
        echo "Không tồn tại module";
        break;
}
