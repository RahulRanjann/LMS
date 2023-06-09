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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <title>Books</title>
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
        <div>
            <a href="add.php"style=" text-decoration: none;">
                <button style="background-color: #6db6b9e6; display: inline; " type="submit" name="add"
                    class="btn btn-default">
                    <span class="bi bi-bag-plus-fill">Add Book</span></button>
            </a>
            <a href="delete.php"style=" text-decoration: none;">
                <button style="background-color: #6db6b9e6;  display: inline;" type="submit" name="delete"
                    class="btn btn-default">
                    <span class="bi bi-trash-fill">Delete Book</span></button>
            </a>
            <a href="issue.php"style=" text-decoration: none;">
                <button style="background-color: #6db6b9e6;  display: inline;" type="submit" name="issue"
                    class="btn btn-default">
                    <span class="bi bi-file-earmark-check">Issue Book</span></button>
            </a>
            <a href="request.php"style=" text-decoration: none;">
                <button style="background-color: #6db6b9e6;  display: inline;" type="submit" name="request"
                    class="btn btn-default">
                    <span class="bi bi-layout-text-sidebar">Request Book</span></button>
            </a>
            <a href="expire.php"style=" text-decoration: none;">
                <button style="background-color: #6db6b9e6;  display: inline;" type="submit" name="request"
                    class="btn btn-default">
                    <span class="bi bi-exclamation-diamond">Expired Book</span></button>
            </a>
        </div>
        <div class="srch">
            <form class="navbar-form" method="post" name="form1">

                <input class="form-control" type="text" name="search" placeholder="search books.." required=""
                    style="margin-right: 10px;">
                <button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
                    <span class="bi bi-search"></span>
                </button>
            </form>
        </div>
        <?php
    

            if(isset($_POST['submit']))
            {
                $q=mysqli_query($conn,"SELECT * from books where b_name like '%$_POST[search]%' ");
    
                if(mysqli_num_rows($q)==0)
                {
                    echo "Sorry! No book found. Try searching again.";
                }
                else
                {
            echo "<table class='table table-bordered table-hover' >";
                echo "<tr style='background-color: #6db6b9e6;'>";
                    //Table header
                    echo "<th>"; echo "ID";	echo "</th>";
                    echo "<th>"; echo "Book-Name";  echo "</th>";
                    echo "<th>"; echo "Authors Name";  echo "</th>";
                    echo "<th>"; echo "Edition";  echo "</th>";
                    echo "<th>"; echo "Status";  echo "</th>";
                    echo "<th>"; echo "Quantity";  echo "</th>";
                    echo "<th>"; echo "Department";  echo "</th>";
                echo "</tr>";	
    
                while($row=mysqli_fetch_assoc($q))
                {
                    echo "<tr>";
                    echo "<td>"; echo $row['b_id']; echo "</td>";
                    echo "<td>"; echo $row['b_name']; echo "</td>";
                    echo "<td>"; echo $row['authors']; echo "</td>";
                    echo "<td>"; echo $row['edition']; echo "</td>";
                    echo "<td>"; echo $row['status']; echo "</td>";
                    echo "<td>"; echo $row['quantity']; echo "</td>";
                    echo "<td>"; echo $row['department']; echo "</td>";
    
                    echo "</tr>";
                }
            echo "</table>";
                }
            }
    ?>



        <h2>List of Books</h2>
        <table class='table table-bordered table table-hover'>
            <thead class='top'>
                <tr>
                    <th>ID</th>
                    <th>Book-Name</th>
                    <th>Authors Name</th>
                    <th>Edition</th>
                    <th>Status</th>
                    <th>Quantity</th>
                    <th>Department</th>
                </tr>
            </thead>
            <tbody>
                <?php
    $res=mysqli_query($conn,"SELECT * FROM `books` ORDER BY `books`.`b_name` ASC;");
    while($row=mysqli_fetch_assoc($res)){
        echo '<tr><td>' . $row['b_id'] . '</td>
        <td>' . $row['b_name']. '</td>
        <td>' . $row['authors']. '</td>
        <td>' . $row['edition']. '</td>
        <td>' . $row['status']. '</td>
        <td>' . $row['quantity']. '</td>
        <td>' . $row['department']. '</td>
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

   
</body>

</html>