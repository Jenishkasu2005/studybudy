<?php
    session_start();
    ob_start();
    
    include('connection.php');

    if(!isset($_GET['b_id'])){
        header("Location:book_main.php");  
    }

    $id=$_GET["b_id"];
    $sql="SELECT * FROM `book` WHERE b_id='$id'";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/head_image.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- animation start -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- animation end -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="css/fake_loader.css">
    <script src="js/fake_loader.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>

    <title>Books</title>
    
    <style>
        body{
            background-image: url('images/cr18.jpg');
        }

        .photo{
            border: 2px solid black;
            border-radius: 6px;
            height: 305px;
            width: 260px;
            cursor: pointer;
        }
    </style>
   
    <script type="text/javascript">
        $(document).ready(function(){
            var count = 1;
            $("#inc").click(function(){
                count++;
                if(count > <?php echo $row['quantity'];?>){
                    count = <?php echo $row['quantity'];?>;
                }
                $("#counter").attr("value",count);
            });
            $("#dec").click(function(){
                count--;
                if(count<0)
                {
                    count = 0;
                }
                $("#counter").attr("value",count);
            });            
        });
    </script>

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

    <div class="container my-5">
        <div class="row">
            <?php
                if($result){
                    //$row=mysqli_fetch_array($result)?>
                    <div class="col-md-6 my-4">
                        <img src="book_images/<?php echo $row['b_img'];?>" class="mx-auto d-block photo" alt="Image" data-aos="fade-down" data-aos-duration="1000"><br>
                        <?php 
                            if(!isset($_SESSION["id"])){
                                echo "<h4 class='text-center text-danger'>Please Login To View Notes</h4>";
                            }
                            else{
                        ?>
                        <a href="book_notes.php?b_id=<?php echo $row['b_id']?>" style="text-decoration: none;">
                            <button class="btn btn-primary mx-auto d-block">View Notes</button>
                        </a>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="col-md-6 my-4">
                        
                        <!-- <h5>Details</h5> -->
                        <div class="row">
                            <div class="col-md-12 my-3">
                                <div class="card" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100">
                                    <div class="card-header text-center bg-primary text-white">
                                        <i class="fa-solid fa-book"></i>&emsp;Name
                                    </div>
                                    <li class="list-group-item text-center"><h5><?php echo $row['b_name'];?></h5></li>
                                </div>
                            </div>

                            <div class="col-md-6 my-3">
                                <div class="card" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="200">
                                    <div class="card-header text-center bg-info text-white">
                                        <i class="fa-solid fa-sack-dollar"></i>&emsp;Price
                                    </div>
                                    <li class="list-group-item text-center"><h5><?php echo $row['b_price'];?></h5></li>
                                </div>
                            </div>

                            <div class="col-md-6 my-3">
                                <div class="card" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="300">
                                    <div class="card-header text-center bg-secondary text-white">
                                        <i class="fa-solid fa-at"></i>&emsp;Author 
                                    </div>
                                    <li class="list-group-item text-center"><h5><?php echo $row['b_author'];?></h5></li>
                                </div>
                            </div>

                            <div class="col-md-12 my-3">
                                <div class="card" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="400">
                                    <div class="card-header text-center text-white">
                                        <?php
                                            if($row['quantity'] == 0){
                                                ?>
                                                <h1 class="text-danger">Out Of Stock</h1>
                                                <?php
                                            }
                                            else{
                                                ?> 
                                            <form action="" method="POST" name="f1">
                                                <div class="row">
                                                    <script type="text/javascript">
                                                        $(document).ready(function(){
                                                            var count = 1;
                                                            $("#inc").click(function(){
                                                                count++;
                                                                if(count > <?php echo $row['quantity'];?>){
                                                                    count = <?php echo $row['quantity'];?>
                                                                }
                                                                $("#counter").attr("value",count);
                                                            });
                                                            $("#dec").click(function(){
                                                                count--;
                                                                if(count==0)
                                                                {
                                                                    count = 1;
                                                                }
                                                                $("#counter").attr("value",count);
                                                            });            
                                                        });
                                                    </script>
                                                
                                                    <div class="col-md-4 my-2">
                                                        
                                                        <!-- <form action="cart.php" method="post"> -->
                                                            <div class="input-group">
                                                                <button class="btn btn-outline-primary" id="dec" type="button">&minus;</button>
                                                                <input type="text" class="form-control text-center" value="1" id="counter" name="counter"readonly>
                                                                <button class="btn btn-outline-primary" id="inc" type="button">&plus;</button>
                                                            </div>
                                                        <!-- </form> -->
                                                    </div>
                                                    <div class="col-md-4 my-2">
                                                        <a href="#">
                                                            <button class="btn btn-outline-primary" name="cart">
                                                                <i class="fa-regular fa-square-plus"></i> Add to Cart
                                                            </button>
                                                        </a>
                                                    </div>
                                                    
                                                    <div class="col-md-4 my-2">
                                                        <button type="submit" name="wl" class="btn btn-outline-primary"> 
                                                            <i class="fa-regular fa-heart"></i> Wish List
                                                        </button>
                                                    </div>
                                                    
                                                </div>
                                            </form>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php
                }
            ?>
        </div>
    </div>

    

    <!-- Footer start-->
    <?php
        include('footer.php');
    ?>
    <!-- Footer End -->

    <?php

        if(isset($_POST['cart'])){
            if(isset($_SESSION["id"])){
                $b_id = $row['b_id'];
                $p_name =  $row['b_name'];
                $p_price = $row['b_price'];
                $p_img = $row['b_img'];
                $p_qty = $_POST['counter'];
                $user_id=$_SESSION['id'];
                
                $query="SELECT * FROM `cart` where user_id=$user_id and b_id=$b_id";
                $result_query=mysqli_query($conn,$query);
                $rows=mysqli_fetch_array($result_query);
                if(mysqli_num_rows($result_query) > 0){
                    $p_qty = $rows['p_qty'] + $p_qty;
                    $cart_update = "UPDATE `cart` SET `p_qty`= $p_qty WHERE `id`=".$rows['id'];
                    $cart_run = mysqli_query($conn,$cart_update);
                }
                else{
                    $cart_insert = "INSERT INTO `cart`(`b_id`,`user_id`, `p_name`, `p_price`, `p_qty`, `p_img`) VALUES ($b_id,$user_id,'$p_name',$p_price,$p_qty,'$p_img')";
                    $cart_run = mysqli_query($conn,$cart_insert);
                }

                ?>
                <script>
                    alert("Book Added To Your Cart...");
                    window.location.href = "book_main.php";
                </script>
                <?php
            }
            else{
                // echo "<script>alert('Please Login First...');</script>";
                header("Location: login1.php");
            }
        }

        // if(isset($_POST['sb'])){   
        //     $b_id = $row['b_id'];
        //     $qty = $_POST['counter'];

        //     if(isset($_SESSION['id'])){
        //         header("Location: checkout.php?b_id=$b_id&qty=$qty");
        //     }
        //     else{
        //         header("Location: login.php?b_id=$b_id&qty=$qty");
        //     }
        // }

        if(isset($_POST['wl'])){
            if(isset($_SESSION["id"])){
                $u_id = $_SESSION['id'];
                $b_id = $row['b_id'];
                $p_name =  $row['b_name'];
                $price = $row['b_price'];
                $qty = $_POST['counter'];
                $img = $row['b_img'];
                $total = $price * $qty;

                $query="SELECT * FROM `wishlist` where u_id=$u_id and b_id=$b_id";
                $result_query=mysqli_query($conn,$query);
                $rows=mysqli_fetch_array($result_query);
                if(mysqli_num_rows($result_query) > 0){
                    $qty = $rows['qty'] + $qty;
                    $wishlist_update = "UPDATE `wishlist` SET `qty`= $qty WHERE `w_id`=".$rows['w_id'];
                    $wishlist_run = mysqli_query($conn,$wishlist_update);
                }
                else{
                    $sql = "INSERT INTO `wishlist`(`b_id`,`u_id`, `p_name`, `price`, `qty`, `total`, `img`) VALUES ('$b_id','$u_id','$p_name','$price','$qty','$total','$img')";
                    $result = mysqli_query($conn,$sql);
                }

                if($result){
                    echo "<script>alert('Product Added to Wishlist...');</script>";
                }
            }
            else{
                // echo "<script>alert('Please Login First...');</script>";
                header("Location: login1.php");
            }
        }

    ?>

    <!-- for animation Start -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
		AOS.init({
			easing: 'ease-out-back',
			duration: 1000
		});
    </script>
    <!-- for Animation End -->

</body>

</html>