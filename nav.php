<?php 
require 'conn.php'; 
//session_start();
if(!$_SESSION['u_username']){
    header("Location :index.php");
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="dash.php">Welcome <strong><?php echo $_SESSION['u_username']; ?></strong></a>
      <a href="logout.php">Logout</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
            <li class="nav-item"></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
