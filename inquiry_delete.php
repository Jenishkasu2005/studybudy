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
    $query="DELETE FROM `inquiry` WHERE id='$id'";
    $data=mysqli_query($conn,$query);
    if($data){
        ?>
        <script>
            alert("Data Deleted Successfully");
            window.location.href="inquiry.php";
        </script>
        <?php
    }
?>
