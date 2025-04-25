<?php
    session_start();
    if(!isset($_SESSION["admin_id"]))
    {
      echo "<script>window.location='login_admin.php';</script>";
    }
?>
<?php
    include('connection.php');
    
    if(isset($_POST['upload_content'])){
        $title=$_POST["title"];
        $content=$_POST["content"];

        $sql="INSERT INTO `about_us_content`(`title`,`description`) VALUES('$title','$content')";

        $result=mysqli_query($conn,$sql);

        if($result){
            ?>
                <script>
                    alert("Content Added Successfully...");
                    window.location.href="admin_about.php";
                </script>
            <?php
        }
    }
?>