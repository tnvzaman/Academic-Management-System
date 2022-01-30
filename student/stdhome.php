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
        <div id="stdBox">
            <h1>Class Schedule</h1>
            <table id="routine">
                <tr>
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
                                    $sql="SELECT * FROM schedule WHERE crs_cd='$code' AND crs_sec='$sec'";
                                    $data=mysqli_query($conn,$sql);
                                    if($data==TRUE)
                                    {
                                        $rout=mysqli_fetch_assoc($data);
                                        $time=$rout['time'];
                                        $sun=$rout['sunday'];
                                        $mon=$rout['monday'];
                                        $tue=$rout['tuesday'];
                                        $wed=$rout['wednesday'];
                                        $thur=$rout['thursday'];
                                        $fri=$rout['friday'];
                                        $sat=$rout['saturday'];
                                        ?>
                                        <tr>
                                            <td><?php echo $time?></td>
                                            <td><?php echo $sun?></td>
                                            <td><?php echo $mon?></td>
                                            <td><?php echo $tue?></td>
                                            <td><?php echo $wed?></td>
                                            <td><?php echo $thur?></td>
                                            <td><?php echo $fri?></td>
                                            <td><?php echo $sat?></td>
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
</html>