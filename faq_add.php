<?php
    session_start();
    if(!isset($_SESSION["admin_id"]))
    {
      echo "<script>window.location='login_admin.php';</script>";
    }
?>
<?php
    include('connection.php');
    if(isset($_POST['upload_faq'])){
        $question=$_POST["question"];
        $answer=$_POST["answer"];

        $sql="INSERT INTO `about_us_faq`(`question`,`answer`) VALUES('$question','$answer')";

        $result=mysqli_query($conn,$sql);

        if($result){
            ?>
                <script>
                    alert("FAQ Added Successfully...");
                    window.location.href="admin_about.php";
                </script>
            <?php
        }
    }
?>