<?php
    include('connection.php'); 

    session_destroy();

    echo("<script>location.href = '".SITEURL."index.php';</script>");
    
?>
