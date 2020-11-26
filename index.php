<?php 
session_start();
require 'conn.php'; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 4 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

  <body>

    <div class="container">
    <form action="" method="POST">
        <div class="form-group">
            <label for="pwd">Username:</label>
            <input type="text" class="form-control" placeholder="Enter Username" name="u_username" id="uname">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" placeholder="Enter password" name="u_password" id="pwd">
        </div>
        <button type="submit" class="btn btn-primary" name="u_signin">Sign In</button>
        <a href="register.php">Register</a>
    </form>
    </div> <!-- /container -->
    <?php 
        if(isset($_POST['u_signin'])){
            $u_username = $_POST['u_username'];
            $u_password = md5($_POST['u_password']);

            $sql = "SELECT * FROM user_table where u_username = '$u_username' ";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) > 0){
                while($user = mysqli_fetch_assoc($result)){
                    if($u_username == $user['u_username'] && $u_password == $user['u_password']){
                        $_SESSION['u_username'] = $u_username;
                        header("Location: dash.php");
                    }  
                    else{
                        echo "Incorrect Username or password!";
                    }
                }
            }
            else{
                echo "Please register..";
            }

        }
    ?>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
