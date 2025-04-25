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

    $sql="SELECT * FROM `about_us_faq` WHERE id='$id'";
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
                <h1>FAQ Update</h1>
                <a href="admin_about.php">
                    <button class="btn btn-primary mt-2"><i class="fa-solid fa-arrow-left"></i></button>
                </a>

                <div class="my-3">
                    <div class="col-md-4">
                        <form action="" class="form mx-auto" method="post">
                            <div class="form-group">
                                <label for="question">FAQ : </label>
                                <input class="form-control" value="<?php echo $row['question'];?>" type="text" name="question" id="question" required>
                            </div>
                            <div class="form-group">
                                <label for="answer">Answer : </label><br>
                                <textarea class="form-control" name="answer" id="answer" cols="30" rows="5" required><?php echo $row['answer'];?></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="upload_faq" class="btn btn-primary">Update</button>
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
        .create( document.querySelector( '#answer' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<!-- ck editor end -->
</html>

<?php
   if(isset($_POST['upload_faq'])){

        $question=$_POST["question"];
        $answer=$_POST["answer"];


        $sql="UPDATE `about_us_faq` SET question='".$question."', answer='".$answer."' WHERE id=$id";
        $result=mysqli_query($conn,$sql);

        if($result){
            ?>
                <script>
                    alert("FAQ Updated Successfully...");
                    window.location.href="admin_about.php";
                </script>
            <?php
        }
   }
?>