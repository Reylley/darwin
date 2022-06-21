
<?php

include("../functions/all_functions.php");
$conn = Connection();

session_start();

$user_ip = getIPAddress();
$get_user = "SELECT * FROM `users_table` WHERE user_ip='$user_ip'";
$result = mysqli_query($conn, $get_user);
$run_query = mysqli_fetch_array($result);
$user_id = $run_query['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fleastyle Store</title>
    <link rel="stylesheet" href="../style.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.css">

    <!-- Font awesome Icons -->
    <script src="https://kit.fontawesome.com/9b944c94ea.js" crossorigin="anonymous"></script>

    <!-- Link Swiper's CSS -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />

    <!-- Website Icon -->
    <link rel="shortcut icon" href="Images/logo.png" type="image/x-icon">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg1">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-user"></i> My Account
          </a>
          <ul class="dropdown-menu bg-info text-center" aria-labelledby="navbarDropdown">
          <?php
              if(isset($_SESSION['username'])){
                echo "<li><a class='dropdown-item' href='#'><i class='fa-solid fa-user'></i>". $_SESSION['username'] ."</a></li>";
              }else{
                echo "<li><a class='dropdown-item' href='#'><i class='fa-solid fa-user'></i>Guest</a></li>";
              }
            // <li><a class='dropdown-item' href=''><img src='Images/user.png' alt='' width='45px'></a></li>

            // <li><a class='dropdown-item' href='#'><i class='fa-solid fa-user'></i> Customer name</a></li>
            // <li><a class='dropdown-item' href='users/user_login.php'>Login</a></li>
            if(!isset($_SESSION['username'])){
              echo "<li><a class='dropdown-item' href='user_login.php'>Login</a></li>";
            }else{
              echo "<li><a class='dropdown-item' href='users/logout.php'>Logout</a></li>";
            }
            ?>
          </ul>
        </li>
        
    </div>
  </div>
</nav>
    <nav class="navbar navbar-expand-lg navbar-light bg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="Images/logo-2.png" alt="" width="100px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link text-white" href="../product.php">Products</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" href="#">About</a>
                </li>
                
            </ul>
            
            </div>
        </div>
    </nav>
    <br>
    <br>

    <div class="container">
        <div class="col-md-6 m-auto">
            <a href="order.php?user_id=<?php echo $user_id ?>" class="btn btn-success p-4 m-2">Cash on delivery</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" 
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" 
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" 
    crossorigin="anonymous"></script>
    <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>

     <!-- Swiper JS -->
     <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
     <!-- Initialize Swiper -->
</body>
</html>