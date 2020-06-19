<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Zent Education</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="container">
    <h2 align="center">Categories</h2>
    <a href="?mod=categories&act=add" type="button" class="btn btn-primary">Thêm mới</a>
    <a href="?mod=authors&act=list" type="button" class="btn btn-primary">Về trang Author</a>
    <?php if (isset($_COOKIE['msg'])) { ?>
      <div class="alert alert-success">
        <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
      </div>
    <?php } ?>
    <table class="table">
      <thead>
        <tr>
          <th>Title</th>
          <th>Description</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data as $row) { ?>
          <tr>
            <td><?= $row['title'] ?></td>
            <td><?= $row['descripition'] ?></td>
            <td>
              <a href="?mod=categories&act=detail&id=<?= $row['id'] ?>" class="btn btn-success">Detail</a>
              <a href="?mod=categories&act=edit&id=<?= $row['id'] ?>" class="btn btn-warning">Update</a>
              <a href="?mod=categories&act=delete&id=<?= $row['id'] ?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button" class="btn btn-danger">Xóa</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>

</html>