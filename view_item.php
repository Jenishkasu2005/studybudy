<?php
    ob_start();
    session_start();
    include('connection.php');
    if(!isset($_SESSION['id'])){
        header("Location:/StudyBuddy/");
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql="SELECT * FROM `order` where id=$id";
        $result=mysqli_query($conn,$sql);
        $row1 = mysqli_fetch_assoc($result);
    }
    else{
        header("Location:myorder.php");
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
        <h1 class="text-center mt-3">All Items</h1>
        <table class="table mr-2 mt-3 text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php
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
                                    <td><img src='book_images/".$img[$i]."' height='78' width='60'></td>
                                    <td>".$item[$i]."</th>
                                    <td>".$p_price[$i]."</td>
                                    <td>".$qty[$i]."</td>";
                                "</tr>";
                            }
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>    
    <div class="container text-center main">
        <div class="row">
            <div class="col-md-4">
                <h4>Status : 
                    <?php 
                        echo $row1['status'];
                    ?>
                </h4>
            </div>
            <div class="col-md-4">
                <h4>Payment Type : 
                    <?php 
                        echo $row1['payment_type'];
                    ?>
                </h4>
            </div>
            <div class="col-md-4">
                <form method="post" action="demo.php?id=<?php echo $row1['id']; ?>">
                    <?php
                        if($row1['status'] == 'Delivered' || $row1['status'] == 'Accepted'){
                            // echo "<td><a href='invoice.php?id=".$row1['id']."'><button class='btn btn-outline-primary' name='download'><i class='fa-solid fa-file-invoice'></i></button></a></td>";
                            echo "<td><button class='btn btn-primary' title='Download Invoice' name='download'><i class='fa-solid fa-file-invoice'></i> Invoice</button></td>";
                        } 
                    ?>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer start-->

    <?php
        include('footer.php');
    ?>

    <!-- Footer end -->
</body>

</html>