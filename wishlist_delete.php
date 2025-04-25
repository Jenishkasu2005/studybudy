<?php
    ob_start();
    session_start();
    include('connection.php');
    if(!isset($_SESSION['id'])){
        header("Location:/StudyBuddy/");
    }

    $id=$_GET['id'];

    $sql="delete from wishlist where w_id='$id'";
    $result=mysqli_query($conn,$sql);
    if($result){
        ?>
            <script>
                window.location.href="wishlist.php";
            </script>
        <?php
    }
?>