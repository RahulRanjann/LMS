<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="assets/book-stack.svg" sizes="70x70">
  <link rel="stylesheet" href="">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
    integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
    <title></title>
</head>
<body>
<header>
<div class="container">
    <nav class="navbar navbar-expand-lg ">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
      aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
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
        <li class="nav-item">
          <a class="nav-link" href="Admint.php">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="About.php">About</a>
        </li>
        <li class="nav-item">
          <div class="dropdown">
            <button class="btn btn-secondary bg-transparent border-0 dropdown-toggle hidden-arrow" type="button"
              id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="bi bi-person-circle"></i>
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">User Name</a>
              <a class="dropdown-item" href="#">Another action</a>
              <hr class="m-2">
              <button class="dropdown-item"><i class="bi bi-person-circle"></i> <span
                  class="logout px-3">Logout</span></button>
            </div>
          </div>
        </li>
      </ul>
    </div>
</nav>
</div>
</header>

</body>
</html>