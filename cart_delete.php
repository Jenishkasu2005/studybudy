<?php
    ob_start();
    session_start();
    include('connection.php');
    if(!isset($_SESSION['id'])){
        header("Location:/StudyBuddy/");
    }

    $id=$_GET['id'];

    $sql="DELETE FROM `cart` WHERE id='$id'";
    $result=mysqli_query($conn,$sql);
    if($result){
        ?>
            <script>
                alert("Product Deleted Successfully...");
                window.location.href="cart.php";
            </script>
        <?php
    }
?>