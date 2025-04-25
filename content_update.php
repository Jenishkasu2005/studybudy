<?php
    session_start();
    if(!isset($_SESSION["admin_id"]))
    {
      echo "<script>window.location='login_admin.php';</script>";
    }

    if(!isset($_GET['id'])){
        header('Location: admin_about.php');
    }
?>
<?php
    include('connection.php');

    $id=$_GET['id'];

    $sql="SELECT * FROM `about_us_content` WHERE id='$id'";
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
                <h1>Content Update</h1>
                <a href="admin_about.php">
                    <button class="btn btn-primary mt-2"><i class="fa-solid fa-arrow-left"></i></button>
                </a>

                <div class="my-3">
                    <div class="col-md-4">
                        <form class="form mx-auto" method="post">
                            <div class="form-group">
                                <label for="title">Title : </label>
                                <input class="form-control" value="<?php echo $row['title'];?>" type="text" name="title" id="title" required>
                            </div>
                            <div class="form-group">
                                <label for="content">Description : </label>
                                <textarea class="form-control" name="content" id="content" cols="30" rows="5" required><?php echo $row['description'];?></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="upload_content" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- ck editor start -->
<script src="ckeditor/ckeditor.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<!-- ck editor end -->
</html>

<?php
   if(isset($_POST['upload_content'])){

        $title=$_POST["title"];
        $content=$_POST["content"];

        $sql="UPDATE `about_us_content` SET title='".$title."', description='".$content."' WHERE id=$id";
        $result=mysqli_query($conn,$sql);

        if($result){
            ?>
                <script>
                    alert("Content Updated Successfully...");
                    window.location.href="admin_about.php";
                </script>
            <?php
        }
   }
?>