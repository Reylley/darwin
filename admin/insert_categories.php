<?php
    include("../includes/connection.php");
    $conn = Connection();


    // Inserting category
    if(isset($_POST['insert_cat'])){
        $cat_title = $_POST['cat_title'];


        $check_query = "SELECT * FROM `categories` WHERE category_title='$cat_title'";
        $check_result = mysqli_query($conn, $check_query);
        $number = mysqli_num_rows($check_result);
        if($number > 0){
            echo "<script>alert('Category already added!')</script>";
        }else{

            $insert_q = "INSERT INTO `categories` (category_title) VALUES ('$cat_title')";
            $res= mysqli_query($conn, $insert_q);

            if ($res) {
                echo "<script>alert('Category has been added successfuly!')</script>";
            }
        }
    }

?>

<form action="" method="post" class="mb-2">
    <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
    <input type="text" class="form-control" name="cat_title" placeholder="Category title"
     aria-label="category_title" aria-describedby="basic-addon1" autocomplete="off">
    </div>
    <div class="input-group w-10 mb-2 text-center">
    <!-- <input type="submit" class="form-control" name="insert_cat" value="Insert Categories"> -->
    <input  type="submit" class="bg-info border-0 rounded-3 p-2 my-3 ms-auto" name="insert_cat" value="Insert Category">
    <!-- <button type="submit" class="bg-info border-0 rounded-3 p-2 m-3" name="insert_cat">Insert Category</button> -->
    </div>
</form>