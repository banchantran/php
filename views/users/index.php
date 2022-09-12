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
    <br>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
     <div class="container">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php?controller=superadmin&action=index">Admin <span class="sr-only"></span></a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle <?php $ad['id']== 1 ? 'disabled' : ''?>" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Quản lý Admin
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="index.php?controller=superadmin&action=create">Thêm Tk Admin</a>

            </div>

          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Quản lý user
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
             <!--  <a class="dropdown-item" href="../view/quanlyUser/create.php">Thêm User</a> -->
             <a class="dropdown-item" href="index.php?controller=users&action=index">Liệt kê User</a>
           </div>

         </li>
         <li style="margin-top: 5px; padding-left: 20px;" class="nav-item dropdown">
          <a href="index.php?controller=superadmin&action=logout">Đăng xuất</a>
        </li>
      </ul>

    </div>
  </nav>  
  <br>
  <br>  
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">Danh sách Users <form class="form-inline my-2 my-lg-0" action='index.php?controller=superadmin&action=search' method="POST">
          <input class="form-control mr-sm-2" type="search" placeholder="Nhập Email" aria-label="Search" name="email">
          <input class="form-control mr-sm-2" type="search" placeholder="Nhập họ tên" aria-label="Search" name="name">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
        </form></div>
        <div class="card-body">
          <table class="table table-responsive">
            <thead class="thead-dark">
              <tr>
                <th scope="col">STT </th>
                <th scope="col">Name</th>
                <th scope="col">Facebook_id</th>
                <th scope="col">Password</th>
                <th scope="col">Email</th>
                <th scope="col">Avata</th>
                <th scope="col">Status</th>
                <th scope="col">Trạng thái TK</th>
                <th scope="col">Mannager</th>

              </tr>
            </thead>
            <tbody>
              <tr>
               <?php foreach ($users as $row) { ?>

                <td><?php echo $row['id']?></td>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['facebook_id']?></td>
                <td><?php echo $row['password']?></td>
                <td><?php echo $row['email'] ?></td>
                <td><img src="<?php echo $row['avatar']?>" height="150" width="100"/> </td>
                <td><?php echo($row['status']==1) ? 'Active':'Banner';?></td>
                <td><?php echo($row['del_flag']==0) ? 'Active':'Delete';?></td>
                <td>
                  <a href="index.php?controller=users&action=edit&id=<?php echo $row['id'] ?>" class="btn btn-primary ">Edit</a>
                  <a onclick="return confirm('Are you sure ?');" href="index.php?controller=users&action=delete&id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a> 
                </td>
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