<?php
    session_start();
    if(!isset($_SESSION["admin_id"]))
    {
      echo "<script>window.location='login_admin.php';</script>";
    }
    if(!isset($_GET['b_id'])){
        header('Location: book.php');
    }
?>
<?php
    include('connection.php');

    $id=$_GET['b_id'];

    $sql="SELECT * FROM `book` WHERE b_id='$id'";
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
                <h1>Book Update</h1>
                <a href="book.php">
                    <button class="btn btn-primary mt-2"><i class="fa-solid fa-arrow-left"></i></button>
                </a>
                <div class="my-3">
                    <div class="col-md-4">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="bookUpload">Book Image</label>
                                <input type="file" class="form-control-file"  name="bookUpload" id="bookUpload"><br>
                                <img src="book_images/<?php echo $row['b_img']; ?>" width="60">
                            </div>

                            <div class="form-group">
                                <label for="bname">Book Name</label>
                                <input type="text" value="<?php echo $row['b_name'];?>" class="form-control" name="bname" id="bname" placeholder="Enter Book Name" required>
                            </div>

                            <div class="form-group">
                                <label for="bprice">Book Price</label>
                                <input type="number" value="<?php echo $row['b_price'];?>" class="form-control" name="bprice" id="bprice" placeholder="Enter Book Price" required>
                            </div>

                            <div class="form-group">
                                <label for="bqty">Book Quantity</label>
                                <input type="number" value="<?php echo $row['quantity'];?>" class="form-control" name="bqty" id="bqty" placeholder="Enter Book Quantity" required>
                            </div>

                            <div class="form-group">
                                <label for="bauthor">Book Author</label>
                                <input type="text" value="<?php echo $row['b_author'];?>" class="form-control" name="bauthor" id="bauthor" placeholder="Enter Book Author Name" required>
                            </div>

                            <div class="form-group">
                                <label for="course">Course</label>
                                <?php
                                    //echo $row['course'];
                                    $sql = "SELECT * FROM `course`";
                                    $result = mysqli_query($conn,$sql);
                                ?>
                                <select class="form-control" name="course" id="course" required>
                                    <option value="">Select Course</option>
                                    <?php
                                        while($rows=mysqli_fetch_array($result)){
                                        ?>
                                            
                                            <option value="<?php echo $rows['c_id']?>" <?=$rows['c_id'] == $row['course'] ? 'selected="selected"' : '';?>><?php echo $rows['c_name'];?></option>
                                        <?php
                                        }
                                    ?>
                                </select>
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

        $name=$_POST['bname'];
        $price=$_POST['bprice'];
        $author=$_POST['bauthor'];
        $course=$_POST['course'];
        $quantity=$_POST['bqty'];

        $target_dir1 = "book_images/";
        $target_file1 = $target_dir1 . basename($_FILES["bookUpload"]["name"]);
        move_uploaded_file($_FILES["bookUpload"]["tmp_name"], $target_file1);
        $book_image=basename($_FILES["bookUpload"]["name"]);

        if($_FILES["bookUpload"]['error'] != 0){
            $book_image= $row['b_img'];
        }
        else{
            $book_image=basename($_FILES["bookUpload"]["name"]);
        }

        $sql="UPDATE `book` SET b_name='".$name."', b_price='".$price."',b_author='".$author."',b_img='".$book_image."',course='".$course."',quantity='".$quantity."' WHERE b_id=$id";
        $result=mysqli_query($conn,$sql);

        if($result){
            ?>
                <script>
                    alert("Book Updated Successfully...");
                    window.location.href="book.php";
                </script>
            <?php
        }
   }
?>