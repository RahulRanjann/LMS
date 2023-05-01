<?php
    session_start();

    if(isset($_POST['logout'])){
        session_destroy();
        header("Location: ". $_SERVER['PHP_SELF']); 
        //If you are using $_SERVER and passing parameter as a PHP_SELF , 
        // It will be redirected to the same page you are running this program 
        // bassicly this means it will reload the page.
        // not good to reload the page in PHP but okey.
        exit();
    }
    // print_r();
?>
<header class="heading">
        <!-- Navbar -->
        <div class="container">

            <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="logo">
                        <a href="index.htm">
                            <img src="assets/book-stack.svg" alt="logo">
                        </a>
                    </div>
                    <a class="navbar-brand" href="#">Library Manegement System</a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Book.php">Book</a>
                            </li>
                            <?php 
                            $length = count($_SESSION);
                                if($length == 0){  // It will be cleared when user logouts.
                                    echo '<li class="nav-item"> <a class="nav-link" href="signup.php">Sign-in | Sign-up</a></li>';
                                }
                            ?>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="Admint.php">Admin</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="About.php">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="profile.php">profile</a>
                            </li>
                            <li class="nav-item">
                                <div class="dropdown">
                                    <button
                                        class="btn btn-secondary bg-transparent border-0 dropdown-toggle hidden-arrow"
                                        type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bi bi-person-circle"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">
                                            <?php 
                                                if($length > 0){
                                                    if($_SESSION['email']){
                                                        echo $_SESSION['username'];
                                                    }else{
                                                        echo 'Please Login';
                                                    }
                                                }else{
                                                    echo 'Please Login';
                                                }
                                            ?>
                                        </a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <hr class="m-2">
                                        <?php 
                                                if($length > 0){
                                                    echo '
                                                    <form method="post" class="dropdown-item">
                                                    <button type="submit" name="logout" class="btn btn-dark">
                                                        <i class="bi bi-person-circle"></i> <span class="logout px-3">Logout</span>
                                                    </button>
                                                </form>
                                                    ';
                                                }else{
                                                    echo '<div class="dropdown-item">Account</div>';
                                                }
                                            ?>
                                       
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
            </nav>
        </div>
    </header>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>