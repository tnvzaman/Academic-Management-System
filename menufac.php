<?php include('connection.php'); 
      include('faculty/faclogcheck.php');  
?>
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
        <div class="menu">
            <div class="wrapper">
                <ul>
                    <li><a href="./manageadmin.php">Manage Faculties</a></li>
                    <li><a href="./managestuds.php">Manage Students</a></li>
                    <li><a href="./courses.php">Courses</a></li>
                    <li><a href="./manageschedule.php">Manage Schedule</a></li>
                    <li><a href="./facgrades.php">Submit Grades</a></li>
                    <li><a href="faclogin.php">Log Out</a></li>
                </ul>
            </div>
        </div>
    </body>
</html>
