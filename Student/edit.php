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
    <link rel="icon" type="image/x-icon" href="assets/book-stack.svg" sizes="70x70">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
	<title>edit profile</title>
	<style type="text/css">
		.form-control
		{
			width:250px;
			height: 38px;
		}
		.form1
		{
			margin:0 540px;
		}
		label
		{
			color: white;
		}

	</style>
</head>
<body >

	<h2 style="text-align: center;color: #fff;">Edit Information</h2>
	<?php
		
		$q = "SELECT * FROM student WHERE username='$_SESSION[username]'";
		$result = mysqli_query($conn,$q) or die (mysql_error());

		while ($row = mysqli_fetch_assoc($result)) 
		{
			$username=$row['username'];
			$password=$row['password'];
			$email=$row['email'];
			$contact=$row['contact'];

			

		}

	?>

	<div class="profile_info" style="text-align: center;">
		<span style="color: white;">Welcome,</span>	
		<h4 style="color: white;"><?php echo $_SESSION['login_user']; ?></h4>
	</div><br><br>
	
	<div class="form1">
		<form action="" method="post" enctype="multipart/form-data">

		<label><h4><b>Username</b></h4></label>
		<input class="form-control" type="text" name="username" value="<?php echo $username; ?>">
        
                <label><h4><b>Reg.No.</b></h4></label>
                <input class="form-control" type="text" name="Reg.No." value="<?php echo $Reg.NO; ?>">

		<label><h4><b>Email</b></h4></label>
		<input class="form-control" type="text" name="email" value="<?php echo $email; ?>">

		<label><h4><b>Password</b></h4></label>
		<input class="form-control" type="text" name="password" value="<?php echo $password; ?>">

		<br>
		<div style="padding-left: 100px;">
			<button class="btn btn-default" type="submit" name="submit">save</button></div>
	</form>
</div>
	<?php 

		if(isset($_POST['submit']))
		{

	
			$username=$_POST['username'];
			$password=$_POST['password'];
			$email=$_POST['email'];
			$Reg.No. = $_POST['Reg.No.'];

			$sql1= "UPDATE student SET  username='$username', Reg.No='$Reg.No.',  email='$email',  password='$password' WHERE username='".$_SESSION['username']."';";
			if(mysqli_query($conn,$sql1))
			{
				$q = "SELECT * FROM student WHERE username = '$username'";
				$res = mysqli_query($conn,$q); 
				$row = mysqli_fetch_assoc($res);
				//Updating session variable for new set
				$_SESSION['username'] = $row['username'];
				$_SESSION['Reg.NO.'] = $row['reg.no.'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['password'] = $row['password'];
				?>
					<script type="text/javascript">
						alert("Saved Successfully.");
						window.location="profile.php";
					</script>
				<?php
			}
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
