<?php 
require('conn.php');
session_start();
session_unset();
session_destroy();
?>
    <script>
    alert('You are logged out');
    window.location.replace("index.php");
    </script>
    <?php
?>