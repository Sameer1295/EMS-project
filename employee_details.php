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
  <title>Bootstrap 4 Example</title>
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
            <div class="card-header">All Employees List</div>
              <table class="table">
                <tbody>
                <?php 
                $id = $_GET['e_id'];
                $sql = "SELECT * FROM employees_table WHERE e_id='$id'";
                $result =  mysqli_query($conn,$sql);

                if(mysqli_num_rows($result)>0){
                  while($employee = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Name</th>
                            <td><?php echo $employee['e_name'] ?></td>
                        </tr>
                        <tr>
                            <th scope="col">Email</th>
                            <td><?php echo $employee['e_email'] ?></td>
                        </tr>
                        <tr>
                            <th scope="col">Phone</th>
                            <td><?php echo $employee['e_phone'] ?></td>
                        </tr>
                        <tr>
                            <td>
                                <a style="padding:7px 21px;" class="btn btn-xs btn-warning" href="edit_employee.php?e_id=<?php echo $employee['e_id'] ?>">Edit</a>
                                <a class="btn btn-xs btn-danger" href="delete_employee.php?e_id=<?php echo $employee['e_id'] ?>">Delete</a>
                            </td>
                            <td></td>
                        </tr>
                    </thead>
                    <?php
                  }
                }
                else{
                  echo "No employee found";
                }
                
                ?>
                  
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
