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
            <h1>Courses</h1>
            <form action="" method="POST">
                    <table>
                        <tr>
                            <td>Course Code: </td>
                            <td><input type="text" name="course_code" ></td>
                            
                        </tr>
                        <tr>
                            <td>Course Title: </td>
                            <td><input type="text" name="course_title" ></td>
                        </tr>
                        <tr>
                            <td>Section: </td>
                            <td><input type="text" name="section" ></td>
                        </tr>
                        <tr>
                            <td>Instructor: </td>
                            <td><input type="text" name="instructor" ></td>
                        </tr>
                        <tr>
                            <td>Credit: </td>
                            <td><input type="text" name="credit" ></td>
                        </tr>
                        <tr>
                            <td>Seat: </td>
                            <td><input type="text" name="seat" ></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="submit" value="Add Course" class="btn-add"></td>
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
            
            <div id="Add2stdBox">
            <form action="" method="POST"> 
                    <table>
                        <tr>
                            <td>Student ID: </td>
                            <td><input type="text" name="stdID"></td>
                        </tr>
                        <tr>
                            <td>Course Code: </td>
                            <td><input type="text" name="code4std"></td>
                        </tr>
                        <tr>
                            <td>Section: </td>
                            <td><input type="text" name="section4std"></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="submit4std" value="Advise Course" class="btn-add"></td>
                        </tr>
                    </table>
                    <?php
                        if(isset($_SESSION['addcrs']))
                        {
                            echo $_SESSION['addcrs'];
                            unset($_SESSION['addcrs']);
                        }
                    ?>
                    
            </form>
        
            </div>
            <table>
                <tr>
                    <th>Serial No.</th>
                    <th>Course Code</th>
                    <th>Course Title</th>
                    <th>Section</th>
                    <th>Instructor</th>
                    <th>Credit</th>
                    <th>Seat</th>
                </tr>
                <?php
                    $sql="SELECT * FROM courses";
                    $crslist=mysqli_query($conn, $sql);
                    
                    if($crslist==TRUE)
                    {
                        $count=mysqli_num_rows($crslist);

                        if($count>0)
                        {
                            $inc=1;
                            while($rows=mysqli_fetch_assoc($crslist))
                            {
                                $crs_code=$rows['crs_cd'];
                                $course_title=$rows['crs_title'];
                                $section=$rows['crs_sec'];
                                $instr=$rows['crs_instr'];
                                $credit=$rows['crs_credit'];
                                $seat=$rows['seat'];

                                

                                ?>
                                <tr>
                                <td><?php echo $inc?> </td>
                                <td><?php echo $crs_code?></td>
                                <td><?php echo $course_title?></td>
                                <td><?php echo $section?></td> 
                                <td><?php echo $instr?></td>
                                <td><?php echo $credit?></td>
                                <td><?php echo $seat?></td>
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
                    $code=$_POST['course_code'];
                    $title=$_POST['course_title'];
                    $sec=$_POST['section'];
                    $instr=$_POST['instructor'];
                    $cred=$_POST['credit'];
                    $seat=$_POST['seat'];

                    $sql= "INSERT INTO courses SET crs_cd='$code', crs_title='$title', crs_sec='$sec', crs_instr='$instr', crs_credit='$cred', seat='$seat' ";

                    $add=mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    if($add==TRUE)
                    {
                        $_SESSION['add']="Course Added Successfully";
                        echo("<script>location.href = '".SITEURL."courses.php';</script>");
                        
                    }
                    else{
                        $_SESSION['add'] = "Failed to add Course";
                        echo("<script>location.href = '".SITEURL."courses.php';</script>");
                        
                    }

                }

                if(isset($_POST['submit4std']))
                {
                    $id=$_POST['stdID'];
                    $code4Std=$_POST['code4std'];
                    $section4Std=$_POST['section4std'];
                    
                    $sql="INSERT INTO std_courses SET std_id='$id', code='$code4Std', section='$section4Std'";

                    $addcrs=mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    if($addcrs==TRUE)
                    {
                        $_SESSION['addcrs']="Advised Successfully";
                        echo("<script>location.href = '".SITEURL."courses.php';</script>");
                    }
                    
                    else{
                        $_SESSION['addcrs'] = "Failed to advise";
                        echo("<script>location.href = '".SITEURL."courses.php';</script>");
                    }
                    
                }
            ?>
            
        </div>
    </body>
</html>