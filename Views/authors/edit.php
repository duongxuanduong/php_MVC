<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Zent - Education And Technology Group</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
    <h3 align="center">Zent - Education And Technology Group</h3>
    <h3 align="center">Add Edit Authors</h3>
    <a href="?mod=authors" type="button" class="btn btn-primary">Về trang chủ Authors - Admin</a>
    <hr>
        <?php if(isset($_COOKIE['msg'])) { ?>
            <div class="alert alert-warning">
                <strong>Thông báo</strong> <?=$_COOKIE['msg'] ?>
            </div>
        <?php } ?>
        <form action="?mod=authors&act=update" method="POST" role="form" enctype="multipart/form-data">
            <input type="hidden"  name="id" value="<?=$data['id'] ; ?>">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" id="" placeholder="" name="name" value="<?=$data['name'] ?>">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" id="" placeholder="" name="email" value="<?=$data['email'] ?>">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="Password" class="form-control" id="" placeholder="" name="password" value="<?=$data['password']?>">
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <input type="text" class="form-control" id="" placeholder="" name="status" value="<?=$data['status'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
</body>
</html>