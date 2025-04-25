<?php
    session_start();
    if(!isset($_SESSION["admin_id"]))
    {
      echo "<script>window.location='login_admin.php';</script>";
    }

    if(!isset($_GET['c_id'])){
        header('Location: course.php');
    }
?>
<?php
    include('connection.php');

    $id=$_GET['c_id'];

    $sql="SELECT * FROM `course` WHERE c_id='$id'";
    $result=mysqli_query($conn,$sql);;
    $row=mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php');?>
    <style>
        #header_menu{
            padding-left: 0px;
        }

        .content{
            height: 70px;
            width: 230px
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3" id="header_menu">
                <?php include('header.php');?>
            </div>
            <div class="col-md-9 my-5">
                <h1>Course Update</h1>
                <a href="course.php">
                    <button class="btn btn-primary mt-2"><i class="fa-solid fa-arrow-left"></i></button>
                </a>
                <div class=" my-3">
                    <div class="col-md-4">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="cname">Course Name</label>
                            <input type="text" value="<?php echo $row['c_name'];?>" class="form-control" name="cname" id="cname" placeholder="Enter Course Name" required>
                        </div>

                        <div class="form-group">
                            <label for="fileToUpload">Course Image</label>
                            <input type="file" class="form-control-file"  name="fileToUpload" id="fileToUpload"><br>
                            <img src="course_images/<?php echo $row['c_img']; ?>" width="60">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" name="upload" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
   if(isset($_POST['upload'])){

    $name=$_POST['cname'];

    $target_dir = "course_images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

    $image=basename($_FILES["fileToUpload"]["name"]);
        
        if($_FILES["fileToUpload"]['error'] != 0){
            $image= $row['c_img'];
        }
        else{
            $image=basename($_FILES["fileToUpload"]["name"]);
        }

        $sql="UPDATE `course` SET c_name='".$name."',c_img='".$image."' WHERE c_id=$id";
        $result=mysqli_query($conn,$sql);

        if($result){
            ?>
                <script>
                    alert("Course Updated Successfully...");
                    window.location.href="course.php";
                </script>
            <?php
        }
   }
?>