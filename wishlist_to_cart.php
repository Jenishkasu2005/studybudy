<?php
    ob_start();
    session_start();
    include('connection.php');
    if(!isset($_SESSION['id'])){
        header("Location:/StudyBuddy/");
    }

    if(isset($_GET['w_id'])){
        $wish = $_GET['w_id'];
        $sql="SELECT * FROM `wishlist` where w_id=$wish";
        $result=mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);

        // print_r($row); exit;

        $p_name =  $row['p_name'];
        $p_price = $row['price'];
        $p_img = $row['img'];
        $p_qty = $row['qty'];
        $user_id=$row['u_id'];
        $b_id = $row['b_id'];

        $query="SELECT * FROM `cart` where user_id=$user_id and b_id=$b_id";
        $result_query=mysqli_query($conn,$query);
        $rows=mysqli_fetch_array($result_query);
        if(mysqli_num_rows($result_query) > 0){
            $p_qty = $rows['p_qty'] + $p_qty;
            $cart_update = "UPDATE `cart` SET `p_qty`= $p_qty WHERE `id`=".$rows['id'];
            $cart_run = mysqli_query($conn,$cart_update);
        }else{
            $cart_insert = "INSERT INTO `cart`(`b_id`,`user_id`, `p_name`, `p_price`, `p_qty`, `p_img`) VALUES ('$b_id','$user_id','$p_name','$p_price','$p_qty','$p_img')";
            $cart_run = mysqli_query($conn,$cart_insert);
        }


        if($cart_run){
            $sql = "DELETE FROM `wishlist` WHERE w_id=$wish";
            $result = mysqli_query($conn,$sql);
            header("Location: wishlist.php");
        }
    }
?>