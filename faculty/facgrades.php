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
            <h1>Submit Grades</h1>
            <form action="" method="POST">
                    <table>
                        <tr>
                            <td>Semester: </td>
                            <td><input type="text" name="semester" required></td>
                            
                        </tr>
                        <tr>
                            <td>Student ID: </td>
                            <td><input type="text" name="studentID" required></td>
                        </tr>
                        <tr>
                            <td>Course Code: </td>
                            <td><input type="text" name="crs_code" required></td>
                        </tr>
                        <tr>
                            <td>grade: </td>
                            <td><input type="text" name="grade" required></td>
                        </tr>
                        <tr>
                            <td>grade point: </td>
                            <td><input type="text" name="gradep" required></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="submit" value="Submit Grade" class="btn-add"></td>
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
            
            <?php
                if(isset($_POST['submit']))
                {
                    $sem=$_POST['semester'];
                    $id=$_POST['studentID'];
                    $code=$_POST['crs_code'];
                    $grade=$_POST['grade'];
                    $gradep=$_POST['gradep'];
                    

                    $sql= "INSERT INTO grade SET semester='$sem', std_id='$id', crs_cd='$code', grade='$grade', gradepoint='$gradep' ";

                    $add=mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    if($add==TRUE)
                    {
                        $_SESSION['add']="Grade Submitted Successfully";
                        echo("<script>location.href = '".SITEURL."facgrades.php';</script>");
                    }
                    else{
                        $_SESSION['add'] = "Failed to submit grades";
                        echo("<script>location.href = '".SITEURL."facgrades.php';</script>");
                    }

                }
            ?>
            
        </div>
    </body>
</html>