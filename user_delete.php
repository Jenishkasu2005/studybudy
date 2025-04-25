<?php
    session_start();
    if(!isset($_SESSION["admin_id"]))
    {
      echo "<script>window.location='login_admin.php';</script>";
    }
?>
<?php 
    include('connection.php');
    $id=$_GET['id'];
    $query="DELETE FROM `reg_user` WHERE id='$id'";
    $data=mysqli_query($conn,$query);
    if($data){
        ?>
        <script>
            alert("User Deleted Successfully");
            window.location.href="user.php";
        </script>
        <?php
    }
?>
