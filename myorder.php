<?php
    ob_start();
    session_start();
    include('connection.php');
    if(!isset($_SESSION['id'])){
        header("Location:/StudyBuddy/");
    }
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
    <link rel="stylesheet" href="css/form.css">

    <title>My Order</title>
    
    <style>
        body{
            background-image: url('images/cr21.jpg');
        }

        .main{
            width: 80%;
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

    <div class="container main">
        <h1 class="text-center mt-3">My Orders</h1>
        <table class="table mr-2 mt-3 text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Order Id</th>
                    <th>Address</th>
                    <th>Total</th>
                    <th>Payment Type</th>
                    <th>Order Date</th>
                    <th>Item</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $id = $_SESSION['id'];
                    $sql="SELECT * FROM `order` where u_id=$id";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            echo"<tr>
                                <td>".$row['id']."</th>
                                <td>".$row['address']."</td>
                                <td>".$row['total']."</td>
                                <td>".$row['payment_type']."</td>
                                <td>".date('d-m-Y',strtotime($row['order_date']))."</td>
                                <td><a href='view_item.php?id=".$row['id']."'><button class='btn btn-outline-primary'><i class='fa-solid fa-eye'></i></button></a></td>
                            </tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>    

    <!-- Footer start-->

    <?php
        include('footer.php');
    ?>

    <!-- Footer end -->
</body>

</html>