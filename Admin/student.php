<?php
  include "Connection.php";
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <title>Student-Info</title>
    <style type="text/css">
    .srch .navbar-form {
        padding-left: 1000px;
        display: flex;

    }

    body {
        font-family: "Lato", sans-serif;
        transition: background-color .5s;
    }

    .sidenav {
        height: 100%;
        margin-top: 50px;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #222;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .sidenav a:hover {
        color: white;
    }

    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    #main {
        transition: margin-left .5s;
        padding: 16px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {
            font-size: 18px;
        }
    }

    .img-circle {
        margin-left: 20px;
    }

    .h:hover {
        color: white;
        width: 300px;
        height: 50px;
        background-color: #00544c;
    }
    </style>
</head>

<body>
    <?php include "nv.php" ?>


    <section class="p-3">

        <div class="srch">
            <form class="navbar-form" method="post" name="form1">

                <input class="form-control" type="text" name="search" placeholder="search Student.." required=""
                    style="margin-right: 10px;">
                <button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
                    <span class="bi bi-search"></span>
                </button>
            </form>
        </div>

        <!-- <div class="srch">
            <form class="navbar-form" method="post" name="form1">
                <input class="form-control" type="text" name="bid" placeholder="Enter Book ID" required="" required=""
                    style="margin-right: 10px;">
                <button style="background-color: #6db6b9e6;" type="submit" name="submit1"
                    class="btn btn-default">Request
                </button>
            </form>
        </div> -->

        <?php
            if(isset($_POST['submit']))
            {
                $q=mysqli_query($conn,"SELECT reg_no,username,email FROM `student` where username like '%$_POST[search]%' ");
    
                if(mysqli_num_rows($q)==0)
                {
                    echo "Sorry! No Student found. Try searching again.";

                    ?>
                        <script>
                            $(document).ready(function() {
                                $('#result_table').remove();
                            });
                        </script>
                    <?php
                }
                else
                {
                echo "<table id='result_table' class='table table-bordered table-hover' >";
                echo "<tr style='background-color: #6db6b9e6;'>";
                    //Table header
                    echo "<th>"; echo "Reg.No.";	echo "</th>";
                    echo "<th>"; echo "Student-Name";  echo "</th>";
                    echo "<th>"; echo "Email";  echo "</th>";
                    echo "</tr>";
    
                while($row=mysqli_fetch_assoc($q))
                {
                    echo "<tr>";
                    echo "<td>"; echo $row['reg_no']; echo "</td>";
                    echo "<td>"; echo $row['username']; echo "</td>";
                    echo "<td>"; echo $row['email']; echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                }
                
            }
    ?>




        <h2>List of Student</h2>
        <table class='table table-bordered table table-hover'>
            <thead class='top'>
                <tr>
                    <th>Reg.No.</th>
                    <th>Student-Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
    $res=mysqli_query($conn,"SELECT reg_no, username,email FROM `student`ACS ORDER by username;");
    while($row=mysqli_fetch_assoc($res)){
        echo '<tr>
        <td>' . $row['reg_no']. '</td>
        <td>' . $row['username']. '</td>
        <td>' . $row['email']. '</td>
        </tr>';
    }
    ?>
            </tbody>
        </table>
    </section>

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

    <!-- script links -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="./vendor/typed/typed.min.js"></script>
    <script type="text/javascript" src="vanilla-tilt.js"></script>
</body>

</html>