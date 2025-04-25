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
                <h1>Teacher</h1>
                <div class="container my-5">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
                        Add Teacher
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Teacher</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="t_add.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="tuname">Username</label>
                                            <input type="text" class="form-control" name="tuname" id="tuname" placeholder="Enter Teacher Username" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tpass">Password</label>
                                            <input type="password" class="form-control" name="tpass" id="tpass" placeholder="Enter Teacher Password" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tname">Name</label>
                                            <input type="text" class="form-control" name="tname" id="tname" placeholder="Enter Teacher Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tdegree">Degree</label>
                                            <input type="text" class="form-control" name="tdegree" id="tdegree" placeholder="Enter Teacher Degree" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tcollege">College</label>
                                            <input type="text" class="form-control" name="tcollege" id="tcollege" placeholder="Enter Teacher College" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="texp">Experience</label>
                                            <input type="number" class="form-control" name="texp" id="texp" placeholder="Enter Teacher Experience" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="course">Course</label>
                                            <?php
                                                $sql = "SELECT * FROM `course`";
                                                $result = mysqli_query($conn,$sql);
                                            ?>
                                            <select class="form-control" name="tcour" id="tcour" required>
                                                <option value="">Select Course</option>
                                                <?php
                                                    while($row=mysqli_fetch_array($result)){
                                                        $cr[$row['c_id']] = $row['c_name'];
                                                    ?>
                                                        <option value="<?php echo $row['c_id']?>"><?php echo $row['c_name']?></option>
                                                    <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tsub">Subject</label>
                                            <input type="text" class="form-control" name="tsub" id="tsub" placeholder="Enter Teacher Subject" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="fileToUpload">Image</label>
                                            <input type="file" class="form-control-file"  name="fileToUpload" id="fileToUpload">
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

            <table class="table my-5 text-center" id="myTable">
                <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Degree</th>
                    <th>College</th>
                    <th>Experience</th>
                    <th>Course</th>
                    <th>Subject</th>
                    <th>Image</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                <?php
                    $sql="SELECT * FROM `teacher`";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            echo "<tr>
                                    <td>".$row['id']."</td>
                                    <td>".$row['name']."</td>
                                    <td>".$row['degree']."</td>
                                    <td>".$row['college']."</td>
                                    <td>".$row['exp']."</td>
                                    <td>".$row['course']."</td>
                                    <td>".$row['subject']."</td>
                                    <td> <img src='teacher_images/".$row['image']."' width='60'></td>
                                    <td><a href='t_update.php?id=".$row['id']."'><button type='button' class='btn btn-outline-primary'><i class='fa-solid fa-pen-to-square'></i></button>
                                    <a href='t_delete.php?id=".$row['id']."'><button type='button' class='btn btn-outline-danger mt-2'><i class='fa-solid fa-trash'></i></button></td>
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
</html>
