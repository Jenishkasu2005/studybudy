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
                <h1>Books</h1>
                <div class="container my-5">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
                        Add Book
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Book</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="b_add.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="bookUpload">Book Image</label>
                                            <input type="file" class="form-control-file"  name="bookUpload" id="bookUpload" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="bname">Book Name</label>
                                            <input type="text" class="form-control" name="bname" id="bname" placeholder="Enter Book Name" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="bprice">Book Price</label>
                                            <input type="number" class="form-control" name="bprice" id="bprice" placeholder="Enter Book Price" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="bqty">Book Quantity</label>
                                            <input type="number" class="form-control" name="bqty" id="bqty" placeholder="Enter Book Quantity" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="bauthor">Book Author</label>
                                            <input type="text" class="form-control" name="bauthor" id="bauthor" placeholder="Enter Book Author Name" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="course">Course</label>
                                            <?php
                                                $sql = "SELECT * FROM `course`";
                                                $result = mysqli_query($conn,$sql);
                                            ?>
                                            <select class="form-control" name="course" id="course" required>
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
                    <th>Book Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Author Name</th>
                    <th>Course</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                <?php
                    //print_r($cr);
                    $sql="SELECT * FROM `book`";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            echo "<tr>
                                    <td>".$row['b_id']."</td>
                                    <td>".$row['b_name']."</td>
                                    <td> <img src='book_images/".$row['b_img']."' width='60'></td>
                                    <td>".$row['b_price']."</td>
                                    <td>".$row['quantity']."</td>
                                    <td>".$row['b_author']."</td>
                                    <td>".$cr[$row['course']]."</td>
                                    <td><a href='b_update.php?b_id=".$row['b_id']."'><button type='button' class='btn btn-outline-primary'><i class='fa-solid fa-pen-to-square'></i></button>&emsp;
                                    <a href='b_delete.php?b_id=".$row['b_id']."'><button type='button' class='btn btn-outline-danger'><i class='fa-solid fa-trash'></i></button></td>
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
