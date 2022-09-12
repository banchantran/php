 
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
  
  <br>
  <?php include('nav.php');?>
  <br>
  <br>  
  <div class="container">
  <div class="row justify-content-center" >
    <div class="col-md-10" >
      <div class="card">
        <div class="card-header">List Admin <form class="form-inline my-2 my-lg-0" action='index.php?controller=superadmin&action=search' method="POST">
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
                <th scope="col">Password</th>
                <th scope="col">Email</th>
                <th scope="col">Avata</th>
                <th scope="col">Role Type</th>
                <th scope="col">Status</th>
                <th scope="col">Manager</th>

              </tr>
            </thead>
            <tbody>
              <tr>
                <?php foreach ($admin as $row) { ?>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['password']?></td>
                <td><?php echo $row['email'] ?></td>
                <td><img src="<?php echo $row['avatar']?>" height="150" width="100"/> </td>
                <td><?php echo($row['role_type']==ROLE_TYPE_SUPER) ? 'Superadmin':'Admin';?></td>
                <td><?php echo($row['del_flag']==DELETE_OFF) ? 'Active':'Delete';?></td>
                <!--   <td><img src="" height="150" width="100"></td> -->
                <td>
                  <a href="index.php?controller=superadmin&action=edit&id=<?php echo $row['id'] ?>" class="btn btn-primary <?php echo ($id['role_type']== 2) ? 'disabled' : ''?>">Edit</a>
                  <a onclick="return confirm('Are you sure ?');" href="index.php?controller=superadmin&action=delete&id=<?php echo $row['id'] ?>" class="btn btn-danger <?php echo ($id['role_type']==ROLE_TYPE_ADMIN) ? 'disabled' : ''?>">Delete</a> 
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
</div>
</body>
</html>