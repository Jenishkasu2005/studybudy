<?php
    session_start();
    if(!isset($_SESSION["admin_id"]))
    {
      echo "<script>window.location='login_admin.php';</script>";
    }

    if(!isset($_GET['id'])){
        header('Location: teacher.php');
    }
?>
<?php
    include('connection.php');

    $id=$_GET['id'];

    $sql="SELECT * FROM `teacher` WHERE id='$id'";
    $result=mysqli_query($conn,$sql);
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
                <h1>teacher Update</h1>
                <a href="teacher.php">
                    <button class="btn btn-primary mt-2"><i class="fa-solid fa-arrow-left"></i></button>
                </a>

                <div class="my-5">
                    <div class="col-md-4">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="tname">Name</label>
                                <input type="text" value="<?php echo $row['name'];?>" class="form-control" name="tname" id="tname" placeholder="Enter Teacher Name" required>
                            </div>
                            <div class="form-group">
                                <label for="tdegree">Degree</label>
                                <input type="text" value="<?php echo $row['degree'];?>" class="form-control" name="tdegree" id="tdegree" placeholder="Enter Teacher Degree" required>
                            </div>
                            <div class="form-group">
                                <label for="tcollege">College</label>
                                <input type="text" value="<?php echo $row['college'];?>" class="form-control" name="tcollege" id="tcollege" placeholder="Enter Teacher College" required>
                            </div>
                            <div class="form-group">
                                <label for="texp">Experience</label>
                                <input type="number" value="<?php echo $row['exp'];?>" class="form-control" name="texp" id="texp" placeholder="Enter Teacher Experience" required>
                            </div>
                            <div class="form-group">
                                <label for="tcour">Course</label>
                                <input type="text" value="<?php echo $row['course'];?>" class="form-control" name="tcour" id="tcour" placeholder="Enter Teacher Course" required>
                            </div>
                            <div class="form-group">
                                <label for="tsub">Subject</label>
                                <input type="text" value="<?php echo $row['subject'];?>" class="form-control" name="tsub" id="tsub" placeholder="Enter Teacher Subject" required>
                            </div>
                            <div class="form-group">
                                <label for="fileToUpload">Image</label>
                                <input type="file" class="form-control-file"  name="fileToUpload" id="fileToUpload"><br>
                                <img src="teacher_images/<?php echo $row['image']; ?>" width="60">
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

        $name=$_POST['tname'];
        $degree=$_POST['tdegree'];
        $college=$_POST['tcollege'];
        $exp=$_POST['texp'];
        $course=$_POST['tcour'];
        $subject=$_POST['tsub'];

        $target_dir = "teacher_images/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        
        if($_FILES["fileToUpload"]['error'] != 0){
            $image= $row['image'];
        }
        else{
            $image=basename($_FILES["fileToUpload"]["name"]);
        }

        $sql="UPDATE `teacher` SET name='".$name."', degree='".$degree."',college='".$college."',exp='".$exp."',course='".$course."',image='".$image."',subject='".$subject."' WHERE id=$id";
        $result=mysqli_query($conn,$sql);

        if($result){
            ?>
                <script>
                    alert("Teacher Updated Successfully...");
                    window.location.href="teacher.php";
                </script>
            <?php
        }
   }
?>