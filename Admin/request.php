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
    <title>RequestBook</title>

</head>

<body>


    <div id="">
        <div class="">
            <div class="srch" style=" margin-left: 10px; margin-right: 50px;">
                <br>
                <form method="post" action="" name="form1">

                    <input class="form-control" type="text" name="username" placeholder="Username" required=""
                        style="margin-right: 10px;">
                    &nbsp;
                    <input class="form-control" type="text" name="bid" placeholder="BID" required=""
                        style="margin-right: 10px;">

                    <button style="background-color: #6db6b9e6;margin-top: 5px;" type="submit" name="submit"
                        class="btn btn-default">
                        <span class="bi bi-search"></span>Submit
                    </button>

                </form>
            </div>

            <h3 style="text-align: center;">Request of Book</h3>

            <?php
	
	if(isset($_SESSION['username']))
	{
		$sql= "SELECT student.username,reg_no,books.b_id,b_name,authors,edition,status FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.b_id=books.b_id WHERE issue_book.approve =''";
		$res= mysqli_query($conn,$sql);

		if(mysqli_num_rows($res)==0)
			{
				echo "<h2><b>";
				echo "There's no pending request.";
				echo "</h2></b>";
			}
		else
		{
			echo "<table class='table table-bordered' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				
				echo "<th>"; echo "Username";  echo "</th>";
				echo "<th>"; echo "Roll No";  echo "</th>";
				echo "<th>"; echo "BID";  echo "</th>";
				echo "<th>"; echo "Book Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				echo "<td>"; echo $row['username']; echo "</td>";
				echo "<td>"; echo $row['reg_no']; echo "</td>";
				echo "<td>"; echo $row['b_id']; echo "</td>";
				echo "<td>"; echo $row['b_name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				
				echo "</tr>";
			}
		echo "</table>";
		}
	}
	else
	{
		?>
            <br>
            <h4 style="text-align: center;color: yellow;">You need to login to see the request.</h4>

            <?php
	}

	if(isset($_POST['submit']))
	{
        //Querry for checking whethere username and book number are actully requested or matched or not

        //if matched and requested then go to next page ..
        //else send message that "book you are looking for is not in requested mode"
        $q = "SELECT * FROM issue_book WHERE username='" . $_POST['username'] . "' AND b_id='" . $_POST['bid'] . "' AND (approve='' OR approve='no')";
        $res = mysqli_query($conn,$q);
        if(mysqli_num_rows($res) > 0){
            $row = mysqli_fetch_assoc($res);
            
            $_SESSION['request_username']=$row['username'];
    		$_SESSION['request_book_id']=$row['b_id'];
            ?>
                <script type="text/javascript">
                window.location = "approve.php"
                </script>
            <?php
          
        }else{
            echo "alert('No Data Found')" ;   
        }
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