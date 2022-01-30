<?php
    include("./connection.php");

    $id=$_GET['id'];

    $sql="DELETE FROM student WHERE std_id=$id";

    $delstud=mysqli_query($conn,$sql);

    if($delstud==true)
    {
        $_SESSION['delstud']= "Student deleted Successfully";
        echo("<script>location.href = '".SITEURL."managestuds.php';</script>");
    }
    else
    {
        $_SESSION['delstud']="Failed to delete Student";
        echo("<script>location.href = '".SITEURL."managestuds.php';</script>");
    }
?>