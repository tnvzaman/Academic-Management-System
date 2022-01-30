<?php include('connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compativle" content="ie=edge" />
        
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./webpage.css" />
    </head>
    <body>
        <div class="studlogin">
            <h1>Login</h1>
            <form action="" method="POST">
                Email:
                <br>
                <input type="text" name="email" >
                <br>
                Password:
                <br>
                <input type="password" name="password">
                <br>
                <input type="submit" name="submit" value="login" class="btn-add">
                <br>
                <?php
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                    if(isset($_SESSION['not-logged-in']))
                    {
                        echo $_SESSION['not-logged-in'];
                        unset($_SESSION['not-logged-in']);
                    }
                ?>
            </form>
            If you are a student, <a href="index.php" >log in here</a>
        </div>
        <?php
            
            if(isset($_POST["submit"]))
            {
                $email=$_POST["email"];
                $password=md5($_POST["password"]);

                $sql="SELECT * FROM adminl WHERE email='$email' AND password='$password'";

                $veri=mysqli_query($conn,$sql);

                $count= mysqli_num_rows($veri);

                if($count>0)
                {
                    $_SESSION['login']="Login Successful";
                    $_SESSION['user']=$email;
                    echo("<script>location.href = '".SITEURL."manageadmin.php';</script>");
                }
                else
                {
                    $_SESSION['login']="Email or Password Wrong, Try Again";
                    header("location:".SITEURL."faclogin.php");
                }
            }
        ?>
    </body>