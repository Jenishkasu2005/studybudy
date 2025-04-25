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
        #status{
            width: 127px;
        }
    </style>
    <!-- <script>
        $(document).ready(function(){
            $('.btn').click(function(){
                $(this).toggleClass("btn-outline-success");
                $(this).val(($(this).val() === 'Not Delivered' ? 'Delivered' : 'Not Delivered'));
            });
        });
    </script> -->
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3" id="header_menu">
                <?php include('header.php');?>
            </div>
            <div class="col-md-9 my-5">
                <h1>Order Report</h1><br><br>
                <div class="card">
                    <div class="card-header">
                        <h5>Order Report</h5>
                    </div>
                    <div class="card-body">
                        <form method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">From Date</label>
                                        <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; }else{} ?>" class="form-control"
                                            placeholder="From Date">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">To Date</label>
                                        <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; }else{} ?>" class="form-control" placeholder="From Date">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Find Order</label><br>
                                        <button type="submit" class="btn btn-primary">Find</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><br><br><br>
                <table class="table my-5 text-center" id="myTable">
                    <thead>
                        <tr>
                            <th>Order Id</th>
                            <th>First name</th>
                            <!-- <th>Last Name</th> -->
                            <th>Address</th>
                            <!-- <th>State</th>
                            <th>ZIP</th> 
                            <th>Email</th>-->
                            <th>M No.</th>
                            <th>Total</th>
                            <th>Payment Type</th>
                            <th>Status</th>
                            <th>Item Details</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // include "connection.php";
                            // $sql="SELECT * FROM `order`";
                            // $result=mysqli_query($conn,$sql);
                            if(isset ($_GET['from_date']) && isset ($_GET['to_date'])) {
                                $from_date = $_GET['from_date'];
                                $to_date = $_GET['to_date'];

                                // $conn=mysqli_connect("localhost","root","","new_classic_watch");
                            
                                $sql = "SELECT * FROM `order` WHERE `order_date` BETWEEN '$from_date' AND '$to_date'";
                                $result = mysqli_query($conn, $sql);
                                if($result){
                                    while($row=mysqli_fetch_assoc($result)){
                                        echo"<tr>
                                            <td>".$row['id']."</th>
                                            <td>".$row['fname']."</th>
                                            <td>".$row['address']."</td>
                                            <td>".$row['phone']."</td>
                                            <td>".$row['total']."</td>
                                            <td>".$row['payment_type']."</td>
                                            <td>".$row['status']."</td>
                                            <td><a href='order_detail.php?id=".$row['id']."'><button class='btn btn-outline-primary'><i class='fa-solid fa-eye'></i></button></a></td>
                                            <td><a href='order_delete.php?id=".$row['id']."'><button type='button' class='btn btn-outline-danger'><i class='fa-solid fa-trash'></i></button>
                                            <a href='order_status.php?id=".$row['id']."&status=".$row['status']."'><button type='button' class='btn btn-outline-secondary'>Status</button></td>
                                        </tr>";
                                    }
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
