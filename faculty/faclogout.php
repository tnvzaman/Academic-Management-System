<?php
    include('connection.php'); 

    session_destroy();

    header("location:".SITEURL."faclogin.php");
    
?>