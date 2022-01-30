<?php

    if(!isset($_SESSION['user']))
    {
        $_SESSION['not-logged-in']="<div class='loginerror'>Please log in to check the site</div>";
        echo("<script>location.href = '".SITEURL."index.php';</script>");
    }
?>