<?php 
   $uri = $_SERVER['REQUEST_URI'];     // /blog/admin/pages/admin/
   $array = explode('/', $uri);
   $key = array_search("pages", $array);
   $name = $array[$key + 1];
?>
<style>

</style>
<nav class="main-header navbar navbar-expand border-bottom navbar-dark bg-danger">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
      <a href="#" class="d-block"><b>ยินดีต้อนรับ : </b></a>
      </li>
    </ul>
</nav>
  <!-- /.navbar -->
<aside class="main-sidebar sidebar-dark-danger elevation-4">
    <!-- Brand Logo -->
   

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
      
          <li class="nav-header">Menu</li>
          <li class="nav-item">
            <a href="../user" class="nav-link <?php echo $name == 'user' ? 'active': '' ?>">
              <i class="far fa-address-card nav-icon"></i>
                <p>User Info</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../item" class="nav-link <?php echo $name == 'docx' ? 'active': '' ?>">
              <i class="fa fa-paperclip nav-icon"></i>
                <p>Docx Info</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../approve" class="nav-link <?php echo $name == 'approve' ? 'active': '' ?>">
              <i class="fa fa-check nav-icon"></i>
                <p>Approve Info</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../history" class="nav-link <?php echo $name == 'history' ? 'active': '' ?>">
              <i class="fa fa-history nav-icon"></i>
                <p>History Info</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../HR" class="nav-link <?php echo $name == 'HR' ? 'active': '' ?>">
            <i class="fab fa nav-icon"></i>
                <p>HR Info</p>
            </a>
          </li>

         
          <li class="nav-item">
            <a href="../line-notify" class="nav-link <?php echo $name == 'line-notify' ? 'active': '' ?>">
            <i class="fab fa-line nav-icon"></i>
                <p>Line Info</p>
            </a>
          </li>
        
          
          <li class="nav-header">Account</li>
          <li class="nav-item">
            <a href="../../logout.php" class="nav-link">
              <i class="fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
          

<!-- 
         
          <li class="nav-header">Menu</li>

          <li class="nav-item">
            <a href="../approve" class="nav-link <?php echo $name == 'approve' ? 'active': '' ?>">
              <i class="fa fa-check nav-icon"></i>
                <p>Approve Info</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../line-notify" class="nav-link <?php echo $name == 'line-notify' ? 'active': '' ?>">
            <i class="fab fa-line nav-icon"></i>
                <p>Line Info</p>
            </a>
          </li>
          
          <li class="nav-header">Account</li>
          <li class="nav-item">
            <a href="../../logout.php" class="nav-link">
              <i class="fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
           -->



        
          <!-- <li class="nav-header">Menu</li>

          <li class="nav-item">
            <a href="../item" class="nav-link <?php echo $name == 'item' ? 'active': '' ?>">
              <i class="fa fa-paperclip nav-icon"></i>
                <p>Item Info</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../history" class="nav-link <?php echo $name == 'history' ? 'active': '' ?>">
              <i class="fa fa-history nav-icon"></i>
                <p>History Info</p>
            </a>
          </li>


          <li class="nav-header">Account</li>
          <li class="nav-item">
            <a href="../../logout.php" class="nav-link">
              <i class="fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
           -->

        </ul>
      </nav>





    </div>
    <!-- /.sidebar -->
</aside>