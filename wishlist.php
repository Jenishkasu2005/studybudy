<?php
    ob_start();
    session_start();
    include('connection.php');
    if(!isset($_SESSION['id'])){
        header("Location:/StudyBuddy/");
    }

    // $grand_total = 0;
    $user_id=$_SESSION['id'];
    $sql="SELECT * FROM `wishlist` where u_id=$user_id";
    $result=mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
    // print($count); exit;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/head_image.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="css/fake_loader.css">
    <script src="js/fake_loader.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>

    <title>WishList</title>
    
    <style>
        body{
            background-image: url('images/cr21.jpg');
        }

        .product{
            border: 2px solid black;
            border-radius: 6px;
            height: 200px;
            width: 150px;
            cursor: pointer;
        }


    </style>
</head>

<body>

    <?php 
        include('fake_loader.php');
    ?>

    <!-- navbar start -->

    <?php
        include('navbar.php');
    ?>

    <!-- navbar end -->

    <?php
        //  if(isset($_SESSION['id'])){
    ?>

    <div class="site-section my-5">
        <?php
            if($count == 0){
                ?>
                    <h1 class="text-center">Empty Wishlist <i class='fa-regular fa-face-sad-tear'></i></h1><br>
                    <div class="container">
                        <a href="book_main.php"><button class="btn btn-outline-primary">Shop Now</button></a>
                    </div>
                <?php
            }
            else{
        ?>

        <div class="container">
                <div class="row">
                    <?php
                        $user_id=$_SESSION['id'];
                        $sql="SELECT * FROM `wishlist` where u_id=$user_id";
                        $result=mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_array($result)){
                    ?>
                        <div class="col-md-4">
                            <img src="book_images/<?php echo $row['img'];?>" alt="" class="product mt-4 ml-1"><br>
                            <div>
                                <a href="wishlist_to_cart.php?w_id=<?php echo $row['w_id']; ?>">
                                    <button class="btn btn-outline-primary mt-2" name="add">Add To Cart</button>
                                </a>
                                <!-- <button class="btn btn-outline-primary mt-2" name="add">Add To Cart</button> -->
                                <a href="wishlist_delete.php?id=<?php echo $row['w_id']; ?>">
                                    <button class="btn btn-outline-danger mt-2"><span><i class="fa-solid fa-circle-xmark"></i></span></button>
                                </a>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                </div>
        </div>
        <?php } ?>
    </div>

    <?php
        $sql="SELECT * FROM `wishlist` where u_id=$user_id";
        $result=mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);

        if(isset($_POST['add'])){
            $p_name =  $row['p_name'];
            $p_price = $row['price'];
            $p_img = $row['img'];
            $p_qty = $row['qty'];
            $user_id=$_SESSION['id'];
            $b_id=$row['b_id'];

            $query="SELECT * FROM `cart` where user_id=$user_id";
            $result_query=mysqli_query($conn,$query);
            $rows=mysqli_fetch_array($result_query);
            if(mysqli_num_rows($result_query) > 0){
                $p_qty = $rows['p_qty'] + $p_qty;
                $cart_update = "UPDATE `cart` SET `p_qty`= $p_qty WHERE `id`=".$rows['id'];
                $cart_run = mysqli_query($conn,$cart_update);
            }
            else{
                $cart_insert = "INSERT INTO `cart`(`b_id`,`user_id`, `p_name`, `p_price`, `p_qty`, `p_img`) 
                VALUES ($b_id,$user_id,'$p_name',$p_price,$p_qty,'$p_img')";
                $cart_run = mysqli_query($conn,$cart_insert);
            }

            if($cart_run){
                $sql = "DELETE FROM `wishlist` WHERE u_id=$user_id AND b_id=$b_id";
                $result = mysqli_query($conn,$sql);
                header("Location: wishlist.php");
            }

        }
    ?>


    <!-- Footer start-->

    <?php
        include('footer.php');
    ?>

    <!-- Footer end -->

</body>

</html>