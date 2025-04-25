<?php
    ob_start();
    session_start();
    include('connection.php');
    if(!isset($_SESSION['id'])){
        header("Location:/StudyBuddy/");
    }

    $grand_total = 0;
    $user_id=$_SESSION['id'];
    $sql="SELECT * FROM `cart` where user_id=$user_id";
    $result=mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
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

    <title>Cart</title>
    
    <style>
        body{
            background-image: url('images/cr21.jpg');
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

    <div class="site-section my-5">
        <?php
            if($count == 0){
                ?>
                    <h1 class="text-center">Empty Cart <i class='fa-regular fa-face-sad-tear'></i></h1><br>
                    <div class="container">
                        <a href="book_main.php"><button class="btn btn-outline-primary">Shop Now</button></a>
                    </div>
                <?php
            }
            else{
        ?>
        <div class="container">
            <div class="row mb-5">
                <form class="col-md-12" method="post">
                    <div class="site-blocks-table">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($row=mysqli_fetch_array($result)){
                                ?>

                                <tr>
                                    <td class="product-thumbnail">
                                        <img src="book_images/<?php echo $row['p_img'];?>" alt="Image" class="img-fluid" width="150">
                                    </td>
                                    <td class="product-name">
                                        <h2 class="h5 text-black"><?php echo $row['p_name'];?></h2>
                                    </td>
                                    <td><?php echo $row['p_price'];?></td>
                                    <td><?php echo $row['p_qty'];?></td>
                                    <td>
                                        <?php 
                                            $a = (int)$row['p_price'];
                                            $b = (int)$row['p_qty'];
                                            $total = $a * $b;
                                            echo $total;

                                            $grand_total += $total;
                                        ?>
                                    </td>
                                    <td><a href="cart_delete.php?id=<?php echo $row['id']?>" class="btn btn-primary height-auto btn-sm">X</a></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>

                        </table>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-5">
                        <!-- <div class="col-md-6 mb-3 mb-md-0">
                            <a href="book_main.php" style="text-decoration: none;"><button class="btn btn-primary btn-md btn-block">Update Cart</button></a>
                        </div> -->
                        <div class="col-md-6">
                            <a href="book_main.php" style="text-decoration: none;"><button class="btn btn-outline-primary btn-md btn-block">Continue
                                    Shopping</button></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="text-black h4" for="coupon">Coupon</label>
                            <p>Enter your coupon code if you have one.</p>
                        </div>
                        <div class="col-md-8 mb-3 mb-md-0">
                            <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary btn-md px-4">Apply Coupon</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Total</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">
                                        <?php 
                                            echo $grand_total;
                                        ?>
                                    </strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <a href="checkout.php?success=success" style="text-decoration:none;">
                                        <button class="btn btn-primary btn-lg btn-block">Proceed To Checkout</button>
                                    </a>
                                </div>
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

    <!-- Footer end -->

</body>

</html>