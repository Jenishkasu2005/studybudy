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
                <h1>Courses</h1>
                <div class="container my-5">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
                        Add Course
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="c_add.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="cname">Course Name</label>
                                            <input type="text" class="form-control" name="cname" id="cname" placeholder="Enter Course Name" required>
                                        </div>

                                        <!-- <div class="form-group">
                                            <label for="csubject">Course Total Subject</label>
                                            <input type="number" class="form-control" name="csubject" id="csubject" placeholder="Enter Course Total Subject">
                                        </div> -->

                                        <div class="form-group">
                                            <label for="fileToUpload">Course Image</label>
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
                    <thead class="text-center">
                        <th>Id</th>
                        <th>Courses</th>
                        <th>Total Books</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                    <?php
                        $sql="SELECT * FROM `course`";
                        $result=mysqli_query($conn,$sql);

                        $qry = "SELECT count(course) as ct, c.c_id, c.c_name FROM `book` b, `course` c WHERE b.course=c.c_id GROUP by b.course";
                        $results=mysqli_query($conn,$qry);
                        //$rows=mysqli_fetch_assoc($results);
                        while($rows=mysqli_fetch_assoc($results)){
                            $cid[$rows['c_id']] = $rows['ct'];
                        }

                        if($result){
                            while($row=mysqli_fetch_assoc($result)){
                                if (!array_key_exists($row['c_id'], $cid)){
                                    $cid[$row['c_id']] = 0;
                                }
                                echo "<tr>
                                        <td>".$row['c_id']."</td>
                                        <td>".$row['c_name']."</td>
                                        <td>".$cid[$row['c_id']]."</td>
                                        <td><a href='c_update.php?c_id=".$row['c_id']."'><button type='button' class='btn btn-outline-primary'><i class='fa-solid fa-pen-to-square'></i></button>&emsp;
                                        <a href='c_delete.php?c_id=".$row['c_id']."'><button type='button' class='btn btn-outline-danger'><i class='fa-solid fa-trash'></i></button></td>
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
