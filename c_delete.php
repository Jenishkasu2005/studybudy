<?php
    session_start();
    if(!isset($_SESSION["admin_id"]))
    {
      echo "<script>window.location='login_admin.php';</script>";
    }
?>
<?php
    include('connection.php');

    $id=$_GET['c_id'];

    $sql="DELETE FROM `course` WHERE c_id='$id'";
    $result=mysqli_query($conn,$sql);
    if($result){
        ?>
            <script>
                alert("Course Deleted Successfully...");
                window.location.href="course.php";
            </script>
        <?php
    }
?>