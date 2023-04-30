<?php
  include "Connection.php";
	$conn=Opencon();
  session_start();

if(isset($_POST['sign_upsubmit']))
{
  $count=0;
  $sql="SELECT username from `admin`";
  $res=mysqli_query($conn,$sql);

  while($row=mysqli_fetch_assoc($res))
  {
    if($row['username']==$_POST['username'])
    {
      $count=$count+1;
    }
  }
  if($count==0)
  {
    mysqli_query($conn,"INSERT INTO admin ( username, contact, email, password) VALUES ('$_POST[username]', '$_POST[contact]', '$_POST[email]', '$_POST[password]')");
    echo '<script>
    alert("Registration successful")
    window.location = "index.php"
    </script>';
  ?>

<?php
  }
  else
  {

    ?>
<script type="text/javascript">
alert("The username already exist.");
</script>
<?php

  }

}


if(isset($_POST['login_submit']))
    {
      $count=0;
      $res=mysqli_query($conn,"SELECT * FROM `admin` WHERE email='$_POST[login_email]' && password='$_POST[login_pswd]';") ; 
      /*
      res = {
        status : sucesss,
        code : 200,
        httpCode : 200,
        data: {
          email: "om@gmail.com",
          username: "om",
          reg_no: "01",
          password: "12345"
        },
        kuch aur data...
      }
      */
      $row = mysqli_fetch_assoc($res);
      /*
        row = {
          email: "om@gmail.com",
          username: "om",
          reg_no: "01",
          password: "12345"
        }
      */
      $count=mysqli_num_rows($res);

      if($count==0)
      {
        ?>

<script type="text/javascript">
alert("The username and password doesn't match.");
</script>

<?php
      }
      else
      {
        $_SESSION['username'] = $row['username'];
        $_SESSION['contact'] = $row['contact'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $row['password'];
  ?>
<script type="text/javascript">
window.location = "index.php"
</script>
<?php
      }
    }

  ?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>Sign-in | Sign-up</title>
</head>

<body>

    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form name="Sign-up" method="post">
                <label for="chk" aria-hidden="true">Sign up</label>
                <input type="text" name="username" placeholder="User name" required="">
                <input type="text" name="contact" placeholder="Contact" required="">
                <input type="email" name="email" placeholder="Email" required="">
                <input type="password" name="password" placeholder="Password" required="">
                <button type="submit" name="sign_upsubmit">SignUp</button>
            </form>
        </div>
        <div class="login">

            <form name="Login" method="post">
                <label for="chk" aria-hidden="true" style="margin-top: 69px;">Login</label>
                <input type="email" name="login_email" placeholder="Email" required="">
                <input type="password" name="login_pswd" placeholder="Password" required="">
                <button type="submit" name="login_submit">Login</button>
            </form>
        </div>
    </div>



</body>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API = Tawk_API || {},
    Tawk_LoadStart = new Date();
(function() {
    var s1 = document.createElement("script"),
        s0 = document.getElementsByTagName("script")[0];
    s1.async = true;
    s1.src = 'https://embed.tawk.to/64452b1531ebfa0fe7f9e699/1gun30jic';
    s1.charset = 'UTF-8';
    s1.setAttribute('crossorigin', '*');
    s0.parentNode.insertBefore(s1, s0);
})();
</script>
<!--End of Tawk.to Script-->

</html>