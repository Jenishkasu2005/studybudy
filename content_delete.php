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

    $sql="DELETE FROM `about_us_content` WHERE id='$id'";
    $result=mysqli_query($conn,$sql);
    if($result){
        ?>
            <script>
                alert("Content Deleted Successfully...");
                window.location.href="admin_about.php";
            </script>
        <?php
    }
?>