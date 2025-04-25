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
                <h1>Books Notes</h1><br><br>
                <?php
                    $sql="SELECT * FROM `book_note`";
                    $result=mysqli_query($conn,$sql);
                ?>

                <table class="table my-5 text-center" id="myTable">
                    <thead>
                        <th>Id</th>
                        <!-- <th>Teacher Name</th> -->
                        <th>Book Name</th>
                        <th>File Name</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        <?php
                            if($result){
                                while($row=mysqli_fetch_assoc($result)){
                                    // $id = $row['t_id'];
                                    // $sql = "SELECT `name` FROM `teacher` Where id=$id";
                                    // $result = mysqli_query($conn,$sql);
                                    // $teacher = mysqli_fetch_array($result);
                                    // <td>".$teacher['name']."</td>
                                    $b_id = $row['b_id'];
                                    $sql2="SELECT * FROM `book` WHERE b_id = $b_id";
                                    $result2=mysqli_query($conn,$sql2);
                                    $row2=mysqli_fetch_array($result2);
                                    echo "<tr>
                                            <td>".$row['n_id']."</td>
                                            <td>".$row2['b_name']."</td>
                                            <td>".$row['note']."</td>
                                            <td><a href='delete_note_admin.php?n_id=".$row['n_id']."'><button type='button' class='btn btn-outline-danger'><i class='fa-solid fa-trash'></i></button></td>
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
