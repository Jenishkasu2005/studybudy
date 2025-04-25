<?php
    session_start();
    if(!isset($_SESSION["admin_id"]))
    {
      echo "<script>window.location='login_admin.php';</script>";
    }
?>
<?php
    include('connection.php');

    $id=$_GET['b_id'];

    $sql="DELETE FROM `book` WHERE b_id='$id'";
    $result=mysqli_query($conn,$sql);
    if($result){
        ?>
            <script>
                alert("Book Deleted Successfully...");
                window.location.href="book.php";
            </script>
        <?php
    }
?>