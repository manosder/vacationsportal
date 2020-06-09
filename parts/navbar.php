<nav class="navbar navbar-default sticky-top">
  <a href="index" ><?= $_SESSION['username']; ?>'s Home Page</a>
  <div class="dropdown">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    User Actions
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="messages"><i class="fa fa-fw fa-envelope"></i>Messages</a>
      <h5 class="dropdown-header">User Actions</h5>
      <?php 
          if($_SESSION['is_admin'] == 0)  
          {?>
              <a class="dropdown-item" href="create_application"><i style="font-size:24px" class="fa fa-plus"></i> Request</a>
          <?php
          }else{?>
              <a class="dropdown-item" href="create_user"><i style="font-size:24px" class="fa fa-plus"></i> Add User</a>
          <?php
          }

      ?>
      <a class="dropdown-item" href="logout"><i style="font-size:24px" class="fa">&#xf08b;</i>Logout</a>
    </div>
  </div>
</nav>
