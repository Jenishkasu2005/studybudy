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

    $sql="DELETE FROM `about_us_faq` WHERE id='$id'";
    $result=mysqli_query($conn,$sql);
    if($result){
        ?>
            <script>
                alert("FAQ Deleted Successfully...");
                window.location.href="admin_about.php";
            </script>
        <?php
    }
?>