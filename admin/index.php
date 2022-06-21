<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fleastyle Store</title>
    <link rel="stylesheet" href="style.css">

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
    <link rel="shortcut icon" href="../Images/logo.png" type="image/x-icon">
</head>
<body>

<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bgs">
        <div class="container-fluid">
          <img src="../Images/logo-3.png" alt="" class="logo">
          <nav class="navbar navbar-expand-lg">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a href="" class="nav-link text-dark p-3 bg-white rounded-3"> <img src="../Images/user.png" alt="" width="45px" height="45px"> Welcome Guest</a>
                </li>
                <li class="nav-item">
                  <a href="" class="btn btn-danger m-3">Logout</a>
                </li>
              </ul>
          </nav>
        </div>
    </nav>
    <div class="bg-dark">
      <h3 class="text-center text-warning p-2"> || MANAGE DASHBOARD ||</h3>
      <div class="col-md-12">
          <div class="button text-center bg-dark p-3">
            <a href="insert_products.php" class="btn btn-info">Insert products</a>
            <a href="" class="btn btn-info">View Products</a>
            <a href="index.php?insert_category" class="btn btn-info">Insert Categories</a>
            <a href="" class="btn btn-info">View Categories</a>
            <a href="index.php?insert_brands" class="btn btn-info">Insert Brands</a>
            <a href="" class="btn btn-info">View Brands</a>
            <a href="" class="btn btn-info">All Orders</a>
            <a href="" class="btn btn-info">All Payments</a>
            <a href="" class="btn btn-info">List Users</a>  
          </div>
      </div>
    </div>
</div>


<br>
<div class="container my-5">
  <?php
    if(isset($_GET['insert_category'])){
      include("insert_categories.php");
    }elseif(isset($_GET['insert_brands'])){
      include("insert_brands.php");
    }
  ?>
</div>
<br>
<br>
<br>

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