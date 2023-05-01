<?php
  include "connection.php";
  $conn=Opencon();
?>

<!DOCTYPE html>
<html>

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
    <title>add</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">


</head>

<body>
<?php
    include "nv.php";
?>

    <div style="margin-right: 222px;margin-left: 222px;">

        <div class="" style="color: white; margin-left: 60px; font-size: 20px;"style="text-align: center;">
            <h2 style="color:black; font-family: Lucida Console; text-align: center"><b>Add New Books</b></h2>

            <form class="book" action="" method="post">

                <input type="text" name="name" class="form-control" placeholder="Book Name" required=""><br>
                <input type="text" name="authors" class="form-control" placeholder="Authors Name" required=""><br>
                <input type="text" name="edition" class="form-control" placeholder="Edition" required=""><br>
                <input type="text" name="status" class="form-control" placeholder="Status" required=""><br>
                <input type="text" name="quantity" class="form-control" placeholder="Quantity" required=""><br>
                <input type="text" name="department" class="form-control" placeholder="Department" required=""><br>
                

                <button style="text-align: center; hover: color=white; width= 300px; height: 50px; background-color: #5CA4FF;" class="btn btn-default" type="submit" name="submit">ADD</button>
            </form>
        </div>
        <?php
    if(isset($_POST['submit']))
    {

      if(isset($_SESSION['email']))
      {
        mysqli_query($conn,"INSERT INTO books (b_name,authors,status,edition,quantity,department) VALUES ( '$_POST[name]', '$_POST[authors]',  '$_POST[status]', '$_POST[edition]','$_POST[quantity]', '$_POST[department]') ;");
        ?>
        <script type="text/javascript">
        alert("Book Added Successfully.");
        window.location = "Book.php";
        </script>
        <?php
        exit();
      }
      else
      {
        ?>
        <script type="text/javascript">
        alert("You need to login first.");
        </script>
        <?php
      }
    }
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