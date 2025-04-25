<?php
    session_start();
    if(!isset($_SESSION["admin_id"]))
    {
      echo "<script>window.location='login_admin.php';</script>";
    }
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
                <h1>About Us Page Contents</h1>
                <div class="container my-5">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal1">
                        Add Content
                    </button>

                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal2">
                        Add FAQ's
                    </button>

                    <!-- Content Modal Start -->
                    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Content</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="content_add.php" class="form mx-auto" method="post">
                                        <div class="form-group">
                                            <label for="title">Title : </label>
                                            <input class="form-control" type="text" name="title" id="title" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="content">Description : </label><br>
                                            <textarea class="form-control" name="content" id="content" cols="60" row="10" required></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="upload_content" class="btn btn-primary">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content Model End -->

                    <!-- FAQ's Model Start -->
                    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add FAQ's</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="faq_add.php" class="form mx-auto" method="post">
                                        <div class="form-group">
                                            <label for="question">FAQ : </label>
                                            <input class="form-control" type="text" name="question" id="question" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="answer">Answer : </label><br>
                                            <textarea class="form-control" name="answer" id="answer" cols="60" row="10" required></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="upload_faq" class="btn btn-primary">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FAQ's Model End -->
                </div>

                <h1>Content Section</h1>
                <table class="table my-5 text-center" id="myTable">
                    <thead>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                    <?php
                        //print_r($cr);
                        $sql="SELECT * FROM `about_us_content`";
                        $result=mysqli_query($conn,$sql);
                        if($result){
                            while($row=mysqli_fetch_assoc($result)){
                                echo "<tr>
                                        <td>".$row['id']."</td>
                                        <td>".$row['title']."</td>
                                        <td>".$row['description']."</td>
                                        <td><a href='content_update.php?id=".$row['id']."'><button type='button' class='btn btn-outline-primary'><i class='fa-solid fa-pen-to-square'></i></button>
                                        <a href='content_delete.php?id=".$row['id']."'><button type='button' class='btn btn-outline-danger mt-2'><i class='fa-solid fa-trash'></i></button></td>
                                    </tr>";
                            }
                        }
                    ?>
                    </tbody>
                </table>

                <h1>FAQ Section</h1>

                <table class="table my-5 text-center" id="myTable">
                <thead>
                    <th>Id</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                <?php
                    //print_r($cr);
                    $sql="SELECT * FROM `about_us_faq`";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            echo "<tr>
                                    <td>".$row['id']."</td>
                                    <td>".$row['question']."</td>
                                    <td>".$row['answer']."</td>
                                    <td><a href='faq_update.php?id=".$row['id']."'><button type='button' class='btn btn-outline-primary'><i class='fa-solid fa-pen-to-square'></i></button>
                                    <a href='faq_delete.php?id=".$row['id']."'><button type='button' class='btn btn-outline-danger mt-2'><i class='fa-solid fa-trash'></i></button></td>
                                </tr>";
                        }
                    }
                ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</body>
<!-- ck editor start -->
<!-- <script src="ckeditor/ckeditor.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
</script> -->
<!-- ck editor end -->
</html>
