<?php
    ob_start();
    session_start();
    include('connection.php');
    if(!isset($_SESSION['id'])){
        header("Location:/StudyBuddy/");
    }
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
    
    <link rel="stylesheet" href="css/fake_loader.css">
    <script src="js/fake_loader.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- <link rel="stylesheet" href="css/form.css">     -->

    <title>Change Password</title>
    
    <style>
        body{
            background-image: url('images/cr18.jpg');
        }
    
        .form{
            max-width: 350px;
            /* border: 2px solid #00000038; */
        }

        .main{
            width: 80%;
        }

        .error{
            color: red;
            font-family: monospace;
        }
    </style>

    <script>
        function validate(){
            var c_pass = document.getElementById("c_pass");
            var n_pass = document.getElementById("n_pass");
            var cn_pass = document.getElementById("cn_pass");

            var cpassError = document.getElementById('cpassError');
            var npassError = document.getElementById('npassError');
            var cnpassError = document.getElementById('cnpassError');

            cpassError.textContent = "";
            npassError.textContent = "";
            cnpassError.textContent = "";

            if(c_pass.value == ""){
                // alert("Please Enter Current Password");
                cpassError.textContent = "Enter Your Current Password";
                c_pass.focus();
                return false;
            }
            else if(n_pass.value == ""){
                // alert("Please Enter New Password");
                npassError.textContent = "Enter Your New Password";
                n_pass.focus();
                return false;
            }
            else if(cn_pass.value == ""){
                // alert("Please Enter Confirm Password");
                cnpassError.textContent = "Enter Your Confirm Password";
                cn_pass.focus();
                return false;
            }
            else if(cn_pass.value != n_pass.value){
                // alert("Please Enter Same Password");
                cnpassError.textContent = "Enter Same as New Password";
                cn_pass.focus();
                return false;
            }
            else{
                true;
            }
        }
    </script>
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

    <div class="container main mt-5">
        <h3 class="text-center">Change Password</h3>
        <form class="form mx-auto pt-3" method="post">
            <div class="form-group">
                <label for="c_pass">Current Password </label>
                <input type="password" class="form-control" name="c_pass" id="c_pass" placeholder="Enter Current Password">
                <span id="cpassError" class="error"></span>
            </div>

            <div class="form-group">
                <label for="n_pass">New Password</label>
                <input type="password" class="form-control" name="n_pass" id="n_pass" placeholder="Enter New Password">
                <span id="npassError" class="error"></span>
            </div>

            <div class="form-group">
                <label for="cn_pass">Confirm Password </label>
                <input type="password" class="form-control" name="cn_pass" id="cn_pass" placeholder="Enter Confirm Password">
                <span id="cnpassError" class="error"></span>
            </div>
    
            <div class="form-group">
                <button name="submit" onclick="return validate();" class="btn btn-outline-primary" >Submit</button>
            </div>
        </form> 
    </div>
    

    <!-- Footer start-->

    <?php
        include('footer.php');
    ?>

    <!-- Footer end -->
</body>

</html>

<?php
    
        if(isset($_POST['submit'])){
            if(isset($_SESSION['id'])){
                $id = $_SESSION['id'];
                // echo $id; exit;
                $c_pass = $_POST['c_pass'];
                $n_pass = $_POST['n_pass'];
                $cn_pass = $_POST['cn_pass'];

                // $main = "SELECT `pass` FROM `reg_user` WHERE `pass` =". $c_pass ."AND `id` =". $_SESSION['id']."" ;
                $main = "SELECT * FROM `reg_user` WHERE `pass` = '$c_pass' AND `id` = $id" ;
                $main_result = mysqli_query($conn,$main);
                $row = mysqli_fetch_array($main_result);
                $count = mysqli_num_rows($main_result);
                // echo $count; exit;
                if($count == 0){
                    echo "<script>alert('Please Enter Correct Password');</script>";
                }
                else{
                    // print_r($row); exit;
                    if($row['pass'] == $c_pass && $row['id'] == $id ){
                        $sql = "UPDATE `reg_user` SET `pass`= '$n_pass' WHERE `id` = $id";
                        $result = mysqli_query($conn,$sql);
                    }

                    if($result){
                        ?>
                        <script>
                            alert("Password Updated...");
                        </script>
                    <?php
                        header('Location: /StudyBuddy/');
                    }
                }
                
            }
        }
?>