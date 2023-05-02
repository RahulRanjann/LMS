<?php
  include "connection.php";
  include "nv.php";
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
    <title>RequestBook</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

    <div id="">
        <div class="">
            <br>
            <h3 style="text-align: center;">Approve Request</h3><br>
            <h5 style="text-align: center;"><b>Username: </b><?php echo $_SESSION['request_username'];?> || <b>Book Id: </b><?php echo $_SESSION['request_book_id']?></h5>
            <br>

            <form class="Approve" action="" method="post">
                <!-- <input class="form-control" type="" name="approve" placeholder="Yes or No" required=""> -->

                <input type="text" name="approve" placeholder="yes/no" required=""
                    class="form-control"><br>
                <input type="date" name="issue" placeholder="Issue Date dd-mm-yyyy" required=""
                    class="form-control"><br>

                <input type="date" name="return" placeholder="Return Date dd-mm-yyyy" required=""
                    class="form-control"><br>

                <button class="btn btn-default" type="submit" name="submit">Approve</button>
            </form>

        </div>
    </div>

    <?php

    
  if(isset($_POST['submit']))
  
  {
    //mysqli_query($conn,"UPDATE  issue_book SET  approve =  '$_POST['approve']', issue =  '$_POST['issue']', d_return =  '$_POST['return']' WHERE username='$_SESSION['request_username']' AND b_id='$_SESSION['request_book_id]';");

    mysqli_query($conn,"UPDATE issue_book SET approve = '$_POST[approve]', issue = '$_POST[issue]', d_return = '$_POST[return]' WHERE username='".$_SESSION['request_username']."' AND b_id='".$_SESSION['request_book_id']."'");

    mysqli_query($conn,"UPDATE books SET quantity = quantity-1 where b_id='$_SESSION[request_book_id]' ;");

    $res=mysqli_query($conn,"SELECT quantity from books where b_id='$_SESSION[request_book_id]'");

    while($row=mysqli_fetch_assoc($res))
    {
      if($row['quantity']==0)
      {
        mysqli_query($conn,"UPDATE books SET status='not-available' where b_id='$_SESSION[request_book_id]';");
      }
    }
    ?>
    <script type="text/javascript">
    alert("Updated successfully.");
    window.location = "request.php"
    </script>
    <?php
  }
?>

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