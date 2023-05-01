<?php 
    include "nv.php";
	include "connection.php";
    $conn=Opencon();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/book-stack.svg" sizes="70x70">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <title>Profile</title>
    <style type="text/css">
    .wrapper {
        width: 300px;
        margin: 0 auto;
        color: white;
    }
    </style>
</head>

<body>

    <form action="" method="post">
        <button class="btn btn-default" style="float: right; width: 70px;" name="submit1" type="submit">Edit</button>
    </form>
    <div class="wrapper">
        <?php

 			if(isset($_POST['submit1']))
 			{
 				?>
        <script type="text/javascript">
        window.location = "edit.php"
        </script>
        <?php
 			}
 				$q=mysqli_query($conn,"SELECT * FROM student where username='$_SESSION[username]' ;");
                 $row = mysqli_fetch_assoc($q);
 			?>
        <h2 style="text-align: center; color: #000000;">My Profile</h2>

        <div style="text-align: center; color: #000000;"> <b>Welcome, </b>
            <h4>
                <?php echo $_SESSION['username']; ?>
            </h4>
        </div>
        <?php
 				echo "<b>";
 				echo "<table class='table table-bordered'>";
	 	
	 				echo "<tr>";
	 					echo "<td>";echo "<b>Student Name: </b>";echo "</td>";
                        echo "<td>";echo $row['username'];echo "</td>";
	 				echo "</tr>";
                  
                    
	 				echo "<tr>";
                        echo "<td>";echo "<b> Reg.No.: </b>";echo "</td>";
                        echo "<td>";echo $row['reg_no'];echo "</td>";
                    echo "</tr>";
	 				
	 				echo "<tr>";
	 					echo "<td>";echo "<b> Email: </b>";	echo "</td>";
	 					echo "<td>";echo $row['email'];echo "</td>";
	 				echo "</tr>";

                    echo "<tr>";
                        echo "<td>";echo "<b> Password: </b>";echo "</td>";
                        echo "<td>";echo $row['password'];echo "</td>";
                    echo "</tr>";
		
 				echo "</table>";
 				echo "</b>";
 			?>
    </div>

    <footer class=" text-light py-3">
        <div class="container text-center">
            <p>&copy; 2023 RahulRanjan. All rights reserved. | Library Management System | Manipal
                Institute of
                Technology</p>
            <a href="#">Terms of Use</a>
            <span class="mx-2 text-light">|</span>
            <a href="#">Privacy Policy</a>
        </div>
    </footer>

   
</body>

</html>