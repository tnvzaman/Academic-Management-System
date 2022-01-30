<?php include('menustd.php'); ?>
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
        <div id="gradeBox">
        <table>
                <tr>
                    <th>Semester</th>
                    <th>Course Code</th>
                    <th>grade</th>
                    <th>grade points</th>
                    
                </tr>
                <?php
                    $email=$_SESSION['user'];
                    $sql="SELECT * FROM student WHERE email='$email'";
                    $quer=mysqli_query($conn,$sql);
                    $totalgr=0.0;
                    $grcount=1;
                    if($quer==TRUE)
                    {
                        $arr=mysqli_fetch_assoc($quer);
                        $id=$arr['std_id'];
                        $sql="SELECT * FROM grade WHERE std_id='$id'";
                        $crslist=mysqli_query($conn,$sql); 
                        if($crslist==TRUE)
                        {
                            
                            $count=mysqli_num_rows($crslist);
                            if($count>0)
                            {
                                while($rows=mysqli_fetch_assoc($crslist))
                                {
                                    $code=$rows['crs_cd'];
                                    $sem=$rows['semester'];
                                    $grade=$rows['grade'];
                                    $gradep=$rows['gradepoint'];
                                    $totalgr+=$gradep;
                                    ?>
                                        <tr>
                                            <td><?php echo $sem?></td>
                                            <td><?php echo $code?></td>
                                            <td><?php echo $grade?></td>
                                            <td><?php echo $gradep?></td>
                                            
                                            
                                        </tr>
                                        <?php
                                    
                                    $grcount++;
                                }
                            }
                        }
                    }
                    $cgpa=$totalgr/$grcount;
                    ?>
                    <tr>
                        <td></td>
                        <td>Total</td>
                        <td></td>
                        <td><?php echo $totalgr?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>CGPA</td>
                        <td></td>
                        <td><?php echo $cgpa?></td>
                    </tr>
                    

            </table>
        </div>
    </body>