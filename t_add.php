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
        $uname=$_POST['tuname'];
        $pass=$_POST['tpass'];
        $name=$_POST['tname'];
        $degree=$_POST['tdegree'];
        $college=$_POST['tcollege'];
        $exp=$_POST['texp'];
        $course=$_POST['tcour'];
        $subject=$_POST['tsub'];

        $target_dir = "teacher_images/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

        $image=basename($_FILES["fileToUpload"]["name"]);

        $sql="INSERT INTO `teacher`(`name`,`degree`,`college`,`exp`,`course`,`image`,`subject`,`uname`,`pass`) VALUES('$name','$degree','$college','$exp','$course','$image','$subject','$uname','$pass')";

        $result=mysqli_query($conn,$sql);

        if($result){
            ?>
                <script>
                    alert("Teacher Added Successfully...");
                    window.location.href="teacher.php";
                </script>
            <?php
        }
    }
?>