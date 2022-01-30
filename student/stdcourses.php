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
        <div id="adviseBox">
        <table id="routine">
                <tr>
                    <th>Course Code</th>
                    <th>Course Title </th>
                    <th>Section</th>
                    <th>Course Instructor</th>
                    <th>Credit Taken</th>
                    <th>Course Credit</th>
                    <th>Seat</th>
                </tr>
                <?php
                    $email=$_SESSION['user'];
                    $sql="SELECT * FROM student WHERE email='$email'";
                    $quer=mysqli_query($conn,$sql);
                    if($quer==TRUE)
                    {
                        $arr=mysqli_fetch_assoc($quer);
                        $id=$arr['std_id'];
                        $sql="SELECT * FROM std_courses WHERE std_id='$id'";
                        $crslist=mysqli_query($conn,$sql); 
                        if($crslist==TRUE)
                        {
                            $count=mysqli_num_rows($crslist);
                            if($count>0)
                            {
                                while($rows=mysqli_fetch_assoc($crslist))
                                {
                                    $code=$rows['code'];
                                    $sec=$rows['section'];

                                    $sql="SELECT * FROM courses WHERE crs_cd='$code' AND crs_sec='$sec'";
                                    $data=mysqli_query($conn,$sql);
                                    if($data==TRUE)
                                    {
                                        $rows=mysqli_fetch_assoc($data);
                                        $title=$rows['crs_title'];
                                        $instr=$rows['crs_instr'];
                                        $credit=$rows['crs_credit'];
                                        $seat=$rows['seat'];
                                        
                                        ?>
                                        <tr>
                                            <td><?php echo $code?></td>
                                            <td><?php echo $title?></td>
                                            <td><?php echo $sec?></td>
                                            <td><?php echo $instr?></td>
                                            <td><?php echo $credit?></td>
                                            <td><?php echo $credit?></td>
                                            <td><?php echo $seat?></td>
                                            
                                        </tr>
                                        <?php
                                    }
                                    
                                }
                            }
                        }
                    }
                    ?>
                    

            </table>
        </div>
    </body>