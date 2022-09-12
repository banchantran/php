 
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
   <?php include('nav.php'); ?>
   <br>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">


        <div class="card-header">Tài khoản tìm kiếm <form class="form-inline my-2 my-lg-0" action='index.php?controller=superadmin&action=search' method="POST">
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
              <?php 
              if ($admin == null) {
                echo 'Không tìm thấy';
              }else{
                foreach ($admin as $row) { ?>
                  <td><?php echo $row['id']?></td>
                  <td><?php echo $row['name']?></td>
                  <td><?php echo $row['password']?></td>
                  <td><?php echo $row['email'] ?></td>
                  <td><img src="<?php echo $row['avatar']?>" height="150" width="100"/> </td>
                  <td><?php if($row['role_type']==1)
                  {
                    echo "SuperAdmin";
                  }else{
                    echo "Admin";
                  }
                  ?>
                </td>
                <tr>
                <?php } } ?> 
              </thead>


            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>