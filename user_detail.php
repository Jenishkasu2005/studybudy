<?php
    ob_start();
    session_start();
    include('connection.php');
    if(!isset($_SESSION['id'])){
        header("Location:/StudyBuddy/");
    }

    // if(isset($_SESSION["t_id"])){
    //     $id = $_SESSION['t_id'];
    // }
    // else{
        $id=$_SESSION['id'];
    // }

    $sql="SELECT * FROM `reg_user` WHERE id='$id'";
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

        <title>Profile</title>

        <style>

            body{
                background-image: url('images/cr18.jpg');
            }

            .main{
                background: linear-gradient(45deg, #58535396, #0095ff63);
                border: 10px solid #00dcff;
                border-radius: 20px;
                height: 470px;
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

        </style>
    </head>

    <body>

        <?php 
            include('fake_loader.php');
        ?>

        <!-- navbar start -->

        <?php
            include('navbar.php');
        ?>

        <!-- navbar end -->

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
                        <form action="user_detail.php" method="POST">
                            <div class="form-group">
                                <label for="fname">First Name</label>
                                <input type="text" value="<?php echo $row['fname'];?>" class="form-control" name="fname" id="fname" placeholder="First Name" required>
                            </div>

                            <div class="form-group">
                                <label for="lname">Last Name</label>
                                <input type="text" value="<?php echo $row['lname'];?>" class="form-control" name="lname" id="lname" placeholder="Last Name" required>
                            </div>

                            <div class="form-group">
                                <label for="mno">Mobile No.</label>
                                <input type="text" value="<?php echo $row['mno'];?>" class="form-control" name="mno" id="mno" placeholder="Mobile No." required>
                            </div>

                            <div class="form-group">
                                <label for="dob">DOB</label>
                                <input type="date" value="<?php echo $row['dob'];?>" class="form-control" name="dob" id="dob" placeholder="DOB" required>
                            </div>

                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" value="<?php echo $row['city'];?>" class="form-control" name="city" id="city" placeholder="City" required>
                            </div>

                            <div class="form-group">
                                <label for="zip">ZIP</label>
                                <input type="number" value="<?php echo $row['zip'];?>" class="form-control" name="zip" id="zip" placeholder="ZIP" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="mail" value="<?php echo $row['email'];?>" class="form-control" name="email" id="email" placeholder="Email" required>
                            </div>

                            <!-- <div class="form-group">
                                <label for="pass">Password</label>
                                <input type="password" value="<?php echo $row['pass'];?>" class="form-control" name="pass" id="pass" placeholder="Password" required>
                            </div>

                            <div class="form-group">
                                <label for="scode">Secret Code</label>
                                <input type="password" value="<?php echo $row['scode'];?>" class="form-control" name="scode" id="scode" placeholder="Secret Code" required>
                            </div> -->

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="upload">Save changes</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container main my-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="box">
                        <img class="mx-auto d-flex my-3" src="https://img.icons8.com/bubbles/100/000000/user.png" alt="">
                        <button type="button" class="btn btn-primary mx-auto d-flex" data-toggle="modal" data-target="#exampleModal">
                            Update Profile
                        </button>
                        <a href="logout_user.php" style="text-decoration: none;"><button class="btn btn-danger my-4 d-block mx-auto" title="Logout">Logout</button></a>
                    </div>
                </div>
                <div class="col-md-8 my-4">
                    <h1>Profile</h1>
                    <hr>
                    <div class="container">
                        <div class="row">                    
                            <div class="col-md-6">
                                <h4>First Name</h4>
                                <h5><?php echo $row['fname'];?></h5>
                            </div>
                            <div class="col-md-6">
                                <h4>Last Name</h4>
                                <h5><?php echo $row['lname'];?></h5>
                            </div>
                            <div class="col-md-6">
                                <h4>Mobile No.</h4>
                                <h5><?php echo $row['mno'];?></h5>
                            </div>
                            <div class="col-md-6">
                                <h4>Date Of Birth</h4>
                                <h5><?php echo date('d-m-Y',strtotime($row['dob']));?></h5>
                            </div>
                            <div class="col-md-6">
                                <h4>City</h4>
                                <h5><?php echo $row['city'];?></h5>
                            </div>
                            <div class="col-md-6">
                                <h4>ZIP</h4>
                                <h5><?php echo $row['zip'];?></h5>
                            </div>
                            <div class="col-md-12">
                                <h4>Email</h4>
                                <h5><?php echo $row['email'];?></h5>
                            </div>
                            <!-- <div class="col-md-6">
                                <h4>Password</h4>
                                <h5><?php echo $row['pass'];?></h5>
                            </div>
                            <div class="col-md-6">
                                <h4>Secret Code</h4>
                                <h5><?php echo $row['scode'];?></h5>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer start-->

        <?php
            include('footer.php');
        ?>

        <!-- Footer end -->

        <?php
         if(isset($_POST['upload'])){

            $fname=$_POST["fname"];
            $lname=$_POST["lname"];
            $mno=$_POST["mno"];
            $dob=$_POST["dob"];
            $city=$_POST["city"];
            $zip=$_POST["zip"];
            $email=$_POST["email"];
            $pass=$_POST["pass"];
            $scode=$_POST["scode"];

            $record = "UPDATE `reg_user` SET `fname`='$fname',`lname`='$lname',`mno`='$mno',`dob`='$dob',`city`='$city',`zip`='$zip',`email`='$email',`pass`='$pass',`scode`='$scode' WHERE id =  $id";

            $update = mysqli_query($conn,$record);

            if($update){
                ?>
                    <script>
                        alert("Profile Updated Successfully...");
                        window.location.href="user_detail.php";
                    </script>
                <?php
            }
         }
        ?>
    </body>
</html>