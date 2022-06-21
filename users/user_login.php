<?php

include("../functions/all_functions.php");
@session_start();
  if (isset($_POST['user_login'])) {
      $conn = Connection();
      $username = $_POST['user_username'];
      $passw = $_POST['user_password'];

      $login_query = "SELECT * FROM `users_table` WHERE username='$username'";
      $result =mysqli_query($conn, $login_query);

      $row_count = mysqli_num_rows($result);
      $row_data = mysqli_fetch_assoc($result);
      $user_ip = getIPAddress();

      // Cart item
      $select_query_cart = "SELECT * FROM `cart_details` WHERE ip_address='$user_ip'";
      $select_cart = mysqli_query($conn, $select_query_cart);
      $row_count_cart = mysqli_num_rows($select_cart);

      if ($row_count>0) {
        $_SESSION['username'] = $username;
          if (password_verify($passw, $row_data['user_password'])) {
            $_SESSION['username'] = $username;
              if($row_count==1 and $row_count_cart==0){
                $_SESSION['username'] = $username;
                echo "<script>alert('Logged in successfuly!')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
              }else{
                $_SESSION['username'] = $username;
                echo "<script>alert('Logged in successfuly!')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
              }
          } else {

              echo "<script>alert('Invalid credentials')</script>";
          }
      } else {
          echo "<script>alert('Invalid credentials')</script>";
      }
    

  }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Fleastyle Registration</title>
  </head>
  <body>
    <div class="container-fluid">

 
    <div class="row align-items-center justify-content-center w-50 m-auto">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-outline mb-4 mt-5">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" id="user_username" class="form-control" placeholder="Username" autocomplete="off" name="user_username">
                </div>

                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" id="user_password" class="form-control" placeholder="Password" 
                    autocomplete="off" name="user_password" autocomplete="off">
                </div>

                <div class="text-center mt-4 pt-4">
                    <input type="submit" name="user_login" class="bg-info py-2 px-3 border-0 rounded-3 mb-3" value="Login">
                    <p>Don't have an account yet! <a href="user_registration.php" class="text-danger text-decoration-none"> <strong>Register</strong> </a></p>
                </div>
            </form>
        </div>
    </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" 
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" 
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" 
    crossorigin="anonymous"></script>
   
  </body>
</html>