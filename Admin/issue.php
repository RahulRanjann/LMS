<?php
  include "Connection.php";
  include "nv.php";
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
    <title>Issue_Books</title>
    </head>
    <body>
        
    <div id="">
  <div class="">
    <h3 style="text-align: center;">Information of Borrowed Books</h3><br>
    <?php
    $c=0;

      if(isset($_SESSION['username']))
      {
        $sql="SELECT student.username,reg_no,books.b_id,b_name,authors,edition,issue,issue_book.d_return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.b_id=books.b_id WHERE issue_book.approve ='yes' ORDER BY issue_book.d_return ASC";
        
        $res=mysqli_query($conn,$sql);
        
        
        echo "<table class='table table-bordered' style='width:100%;' >";
        //Table header

        echo "<thead style='background-color: #6db6b9e6;'>";
        echo "<tr style='background-color: #6db6b9e6;'>";
        echo "<th>"; echo "Username";  echo "</th>";
        echo "<th>"; echo "Reg.No.";  echo "</th>";
        echo "<th>"; echo "B_ID";  echo "</th>";
        echo "<th>"; echo "Book Name";  echo "</th>";
        echo "<th>"; echo "Authors Name";  echo "</th>";
        echo "<th>"; echo "Edition";  echo "</th>";
        echo "<th>"; echo "Issue Date";  echo "</th>";
        echo "<th>"; echo "Return Date";  echo "</th>";

      echo "</tr>"; 
      echo "</thead>";
      echo "<tbody>";
      while($row=mysqli_fetch_assoc($res))
      {
        $d=date("d-m-y");
        if($d > $row['d_return'])
        {
          $count=$count+1;
          $var='<p style="color:yellow; background-color:red;">EXPIRED</p>';

          mysqli_query($conn,"UPDATE issue_book SET approve='$var' where return='$row[return]' and approve='Yes' limit $count;");
          
          echo $d."</br>";
        }

        echo "<tr>";
          echo "<td>"; echo $row['username']; echo "</td>";
          echo "<td>"; echo $row['reg_no']; echo "</td>";
          echo "<td>"; echo $row['b_id']; echo "</td>";
          echo "<td>"; echo $row['b_name']; echo "</td>";
          echo "<td>"; echo $row['authors']; echo "</td>";
          echo "<td>"; echo $row['edition']; echo "</td>";
          echo "<td>"; echo $row['issue']; echo "</td>";
          echo "<td>"; echo $row['d_return']; echo "</td>";
        echo "</tr>";
      }
      echo "</tbody>";
    echo "</table>";
  
       
      }
      else
      {
        ?>
          <h3 style="text-align: center;">Login to see information of Borrowed Books</h3>
        <?php
      }
    ?>
  </div>
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