<?php
    include("./connection.php");

    $id=$_GET['id'];

    $sql="DELETE FROM adminl WHERE id=$id";

    $delfac=mysqli_query($conn,$sql);

    if($delfac==true)
    {
        $_SESSION['delfac']= "Faculty deleted Successfully";
        echo("<script>location.href = '".SITEURL."manageadmin.php';</script>");
    }
    else
    {
        $_SESSION['delfac']="Failed to delete Faculty";
        echo("<script>location.href = '".SITEURL."manageadmin.php';</script>");
    }
?>