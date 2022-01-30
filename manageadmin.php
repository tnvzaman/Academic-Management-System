<?php include('menufac.php'); ?>
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
        
        <div id="facBox">
            <h1>Manage Faculties</h1>
            <form action="" method="POST">
                    <table>
                        <tr>
                            <td>Full Name: </td>
                            <td><input type="text" name="full_name" required></td>
                            
                        </tr>
                        <tr>
                            <td>Faculty ID: </td>
                            <td><input type="text" name="FacID" required></td>
                        </tr>
                        <tr>
                            <td>Email: </td>
                            <td><input type="text" name="email" required></td>
                        </tr>
                        <tr>
                            <td>Password: </td>
                            <td><input type="password" name="pass" required></td>
                        </tr>
                        <tr>
                            <td>Department: </td>
                            <td><input type="text" name="department" required></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="submit" value="Add Faculty" class="btn-add"></td>
                        </tr>
                    </table>
                    <?php
                        if(isset($_SESSION['add']))
                        {
                            echo $_SESSION['add'];
                            unset($_SESSION['add']);
                        }
                    ?>
                </form>
            <table>
                <tr>
                    <th>Serial No.</th>
                    <th>Full Name</th>
                    <th>Faculty ID</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Actions</th>
                </tr>
                <?php
                    $sql="SELECT * FROM adminl";
                    $faclist=mysqli_query($conn, $sql);
                    
                    if($faclist==TRUE)
                    {
                        $count=mysqli_num_rows($faclist);

                        if($count>0)
                        {
                            $inc=1;
                            while($rows=mysqli_fetch_assoc($faclist))
                            {
                                $full_name=$rows['fullname'];
                                $id=$rows['id'];
                                $email=$rows['email'];
                                $dept=$rows['department'];
                                ?>
                                <tr>
                                    <td><?php echo $inc?></td>
                                    <td><?php echo $full_name?></td>
                                    <td><?php echo $id?></td> 
                                    <td><?php echo $email?></td>
                                    <td><?php echo $dept?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>deletefac.php?id=<?php echo $id; ?>"><button class="delFac">Delete Admin</button></a>
                                    </br>
                                    <?php
                                        if(isset($_SESSION['delfac']))
                                        {
                                            echo $_SESSION['delfac'];
                                            unset($_SESSION['delfac']);
                                        }
                                    ?>
                                    </td>   
                                </tr> 
                                <?php
                                $inc++;
                            }
                        }
                        else
                        {

                        }
                    }
                ?>
                      
            </table>
            <?php
                if(isset($_POST['submit']))
                {
                    $name=$_POST['full_name'];
                    $facID=$_POST['FacID'];
                    $email=$_POST['email'];
                    $pass=md5($_POST['pass']);
                    $dep=$_POST['department'];

                    $sql= "INSERT INTO adminl SET id='$facID', fullname='$name', department='$dep', email='$email', password='$pass' ";

                    $add=mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    if($add==TRUE)
                    {
                        $_SESSION['add']="Faculty Added Successfully";
                        echo("<script>location.href = '".SITEURL."manageadmin.php';</script>");
                    }
                    else{
                        $_SESSION['add'] = "Failed to add Faculty";
                        echo("<script>location.href = '".SITEURL."manageadmin.php';</script>");
                    }

                }
            ?>
            
        </div>
    </body>
</html>