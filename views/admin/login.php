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
<div class="errorMes"></div>
<div class="container-fluid form" style="padding: 20px">
  <div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
      <form action="index.php?controller=superadmin&action=loginAdmin" method="POST" enctype="multipart/form-data" autocomplete="off">
        <legend>Login</legend>
        <div class="form-group">
          <label for="">Email: </label>
          <input type="email" class="form-control" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>" autocomplete="off">
         <p style="color:red;"> <?php echo isset($error['email_blank']) ? $error['email_blank'] : '' ?></p>
        </div>
        <div class="form-group">
          <label for="">Password: </label>
          <input type="password" class="form-control" name="password" value="<?php echo isset($_SESSION['password']) ? $_SESSION['password'] : '' ?>" autocomplete="off">
            <p style="color:red;"> <?php echo isset($error['password_blank']) ? $error['password_blank'] : '' ?></p>
        </div>
       <!--  <div class="form-group">
          <input type="text" class="form-control" id="email value="date("F d, Y h:i:s", $timestamp);">
        </div> -->
     <button type="submit" class="btn btn-primary" value="login" name="login">Submit</button>
        
      </form>
    </div>
  </div>
</div>
</body>
</html>