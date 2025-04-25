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
                <table class="table my-5 text-center" id="myTable">
                    <thead>
                        <h1>User Details</h1><br><br>
                        <tr>
                            <th>Id</th>
                            <th>First name</th>
                            <th>Last Name</th>
                            <th>M No.</th>
                            <th>DOB</th>
                            <th>City</th>
                            <!-- <th>ZIP</th> -->
                            <th>Email</th>
                            <th>Type</th>
                            <!-- <th>Password</th> 
                            <th>Secret Code</th>-->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // include "connection.php";
                            $sql="SELECT * FROM `reg_user`";
                            $result=mysqli_query($conn,$sql);
                            if($result){
                                while($row=mysqli_fetch_assoc($result)){
                                    echo"<tr>
                                        <td>".$row['id']."</th>
                                        <td>".$row['fname']."</th>
                                        <td>".$row['lname']."</td>
                                        <td>".$row['mno']."</td>
                                        <td>".date('d-m-Y',strtotime($row['dob']))."</td>
                                        <td>".$row['city']."</td>
                                        <td>".$row['email']."</td>
                                        <td>".$row['type']."</td>
                                        <td><a href='user_delete.php?id=".$row['id']."'><button type='button' class='btn btn-outline-danger'><i class='fa-solid fa-trash'></i></button></td>
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
