<?php 
require('conn.php');
$id = $_GET['e_id'];
$sql = "DELETE FROM employees_table WHERE e_id='$id' ";
if(mysqli_query($conn,$sql)){
    ?>
    <script>
    alert('Record deleted successfully..');
    window.location.replace("dash.php");
    </script>
    <?php
}
else{
    echo "Error deleting record..".$sql."<br>".mysqli_error($conn);
}


?>