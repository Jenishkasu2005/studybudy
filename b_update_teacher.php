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
            /* background-color: #94b5df; */
            background-image: url('images/cr18.jpg');
        }

        .container{
            /* border: 1px solid black; */
            box-shadow: 0px 5px 28px 4px;
            width: 100%;
        }

        img{
            border: 1px solid black;
        }

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
    <!--  -->

    <div class="container mt-5 mb-5"><br>
        <h1>Book Update</h1>

        <div class="my-5">
            <div class="col-md-4">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="bname">Book Name</label>
                        <input type="text" value="<?php echo $row['b_name'];?>" class="form-control" name="bname" id="bname" placeholder="Enter Book Name">
                    </div>

                    <div class="form-group">
                        <label for="bprice">Select PDF File</label><br>
                        <input type="file" name="bprice" id="bprice">
                        <label><?php echo $row['note'];?></label>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" name="upload" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div><br><br>
</body>
</html>

<?php
   if(isset($_POST['upload'])){

        $name=$_POST['bname'];

        $target_dir1 = "Notes/";
        $target_file1 = $target_dir1 . basename($_FILES["FileUpload"]["name"]);
        move_uploaded_file($_FILES["FileUpload"]["tmp_name"], $target_file1);
        $book_note=basename($_FILES["FileUpload"]["name"]);

        $sql="UPDATE `book` SET b_name='".$name."', b_price='".$price."',b_author='".$author."',b_img='".$book_image."',course='".$course."',quantity='".$quantity."' WHERE b_id=$id";
        $result=mysqli_query($conn,$sql);

        if($result){
            ?>
                <script>
                    alert("Book Updated Successfully...");
                    window.location.href="teacher_detail.php";
                </script>
            <?php
        }
   }
?>