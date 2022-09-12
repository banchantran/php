 <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
     <div class="container">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php?controller=superadmin&action=index">Admin <span class="sr-only"></span></a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle <?php echo ($id['role_type']== 2) ? 'disabled' : ''?>" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
         <li style="margin-top: 5px; padding-left: 650px;" class="nav-item dropdown">
          <a href="index.php?controller=superadmin&action=logout">Log Out</a>
        </li>
      </ul>

    </div>
  </nav>  
</div>
 