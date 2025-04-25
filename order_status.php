<?php
    session_start();
    if(!isset($_SESSION["admin_id"]))
    {
      echo "<script>window.location='login_admin.php';</script>";
    }
    if(!isset($_GET['id'])){
        header('Location: order.php');
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
                <h1>Status</h1>
                <a href="order.php">
                    <button class="btn btn-primary mt-2"><i class="fa-solid fa-arrow-left"></i></button>
                </a>
                <div class="container-fluid my-5">
                    <div class="row">
                    <!-- left column -->
                    <div class="col-md-6 m-auto">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Update Status</h3>
                                <!-- <a href="order.php" class="btn btn-sm float-right bg-gradient-danger">View</a> -->
                            </div>
                            <!-- /.card-header -->
                            <?php
                                $st = $_GET["status"];
                                if(isset($_POST["btnsubmit"]))
                                {
                                    $id=$_GET["id"];
                                    $status=$_POST["txtstatus"];
                                    $sql = "update `order` set status='$status' where id='$id'";
                                    $result=mysqli_query($conn,$sql);
                                    if($result)
                                    {
                                        echo "<script>window.location='order.php';</script>";
                                    }
                                    else
                                    {
                                        echo "Error";
                                    }
                                }
                            ?>
                            <!-- form start -->
                            <form id="form1"method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                
                                <div class="form-group">
                                    <label for="txtcatname">Status</label>
                                    <select name="txtstatus"  class="form-control" id="reting" placeholder="status" >
                                        <option <?php if($st=="Delivered") { ?> selected <?php } ?>>Delivered</option>
                                        <option <?php if($st=="Pending") { ?> selected <?php } ?>>Pending</option>
                                        <option <?php if($st=="Accepted") { ?> selected <?php } ?>>Accepted</option>
                                        <option <?php if($st=="Cancel") { ?> selected <?php } ?>>Cancel</option>
                                    </select>
                                    </select>
                                </div>
                                
                                </div>

                                <div class="card-footer text-center">
                                <button type="submit" name="btnsubmit"class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
