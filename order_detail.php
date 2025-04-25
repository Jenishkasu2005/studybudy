<?php
    session_start();
    if(!isset($_SESSION["admin_id"]))
    {
      echo "<script>window.location='login_admin.php';</script>";
    }
    if(!isset($_GET['id'])){
        header('Location: order.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php');?>
    <style>
        #header_menu{
            padding-left: 0px;
        }

        .content{
            height: 70px;
            width: 230px
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3" id="header_menu">
                <?php include('header.php');?>
            </div>
            <div class="col-md-9 my-5">
                <table class="table my-5 text-center" id="myTable">
                    <thead>
                        <h1>User's Order Details</h1><br><br>
                        <a href="order.php">
                            <button class="btn btn-primary mb-5"><i class="fa-solid fa-arrow-left"></i></button>
                        </a>
                        <tr>
                            <th>User Id</th>
                            <th>Item</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Order Date</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // include "connection.php";
                            $id=$_GET['id'];
                            $sql="SELECT * FROM `order` where id=$id";
                            $result=mysqli_query($conn,$sql);
                            if($result){
                                while($row=mysqli_fetch_assoc($result)){
                                    $item = $row['item'];
                                    $item = explode(',', $item);
                                    $qty = $row['qty'];
                                    $qty = explode(',', $qty);
                                    $img = $row['img'];
                                    $img = explode(',', $img);
                                    $p_price = $row['p_price'];
                                    $p_price = explode(",", $p_price);
                                    for($i=0;$i<count($item);$i++){
                                    echo"<tr>
                                        <td>".$row['u_id']."</td>
                                        <td>".$item[$i]."</td>
                                        <td>".$p_price[$i]."</td>
                                        <td>".$qty[$i]."</td>
                                        <td>".date('d-m-Y',strtotime($row['order_date']))."</td> 
                                        <td> <img src='book_images/".$img[$i]."' width='60'></td>
                                        
                                    </tr>";
                                   }}
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
