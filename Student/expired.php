<?php
  include "connection.php";
  include "nv.php";
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
    <title>Request_Books</title>

</head>

<body>

    <div style>

        <a href="Book.php" style=" text-decoration: none;">
            <button style="background-color: #6db6b9e6;  display: inline;" type="submit" name="request"
                class="btn btn-default">
                <span class="bi bi-journals"> Book</span></button>
        </a>

        <a href="request.php" style=" text-decoration: none;">
            <button style="background-color: #6db6b9e6;  display: inline;" type="submit" name="request"
                class="btn btn-default">
                <span class="bi bi-layout-text-sidebar">BookRequest</span></button>
        </a>
        <a href="issue_info.php" style=" text-decoration: none;">
            <button style="background-color: #6db6b9e6;  display: inline;" type="submit" name="request"
                class="btn btn-default">
                <span class="bi bi-info-square-fill">issueInformation</span></button>
        </a>

        <a href="expired.php" style=" text-decoration: none;">
            <button style="background-color: #6db6b9e6;  display: inline;" type="submit" name="request"
                class="btn btn-default">
                <span class="bi bi-clipboard-x-fill">ExpiredList</span></button>
        </a>

    </div>
    <div>


        <?php
	if(isset($_SESSION['login_user']))
		{
			$q=mysqli_query($conn,"SELECT * from issue_book where username='$_SESSION[login_user]' and approve='' ;");

			if(mysqli_num_rows($q)==0)
			{
				echo "There's no pending request";
			}
			else
			{
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				
				echo "<th>"; echo "Book-ID";  echo "</th>";
				echo "<th>"; echo "Approve Status";  echo "</th>";
				echo "<th>"; echo "Issue Date";  echo "</th>";
				echo "<th>"; echo "Return Date";  echo "</th>";
				
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['approve']; echo "</td>";
				echo "<td>"; echo $row['issue']; echo "</td>";
				echo "<td>"; echo $row['return']; echo "</td>";
				
				echo "</tr>";
			}
		echo "</table>";
			}
		}
		else
		{
			echo "</br></br></br>"; 
			echo "<h2><b>";
			echo " Please login first to see the request information.";
			echo "</b></h2>";
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