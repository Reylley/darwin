<?php

include("functions/all_functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fleastyle Store</title>
    <link rel="stylesheet" href="custom.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.css">

    <!-- Font awesome Icons -->
    <script src="https://kit.fontawesome.com/9b944c94ea.js" crossorigin="anonymous"></script>

    <!-- Box Icons -->
    <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>

    <!-- Link Swiper's CSS -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />

    <!-- Website Icon -->
    <link rel="shortcut icon" href="Images/logo.png" type="image/x-icon">
    <style>
        .cart_img{
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
    </style>
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
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-credit-card"></i> Total : <?php total_price(); ?></a></li>
                    </ul>
                </li>
                
            </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>

    <div class="container">
        <div class="row">
            <form action="" method="POST">
            <table class="table table-rounded text-center">
                <thead>
                    <tr>
                        <th>Product Title</th>
                        <th>Product Image</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Remove</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        $conn = Connection();
                        $get_ip_add = getIPAddress();
                        $total_price = 0;
                        $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
                        $result= mysqli_query($conn, $cart_query);
                        while($row=mysqli_fetch_array($result)){
                            $product_id=$row['product_id'];
                            $select_products = "SELECT * FROM `products` WHERE product_id='$product_id'";
                            $result_products= mysqli_query($conn, $select_products);
                            while($row_product_price=mysqli_fetch_array($result_products)){
                                $product_price =array($row_product_price['product_price']);
                                $price_table = $row_product_price['product_price'];
                                $product_title = $row_product_price['product_title'];
                                $product_image1 = $row_product_price['product_image1'];
                                $product_values = array_sum($product_price);
                                $total_price +=$product_values;
                        
                    ?>
                    <tr>
                        <td><?php echo $product_title; ?></td>
                        <td><img src="./admin/storage/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                        <td><input type="text" name="qty" class="form-control text-center w-50" name="" id=""></td>
                        <?php 
                            $get_ip_add = getIPAddress();
                            if(isset($_POST['update_cart'])){
                                $quantities = $_POST['qty'];
                                $update_cart = "UPDATE `cart_details` SET quantity=$quantities WHERE ip_address='$get_ip_add'";
                                $result_prod_quantity = mysqli_query($conn, $update_cart);
                                $total_price = $total_price * $quantities;
                            }
                        ?>
                        <td>₱ <?php echo $price_table; ?></td>
                        <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>" id=""></td>
                        <td>
                           <input type="submit" value="Update cart" name="update_cart" class="bg-info rounded-3 px-3 py-2 border-0 mx-3">
                           <input type="submit" value="Remove cart" name="remove_cart" class="bg-danger text-light rounded-3 px-3 py-2 border-0 mx-3">
                    </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
            <div class="bg-dark rounded-3 p-3 d-flex">
                <div class="px-3 text-white m-4">Subtotal : <strong class="text-warning">₱ 500</strong></div>
                <a href="product.php" class="btn btn-warning m-3">Continue shopping</a>
                <a href="./users/checkout.php" class="btn btn-success m-3">Check out</a>
            </div>
            </form>

            <?php
                function remove_cart_item() {
                   
                    $conn = Connection();
                    if(isset($_POST['remove_cart'])){
                        foreach($_POST['removeitem'] as $remove_id){
                            echo $remove_id;
                            $delete_q = "DELETE FROM `cart_details` WHERE product_id=$remove_id";
                            $run_delete = mysqli_query($conn, $delete_q);
                            if($run_delete){
                                echo "<script>window.open('cart.php', '_self')</script>";
                            }
                        }
                    }
                }
                echo $remove_item = remove_cart_item();
            ?>
        </div>
    </div>
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