<?php
    include('connection.php');

    $id=$_GET['n_id'];

    $sql="SELECT * FROM `book_note` WHERE n_id='$id'";
    $result=mysqli_query($conn,$sql);;
    $row=mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php');?>
    <style>
        body{
            background-image: url('images/cr18.jpg');
        }

        .form{
            max-width: 350px;
        }

        .main{
            width: 80%;
            margin-top: 12%;
        }

        img{
            border: 1px solid black;
        }

        a.pdf{
            text-decoration:none;
        }
    </style>
</head>
<body>
    <!--  -->

    <?php
        include('fake_loader.php');
    ?>

    <div class="container main">
        <h3 class="text-center">Note Update</h3>
        <form class="form mx-auto pt-3" method="post">
            <div class="form-group">
                <label for="bname">Book Name</label>
                <input type="text" value="<?php echo $row['b_name'];?>" class="form-control" name="bname" id="bname" placeholder="Enter Book Name" required>
            </div>

            <div class="form-group">
                <label for="n_file">Select PDF File</label>
                <input type="file"  name="FileUpload" id="n_file">
                <a href="Notes/<?php echo $row['note'];?>" target="_blank" class="pdf">
                    <?php echo $row['note'];?>
                </a>
            </div>

            <div class="modal-footer">
                <button type="submit" name="upload" class="btn btn-primary">Update</button>
            </div>
        </form> 
    </div>
</body>
</html>

<?php
   if(isset($_POST['upload'])){

        $name=$_POST['bname'];

        $target_dir1 = "Notes/";
        $target_file1 = $target_dir1 . basename($_FILES["FileUpload"]["name"]);
        move_uploaded_file($_FILES["FileUpload"]["tmp_name"], $target_file1);
        $book_note=basename($_FILES["FileUpload"]["name"]);

        if($_FILES["FileUpload"]['error'] != 0){
            $book_note= $row['note'];
        }
        else{
            $book_note=basename($_FILES["FileUpload"]["name"]);
        }

        // $sql="UPDATE `book` SET b_name='".$name."', b_price='".$price."',b_author='".$author."',b_img='".$book_image."',course='".$course."',quantity='".$quantity."' WHERE b_id=$id";
        $sql = "UPDATE `book_note` SET `b_name`='$name',`note`='$book_note' WHERE n_id=$id";
        $result=mysqli_query($conn,$sql);

        if($result){
            ?>
                <script>
                    alert("Note Updated Successfully...");
                    window.location.href="teacher_detail.php";
                </script>
            <?php
        }
   }
?>