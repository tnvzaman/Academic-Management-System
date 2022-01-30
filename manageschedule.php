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
        
        <div id="schedBox">
            <h1>Manage Schedule</h1>
            <form action="" method="POST">
                    <table>
                        <tr>
                            <td>Course Code: </td>
                            <td><input type="text" name="crs_code" required></td>
                            
                        </tr>
                        <tr>
                            <td>Course Section: </td>
                            <td><input type="text" name="section" required></td>
                        </tr>
                        <tr>
                            <td>time: </td>
                            <td><input type="time" name="time" required></td>
                        </tr>
                        <tr>
                            <td>sunday </td>
                            <td><input type="text" name="sunday" ></td>
                        </tr>
                        <tr>
                            <td>monday </td>
                            <td><input type="text" name="monday" ></td>
                        </tr>
                        <tr>
                            <td>tuesday </td>
                            <td><input type="text" name="tuesday" ></td>
                        </tr>
                        <tr>
                            <td>wednesday </td>
                            <td><input type="text" name="wednesday" ></td>
                        </tr>
                        <tr>
                            <td>thursday </td>
                            <td><input type="text" name="thursday" ></td>
                        </tr>
                        <tr>
                            <td>friday </td>
                            <td><input type="text" name="friday" ></td>
                        </tr>
                        <tr>
                            <td>saturday </td>
                            <td><input type="text" name="saturday" ></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="submit" value="Submit" class="btn-add"></td>
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
                    <th>Course Code</th>
                    <th>Section /th>
                    <th>Time</th>
                    <th>Sunday</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Saturday</th>
                </tr>
                <?php
                    $sql="SELECT * FROM schedule";
                    $schedule=mysqli_query($conn, $sql);
                    
                    if($schedule==TRUE)
                    {
                        $count=mysqli_num_rows($schedule);

                        if($count>0)
                        {
                            $inc=1;
                            while($rows=mysqli_fetch_assoc($schedule))
                            {
                                $code=$rows['crs_cd'];
                                $sec=$rows['crs_sec'];
                                $time=$rows['time'];
                                $sun=$rows['sunday'];
                                $mon=$rows['monday'];
                                $tue=$rows['tuesday'];
                                $wed=$rows['wednesday'];
                                $thur=$rows['thursday'];
                                $fri=$rows['friday'];
                                $sat=$rows['saturday'];
                                

                                ?>
                                <tr>
                                <td><?php echo $inc?> </td>
                                <td><?php echo $code?></td>
                                <td><?php echo $sec?></td> 
                                <td><?php echo $time?></td>
                                <td><?php echo $sun?></td>
                                <td><?php echo $mon?></td>
                                <td><?php echo $tue?></td>
                                <td><?php echo $wed?></td>
                                <td><?php echo $thur?></td>
                                <td><?php echo $fri?></td>
                                <td><?php echo $sat?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>deletestud.php?id=<?php echo $id; ?>"><button class="delFac">Delete </button></a>
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
                    $code=$_POST['crs_code'];
                    $sec=$_POST['section'];
                    $time=$_POST['time'];
                    $sun=$_POST['sunday'];
                    $mon=$_POST['monday'];
                    $tue=$_POST['tuesday'];
                    $wed=$_POST['wednesday'];
                    $thur=$_POST['thursday'];
                    $fri=$_POST['friday'];
                    $sat=$_POST['saturday'];

                    $sql= "INSERT INTO schedule SET crs_cd='$code', crs_sec='$sec', time='$time', sunday='$sun', monday='$mon', tuesday='$tue', wednesday='$wed', thursday='$thur', friday='$fri', saturday='$sat' ";

                    $add=mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    if($add==TRUE)
                    {
                        $_SESSION['add']="Schedule Added Successfully";
                        echo("<script>location.href = '".SITEURL."manageschedule.php';</script>");
                    }
                    else{
                        $_SESSION['add'] = "Failed to add Schedule";
                        echo("<script>location.href = '".SITEURL."manageschedule.php';</script>");
                    }

                }
            ?>
            
        </div>
    </body>
</html>