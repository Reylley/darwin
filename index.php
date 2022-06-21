
<?php
include("includes/db.php");
include("functions/all_functions.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fleastyle Store</title>
    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.css">

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
              echo "<li><a class='dropdown-item' href='users/user_login.php'>Login</a></li>";
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
                <a class="nav-link text-white" href="product.php">Products</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" href="#">About</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-cart-shopping"> <sup><?php cart_item(); ?></sup> </i>
                </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="cart.php"><i class="fa-solid fa-clipboard-list"></i> Items <sup><?php cart_item(); ?></sup> </a></li>
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-credit-card"></i> Check out</a></li>
                    </ul>
                </li>
            </ul>
            
            </div>
        </div>
    </nav>
    <br>
    <br>

    <div class="container banner">
      <div class="row">
        <div class="col">
          <a href="product.php" class="btn text-white shop-btn"><i class="fa-solid fa-cart-arrow-up"></i> Start shopping</a>
        </div>
      </div>
    </div>
    <br>
    <br>



    <!-- Categories -->
    <div class="container">
      <h3 class="title">CATEGORIES</h3>
      <hr>
      <div class="row m-auto">
        <div class="card m-3 text-center" style="width: 15rem;">
          <img src="Images/Category-1.jpg" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title">Midi Dress</h5>
           
          </div>
        </div>
        <div class="card m-3 text-center" style="width: 15rem;">
          <img src="Images/Category-2.jpg" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title">Off the Shoulder</h5>
           
          </div>
        </div>
        <div class="card m-3 text-center" style="width: 15rem;">
          <img src="Images/Category-3.jpg" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title">Shift Dress</h5>
           
          </div>
        </div>
        <div class="card m-3 text-center" style="width: 15rem;">
          <img src="Images/Gallery-1.jpg" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title">Bodycon Dress</h5>
           
          </div>
        </div>
      </div>
    </div>



    <!-- Feature Products -->

    <br>

    <div class="container">
      <h3>Featured Products</h3>
      <hr>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="row">
        <div class="col-3"><img src="Images/Gallery-1.jpg" class="d-block w-100" alt="..."></div>
        <div class="col-3"><img src="Images/Gallery-2.jpg" class="d-block w-100" alt="..."></div>
        <div class="col-3"><img src="Images/Gallery-3.jpg" class="d-block w-100" alt="..."></div>
        <div class="col-3"><img src="Images/Gallery-4.jpg" class="d-block w-100" alt="..."></div>
      </div>
      
    </div>
    <div class="carousel-item">
      <div class="row">
        <div class="col-3"><img src="Images/Product-1.jpg" class="d-block w-100" alt="..."></div>
        <div class="col-3"><img src="Images/Product-2.jpg" class="d-block w-100" alt="..."></div>
        <div class="col-3"><img src="Images/Product-3.jpg" class="d-block w-100" alt="..."></div>
        <div class="col-3"><img src="Images/Product-4.jpg" class="d-block w-100" alt="..."></div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="row">
        <div class="col-3"><img src="Images/Product-5.jpg" class="d-block w-100" alt="..."></div>
        <div class="col-3"><img src="Images/Product-6.jpg" class="d-block w-100" alt="..."></div>
        <div class="col-3"><img src="Images/Product-7.jpg" class="d-block w-100" alt="..."></div>
        <div class="col-3"><img src="Images/Product-8.jpg" class="d-block w-100" alt="..."></div>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    </div>



    <br>
    <br>
    <br>
    <!-- Footer -->


    <footer class="bg-dark text-white pt-5 pb-4">
      <div class="container text-center text-md-left">
        <div class="row text-center text-md-left">
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <h5 class="text-uppercase mb-4 font-weight-bold text-warning">
              Fleastyle | 2022
            </h5>
          </div>
        </div>
      </div>
    </footer>

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