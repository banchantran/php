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
<div class="container-fluid form" style="padding: 20px">
  <div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
      <form action="index.php?controller=superadmin&action=update&id=<?php echo $admin['id'] ?>" method="POST" role="form" enctype="multipart/form-data">
        <legend>Edit Tài khoản Admin</legend>
        <!-- <div class="form-group">
          <label for="">ID </label>
          <input type="text" class="form-control" name="id">
        </div> -->
      <div class="form-group">
          <label for="">Tên: </label>
          <input type="text" class="form-control" name="name" value="<?php echo isset($admin) ? $admin['name'] : '' ?>">
        </div>
        <div class="form-group">
          <label for="">Mật khẩu: </label>
          <input type="password" class="form-control" name="password" value="<?php echo isset($admin) ? $admin['password'] : '' ?>">
        </div>
        
        <div class="form-group">
          <label for="">Avatar: </label>
          <input type="file" name="files" width="100%">
        </div>

        <div class="form-group">
          <label for="">Email: </label>
          <input type="email" class="form-control" name="email" value="<?php echo isset($admin) ? $admin['email']: '' ?>">
        </div>
        <div>
            <label>ROLE TYPE</label>
            <select name="role_type">
                <option value="1">Super admin</option>
                <option value="2">Admin</option>
            </select>
        </div>
         <button type="submit" name="update">Submit</button>
         <br>
          <a href="index.php?controller=superadmin&action=index">Back</a>
      </form>
    </div>
    <div class="col-lg-12"></div>
  </div>
</div>
</body>
</html>