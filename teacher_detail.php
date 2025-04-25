<?php
    session_start();
    if(!isset($_SESSION["teacher_id"]))
    {
      echo "<script>window.location='login_teacher.php';</script>";
    }
?>

<?php
    ob_start();
    include('connection.php');

    $id=$_SESSION['teacher_id'];

    $sql="SELECT * FROM `teacher` WHERE id='$id'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);

    
?>
<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="images/head_image.png" type="image/x-icon">
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">

        <link rel="stylesheet" href="css/fake_loader.css">
        <script src="js/fake_loader.js"></script>
        <script src="js/jquery-3.4.1.min.js"></script>
        <link rel="stylesheet" href="css/form.css">

        <title>Profile | Teacher</title>

        <style>

            body{
                background-image: url('images/cr18.jpg');
            }

            .main{
                /* position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%,-50%); */
                background: linear-gradient(45deg, #58535396, #0095ff63);
                border: 10px solid #00dcff;
                border-radius: 20px;
                height: 425px;
                transition: .7s;
            }

            .main:hover{
                box-shadow: 0px 0px 20px 0px;
            }

            .box{
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%,-50%);
                height: 130px;
                background: linear-gradient(45deg, #e90000, #0cacf9);
                border-radius: 50%;
            }

            h1{
                font-family: Lucida Calligraphy;
            }

            h4{
                font-family: Palatino Linotype;
                color: #621855d1;
            }

            .col-md-8 h5{
                font-family: Goudy Old Style;
                color: #3f00a582;
            }

            .btn{
                font-family: Century Gothic;
            }

            .pic{
                height: 130px;
                border-radius: 50%;
                transition: .7s;
            }

            .pic:hover{
                scale: .90;
                cursor: pointer;
            }

            #myTable{
                background-color: white;
            }

            .detail{
                width: 80%;
            }

        </style>
    </head>

    <body>

        <?php 
            include('fake_loader.php');
        ?>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="teacher_detail.php" method="POST">
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
                                <input type="text" value="<?php echo $row['subject'];?>" class="form-control" name="tsub" id="tsub" placeholder="Enter Faculty Subject" required>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="upload">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container main mt-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="box">
                        <img class="pic" src="teacher_images/<?php echo $row['image'];?>" alt="">
                    </div>
                </div>
                <div class="col-md-8 my-4">
                    <h1>Profile</h1>
                    <hr>
                    <div class="container">
                        <div class="row">                    
                            <div class="col-md-6">
                                <h4>Name</h4>
                                <h5><?php echo $row['name'];?></h5>
                            </div>
                            <div class="col-md-6">
                                <h4>Degree</h4>
                                <h5><?php echo $row['degree'];?></h5>
                            </div>
                            <div class="col-md-6">
                                <h4>College</h4>
                                <h5><?php echo $row['college'];?></h5>
                            </div>
                            <div class="col-md-6">
                                <h4>Experience</h4>
                                <h5><?php echo $row['exp'];?></h5>
                            </div>
                            <div class="col-md-6">
                                <h4>Course</h4>
                                <h5><?php echo $row['course'];?></h5>
                            </div>
                            <div class="col-md-6">
                                <h4>Subject</h4>
                                <h5><?php echo $row['subject'];?></h5>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-primary my-4" data-toggle="modal" data-target="#exampleModal">
                                    Update Profile
                                </button>
                            </div>
                            <div class="col-md-6">
                                <a href="logout_teacher.php" style="text-decoration: none;">
                                    <button class="btn btn-danger my-4" title="Logout">Logout</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Note Start -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 my-5">
                    <div class="container mb-3">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal1">
                            Add Note
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Note</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="add_note.php" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="bname">Book Name</label>
                                                <!-- <input type="text" class="form-control" name="bname" id="bname" placeholder="Enter Book Name"> -->
                                                <?php
                                                    $sql = "SELECT * FROM `book`";
                                                    $result = mysqli_query($conn,$sql);
                                                ?>
                                                <select class="form-control" name="b_id" id="b_id" required>
                                                    <option value="">Select Book</option>
                                                    <?php
                                                        while($row=mysqli_fetch_array($result)){
                                                            $cr[$row['b_id']] = $row['b_name'];
                                                        ?>
                                                            <option value="<?php echo $row['b_id']?>"><?php echo $row['b_name']?></option>
                                                        <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="n_file">Select PDF File</label><br>
                                                <input type="file"  name="FileUpload" id="n_file" required>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" name="upload" class="btn btn-primary">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                        $sql="SELECT * FROM `book_note` where t_id=$id";
                        $result=mysqli_query($conn,$sql);
                        $count=mysqli_num_rows($result);

                        if($count == 0){
                            echo "<h3 class='text-center mt-4'>Please Add Note</h3>";
                        }
                        else{
                    ?>

                    <div class="container detail">
                        <table class="table my-5 text-center" id="myTable">
                            <thead>
                                <th>Id</th>
                                <th>Book Name</th>
                                <th>File Name</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                <?php
                                    //print_r($cr);
                                    // $id = $_SESSION["teacher_id"];
                                    if($result){
                                        while($row=mysqli_fetch_assoc($result)){
                                            // print_r($row); exit;
                                            $b_id = $row['b_id'];
                                            $sql2="SELECT * FROM `book` WHERE b_id = $b_id";
                                            $result2=mysqli_query($conn,$sql2);
                                            $row2=mysqli_fetch_array($result2);
                                            echo "<tr>
                                                    <td>".$row['n_id']."</td>
                                                    <td>".$row2['b_name']."</td>
                                                    <td>".$row['note']."</td>
                                                    <td><a href='update_note.php?n_id=".$row['n_id']."' style='text-decoration: none'><button type='button' class='btn btn-outline-primary'><i class='fa-solid fa-pen-to-square'></i></button>
                                                    <a href='delete_note.php?n_id=".$row['n_id']."'><button type='button' class='btn btn-outline-danger'><i class='fa-solid fa-trash'></i></button></td>
                                                </tr>";
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>


                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <!-- Add Note End -->

        <!-- Teacher Profile Update Start -->
        <?php
         if(isset($_POST['upload'])){

            $name=$_POST['tname'];
            $degree=$_POST['tdegree'];
            $college=$_POST['tcollege'];
            $exp=$_POST['texp'];
            $course=$_POST['tcour'];
            $subject=$_POST['tsub'];

            $record = "UPDATE `teacher` SET name='".$name."', degree='".$degree."',college='".$college."',exp='".$exp."',course='".$course."',subject='".$subject."' WHERE id=$id";

            $update = mysqli_query($conn,$record);

            if($update){
                ?>
                    <script>
                        alert("Profile Updated Successfully...");
                        window.location.href="teacher_detail.php";
                    </script>
                <?php
            }
         }
        ?>
        <!-- Teacher Profile Update End -->
    </body>
</html>