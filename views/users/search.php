<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
  <div class="container">
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
       <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php?controller=superadmin&action=index">Admin <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Quản lý Admin
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="index.php?controller=superadmin&action=create&id=<?php echo isset($_SESSION['id'])? $ad : $ad->id ?>">Thêm Tk Admin</a>

              </div>

          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Quản lý user
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
           <!--  <a class="dropdown-item" href="../view/quanlyUser/create.php">Thêm User</a> -->
          <!--  <a class="dropdown-item" href="">Liệt kê User</a> -->
       </div>

   </li>
   <li style="margin-top: 5px; padding-left: 20px;" class="nav-item dropdown">
    <a href="index.php?controller=superadmin&action=logout">Đăng xuất</a>
</li>
</ul>

</div>
</nav>    
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">


      <div class="card-header">Tài khoản tìm kiếm <form class="form-inline my-2 my-lg-0" action='index.php?controller=users&action=search' method="POST">
  <input class="form-control mr-sm-2" type="search" placeholder="Nhập Email" aria-label="Search" name="email">
  <input class="form-control mr-sm-2" type="search" placeholder="Nhập họ tên" aria-label="Search" name="name">
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
</form></div>

      <div class="card-body">
        <table class="table table-striped ">
          <thead class="thead-dark">
            <tr>
              <th scope="col">STT </th>
              <th scope="col">Họ Tên</th>
              <th scope="col">Mật khẩu</th>
              <th scope="col">Email</th>
              <th scope="col">Avata</th>
              <th scope="col">Loại TK</th>
          </tr>
      </thead>
      <tbody>
         <?php foreach ($users as $item) { ?>

            <td><?php echo $item->id ?></td>
            <td><?php echo $item->name ?></td>
            <td><?php echo $item->password ?></td>
            <td><?php echo $item->email ?></td>
            <td><?php echo "<img src= '$item->avatar'>" ?></td>
            <td><?php echo $item->role_type ?></td>
        </tr>
    <?php } ?>  
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</body>
</html>