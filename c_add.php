<?php
    session_start();
    if(!isset($_SESSION["admin_id"]))
    {
      echo "<script>window.location='login_admin.php';</script>";
    }
?>
<?php
    include('connection.php');
    
    if(isset($_POST['upload'])){
        $name=$_POST['cname'];

        $target_dir = "course_images/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

        $image=basename($_FILES["fileToUpload"]["name"]);

        $sql="INSERT INTO `course`(`c_name`,`c_img`) VALUES('$name','$image')";

        $result=mysqli_query($conn,$sql);

        if($result){
            ?>
                <script>
                    alert("Course Added Successfully...");
                    window.location.href="course.php";
                </script>
            <?php
        }
    }
?>