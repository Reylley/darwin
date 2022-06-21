<?php
    include("../includes/db.php");
    include("../functions/all_functions.php");
    session_start();
    $conn = Connection();
    if(isset($_POST['user_register'])){
        $user_username = $_POST['user_username'];
        $user_email = $_POST['user_username'];
        $user_password = $_POST['user_password'];
        $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
        $conf_user_password = $_POST['conf_user_password'];
        $user_address = $_POST['user_address'];
        $user_contact = $_POST['user_contact'];
        $user_image = $_FILES['user_image']['name'];
        $temp_img = $_FILES['user_image']['tmp_name'];
        $user_ip = getIPAddress();


        $user_check = "SELECT * FROM `users_table` WHERE user_mobile = '$user_contact'";
        $result = mysqli_query($conn, $user_check);
        $row_count = mysqli_num_rows($result);

        if($row_count>0){
            echo "<script>alert('Username already used!')</script>";
        }elseif($conf_user_password != $user_password){
            echo "<script>alert('Password does not matched!')</script>";
            
        }else{
            move_uploaded_file($temp_img,"./profile-img/$user_image");
            $add_query = "INSERT INTO `users_table` (username, user_email, user_password, user_image, user_ip,
            user_address, user_mobile) VALUES ('$user_username', '$user_email', '$hash_password', '$user_image', '$user_ip','$user_address', '$user_contact')";

            $sql_exe = mysqli_query($conn, $add_query);

            if($sql_exe){
                echo "<script>alert('User registered successfuly!')</script>";
            }else{
                die(mysqli_error($conn));
            }
        }

       $select_cart_items = "SELECT * FROM `cart_details` WHERE ip_address='$user_ip'";
        $result_cart = mysqli_query($conn, $select_cart_items);
        $row_counts = mysqli_num_rows($result);
        if($row_counts>0){
            $_SESSION['username']=$user_username;
            echo "<script>alert('You have items in your cart!')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        }else{
            echo "<script>window.open('../index.php','_self')</script>";
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
    <div class="container-fluid p-0">
        <h2 class="text-center bg-dark p-3 text-warning">User Registration</h2>
    </div>
    <div class="row align-items-center justify-content-center w-50 m-auto">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-outline mb-4 mt-5">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" id="user_username" class="form-control" placeholder="Username" autocomplete="off" name="user_username">
                </div>

                <div class="form-outline mb-4">
                    <label for="user_email" class="form-label">Email</label>
                    <input type="email" id="user_email" class="form-control" placeholder="Email" autocomplete="off" name="user_email">
                </div>
                <div class="form-outline mb-4">
                    <label for="user_image" class="form-label">User Profile</label>
                    <input type="file" id="user_image" class="form-control" name="user_image">
                </div>

                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" id="user_password" class="form-control" placeholder="Password" 
                    autocomplete="off" name="user_password" autocomplete="off">
                </div>

                <div class="form-outline mb-4">
                    <label for="conf_user_password" class="form-label">Confirm Password</label>
                    <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm Password" 
                    autocomplete="off" name="conf_user_password" autocomplete="off">
                </div>

                <div class="form-outline mb-4">
                    <label for="user_address" class="form-label">Address</label>
                    <input type="text" id="user_address" class="form-control" placeholder="Address" 
                    autocomplete="off" name="user_address" autocomplete="off">
                </div>
                <div class="form-outline mb-4">
                    <label for="user_contact" class="form-label">Contact</label>
                    <input type="text" id="user_contact" class="form-control" placeholder="Mobile Number" 
                    autocomplete="off" name="user_contact" autocomplete="off">
                </div>
                <div class="text-center mt-4 pt-4">
                    <input type="submit" name="user_register" class="bg-info py-2 px-3 border-0 rounded-3" value="Register">
                    <p>Already have an account? <a href="user_login.php" class="text-success text-decoration-none"> <strong>Login</strong> </a></p>
                </div>
            </form>
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