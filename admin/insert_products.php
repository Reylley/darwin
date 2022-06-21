<?php
include("../includes/connection.php");
$conn = Connection();


if(isset($_POST['insert_product'])){
    $prod_title = $_POST['product_title'];
    $prod_des = $_POST['product_description'];
    $prod_keyword = $_POST['product_keyword'];
    $prod_category = $_POST['product_categories'];
    $prod_brand = $_POST['product_brands'];
    $prod_price = $_POST['product_price'];
    $prod_status = 'true';

    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    move_uploaded_file($temp_image1,"./storage/$product_image1");
    move_uploaded_file($temp_image2,"./storage/$product_image2");
    move_uploaded_file($temp_image3,"./storage/$product_image3");

    $add_prod = "INSERT INTO `products` (product_title, product_description, product_keyword, category_id, 
    brand_id, product_image1, product_image2, product_image3, product_price, date, status) VALUES 
    ('$prod_title', '$prod_des', '$prod_keyword', '$prod_category', '$prod_brand', '$product_image1', 
    '$product_image2', '$product_image3', $prod_price, NOW(), '$prod_status')";

    $result_query = mysqli_query($conn, $add_prod);

    if($result_query){
        echo "<script>alert('Product added successfully!')</script>";
    }
    // if($prod_title=='' or $prod_des=='' or $prod_keyword == '' or $prod_category =='' or $prod_brand== '' or $prod_price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
    //         echo "<script>alert('Please fill the input fields!')</script>";
    //         exit();
    // }else{
       
    // }
}

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
    <div class="container mt-3 bg-info p-2">
        <h1 class="text-center">
            Insert Products
        </h1>
        <hr>
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Product Name -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control"
                 placeholder="Product title" autocomplete="off">
            </div>
            <!-- Product Description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" name="product_description" id="product_description" class="form-control"
                 placeholder="Product Description" autocomplete="off">
            </div>
            <!-- Product keyword -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keyword" class="form-label">Product Keyword</label>
                <input type="text" name="product_keyword" id="product_keyword" class="form-control"
                 placeholder="Product Keyword" autocomplete="off">
            </div>

            <!-- Product categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_categories" id="product_categories" class="form-select">
                    <option value="">Select category</option>

                    <?php
                        $select_query = "SELECT * FROM `categories`";
                        $result = mysqli_query($conn, $select_query);
                        while($row = mysqli_fetch_assoc($result)){
                            $cat_title = $row['category_title'];
                            $cat_id = $row['category_id'];

                            echo "<option value='$cat_id'>$cat_title</option>";
                        }
                    ?>
                </select>
            </div>

            <!-- Product Brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="product_brands" class="form-select">
                    <option value="">Select brand</option>
                    <?php
                        $select_query = "SELECT * FROM `brands`";
                        $result = mysqli_query($conn, $select_query);
                        while($row = mysqli_fetch_assoc($result)){
                            $brand_title = $row['brand_title'];
                            $b_id = $row['brand_id'];

                            echo "<option value='$b_id'>$brand_title</option>";
                        }
                    ?>
                </select>
            </div>

            <!-- Product Image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control">
            </div>

            <!-- Product Image 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control">
            </div>

            <!-- Product Image 3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control">
            </div>

            <!-- Product Price -->
            <!-- Product keyword -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control"
                 placeholder="Product Price" autocomplete="off">
            </div>

            <!-- Product keyword -->
            <div class="form-outline mb-4 w-50 m-auto text-center">
                <input type="submit" name="insert_product" class="btn btn-success mb-3 px-3" value="Add Product">
            </div>
        </form>
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