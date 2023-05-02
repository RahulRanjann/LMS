<?php
include "connection.php";
include "nv.php";
$conn = Opencon();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
  <title>Book Request</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">


</head>

<body>


  <div id="">
    <div class="">

      <?php
      if (isset($_SESSION['username'])) {
        ?>

        <div style="float: left; padding: 25px;">
          <form method="post" action="">
            <button name="submit2" type="submit" class="btn btn-default"
              style="background-color: #06861a; color: yellow;">RETURNED</button>
            &nbsp&nbsp
            <button name="submit3" type="submit" class="btn btn-default"
              style="background-color: red; color: yellow;">EXPIRED</button>
          </form>
        </div>

        <div class="srch">
          <br>
          <form method="post" action="" name="form1">
            <input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
            <input type="text" name="bid" class="form-control" placeholder="BID" required=""><br>
            <button class="btn btn-default" name="submit" type="submit">Submit</button><br><br>
          </form>
        </div>
        <?php

        if (isset($_POST['submit'])) {

          $res = mysqli_query($conn, "SELECT * FROM issue_book where username='$_POST[username]' and b_id='$_POST[bid]' ;");

          while ($row = mysqli_fetch_assoc($res)) {
            $d = strtotime($row['d_return']);
            $c = strtotime(date("Y-m-d"));
            $diff = $c - $d;

            if ($diff >= 0) {
              $day = floor($diff / (60 * 60 * 24));
              $fine = $day * .10;
            }
          }
          $x = date("Y-m-d");
          mysqli_query($conn, "INSERT INTO `fine` VALUES ('$_POST[username]', '$_POST[bid]', '$x', '$day', '$fine','not paid') ;");


          $var1 = '<p style="color:yellow; background-color:green;">RETURNED</p>';
          mysqli_query($conn, "UPDATE issue_book SET approve='$var1' where username='$_POST[username]' and b_id='$_POST[bid]' ");

          mysqli_query($conn, "UPDATE books SET quantity = quantity+1 where b_id='$_POST[bid]' ");

        }
      }

      $c = 0;


      $ret = '<p style="color:yellow; background-color:green;">RETURNED</p>';
      $exp = '<p style="color:yellow; background-color:red;">EXPIRED</p>';

      if (isset($_POST['submit2'])) {

        $sql = "SELECT student.username,reg_no,books.b_id,b_name,authors,edition,approve,issue,issue_book . d_return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.b_id=books.b_id WHERE issue_book.approve ='$ret' ORDER BY issue_book.d_return DESC";
        $res = mysqli_query($conn, $sql);

      } else if (isset($_POST['submit3'])) {
        $sql = "SELECT student.username,reg_no,books.b_id,b_name,authors,edition,approve,issue,issue_book.d_return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.b_id=books.b_id WHERE issue_book.approve ='$exp' ORDER BY issue_book.d_return DESC";
        $res = mysqli_query($conn, $sql);
      } else {
        $sql = "SELECT student.username,reg_no,books.b_id,b_name,authors,edition,approve,issue,issue_book.d_return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.b_id=books.b_id WHERE issue_book.approve !='' and issue_book.approve !='Yes' ORDER BY issue_book.d_return DESC";
        $res = mysqli_query($conn, $sql);
      }

      echo "<table class='table table-bordered' style='width:100%;' >";
      echo "<thead>";
      echo "<tr style='background-color: #6db6b9e6;'>";
      echo "<th>Username</th>";
      echo "<th>Reg. No.</th>";
      echo "<th>BID</th>";
      echo "<th>Book Name</th>";
      echo "<th>Authors Name</th>";
      echo "<th>Edition</th>";
      echo "<th>Status</th>";
      echo "<th>Issue Date</th>";
      echo "<th>Return Date</th>";
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";
      while ($row = mysqli_fetch_assoc($res)) {
        echo "<tr>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['reg_no'] . "</td>";
        echo "<td>" . $row['b_id'] . "</td>";
        echo "<td>" . $row['b_name'] . "</td>";
        echo "<td>" . $row['authors'] . "</td>";
        echo "<td>" . $row['edition'] . "</td>";
        echo "<td>" . $row['approve'] . "</td>";
        echo "<td>" . $row['issue'] . "</td>";
        echo "<td>" . $row['d_return'] . "</td>";
        echo "</tr>";
      }
      echo "</tbody>";
      echo "</table>"; 

      ?>
    </div>
  </div>
</body>

</html>