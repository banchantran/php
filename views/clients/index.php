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

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php?controller=clients&action=index">My profile <span class="sr-only"></span></a>
         </li>
         <li style="margin-top: 5px; padding-left: 850px;" class="nav-item dropdown">
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

     <div class="card-body">
       <table class="table table-responsive">
         <tbody>
            <p>ID: </p>
            <p>Name: </p>
            <p>Avatar: </p>
            <p>Email: </p>
         </tbody>
      </table>
   </div>
</div>
</div>
</div>
</div>
</body>
</html>