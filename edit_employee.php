<?php 
session_start();
if(!$_SESSION['u_username']){
    header("Location :index.php");
}
require 'conn.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

  <body>
    <?php require('nav.php'); ?>  
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3">
          <div class="card" style="width: 18rem;">
            <div class="card-header">Employees</div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><a href="dash.php">Show All Employees</a></li>
              <li class="list-group-item"><a href="add_new_employees.php">Add New Employee</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-9 col-md-9">
          <div class="card">
            <div class="card-header">Edit Employee details</div>
              <div class="card-body">
                <form action="" method="POST">
                    <?php 
                    $id = $_GET['e_id'];
                    $sql = "SELECT * FROM employees_table WHERE e_id='$id'";
                    $result =  mysqli_query($conn,$sql);

                    if(mysqli_num_rows($result)>0){
                    while($employee = mysqli_fetch_assoc($result)){
                        ?>
                    <div class="form-group">
                        <input type="text" class="form-control" name="e_name" placeholder="Employee Name" value="<?php echo $employee['e_name'] ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="e_email" placeholder="Email address" value="<?php echo $employee['e_email'] ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-control" name="e_phone" placeholder="Phone number" value="<?php echo $employee['e_phone'] ?>" required>
                    </div>
                    <button type="submit" class="btn btn-success" name="e_edit">Edit Details</button>
                    <?php
                  }
                }
                else{
                  echo "No employee found";
                }
                
                ?>
                </form>
                <?php 
                    if(isset($_POST['e_edit'])){
                        $e_name = $_POST['e_name'];
                        $e_email = $_POST['e_email'];
                        $e_phone = $_POST['e_phone'];
                        $sql = "UPDATE employees_table SET e_name='$e_name',e_email='$e_email',e_phone='$e_phone' WHERE e_id='$id' ";
                        if(mysqli_query($conn,$sql)){
                            ?>
                            <script>
                            alert('Record updated..');
                            window.location.replace("dash.php");
                            </script>
                            <?php
                        }
                        else{
                            echo "Error :".$sql."<br>".mysqli_error($conn);
                        }
                    }
                    else{

                    }                
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
