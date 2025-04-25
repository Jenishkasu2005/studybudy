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

    $sql="DELETE FROM `teacher` WHERE id='$id'";
    $result=mysqli_query($conn,$sql);
    if($result){
        ?>
            <script>
                alert("Teacher Deleted Successfully...");
                window.location.href="teacher.php";
            </script>
        <?php
    }
?>