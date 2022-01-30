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
            <h1>Manage Students</h1>
            <form action="" method="POST">
                    <table>
                        <tr>
                            <td>Full Name: </td>
                            <td><input type="text" name="full_name" required></td>
                            
                        </tr>
                        <tr>
                            <td>Student ID: </td>
                            <td><input type="text" name="stdID" required></td>
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
                            <td><input type="submit" name="submit" value="Add Student" class="btn-add"></td>
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
                    <th>Student ID</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Actions</th>
                </tr>
                <?php
                    $sql="SELECT * FROM student";
                    $faclist=mysqli_query($conn, $sql);
                    
                    if($faclist==TRUE)
                    {
                        $count=mysqli_num_rows($faclist);

                        if($count>0)
                        {
                            $inc=1;
                            while($rows=mysqli_fetch_assoc($faclist))
                            {
                                $full_name=$rows['name'];
                                $id=$rows['std_id'];
                                $email=$rows['email'];
                                $dept=$rows['department'];?>
                                <tr>
                                <td><?php echo $inc?></td>
                                <td><?php echo $full_name?></td>
                                <td><?php echo $id?></td> 
                                <td><?php echo $email?></td>
                                <td><?php echo $dept?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>deletestud.php?id=<?php echo $id; ?>"><button class="delFac">Delete Student</button></a>
                                    </br>
                                    <?php
                                        if(isset($_SESSION['delstud']))
                                        {
                                            echo $_SESSION['delstud'];
                                            unset($_SESSION['delstud']);
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
                    $stdID=$_POST['stdID'];
                    $email=$_POST['email'];
                    $pass=md5($_POST['pass']);
                    $dep=$_POST['department'];

                    $sql= "INSERT INTO student SET std_id='$stdID', name='$name', department='$dep', email='$email', password='$pass' ";

                    $add=mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    if($add==TRUE)
                    {
                        $_SESSION['add']="Student Added Successfully";
                        echo("<script>location.href = '".SITEURL."managestuds.php';</script>");
                    }
                    else{
                        $_SESSION['add'] = "Failed to add Student";
                        echo("<script>location.href = '".SITEURL."managestuds.php';</script>");
                    }

                }
            ?>
            
        </div>
    </body>
</html>