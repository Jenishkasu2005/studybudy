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
                        <h1>Faculty Application Details</h1><br><br>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mno.</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // include "connection.php";
                            $sql="SELECT * FROM `faculty_apply`";
                            $result=mysqli_query($conn,$sql);
                            if($result){
                                while($row=mysqli_fetch_assoc($result)){
                                    echo"<tr>
                                        <td>".$row['id']."</th>
                                        <td>".$row['name']."</th>
                                        <td>".$row['email']."</td>
                                        <td>".$row['mno']."</td>
                                        <td>".$row['subject']."</td>
                                        <td>".$row['msg']."</td>
                                        <td>".$row['status']."</td>
                                        <td><a href='faculty_apply_status.php?id=".$row['id']."&status=".$row['status']."'><button type='button' class='btn btn-outline-secondary'><i class='fa-solid fa-pen-to-square'></i></button>
                                        <a href='faculty_apply_delete.php?id=".$row['id']."'><button type='button' class='btn btn-outline-danger mt-2'><i class='fa-solid fa-trash'></i></button></td>
                                        
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
