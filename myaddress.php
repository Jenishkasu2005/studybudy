<?php
    ob_start();
    session_start();
    include('connection.php');
    if(!isset($_SESSION['id'])){
        header("Location:/StudyBuddy/");
    }
    if(isset($_GET['checkout'])){
        $validate = $_GET['checkout'];
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
    <!-- <link rel="stylesheet" href="css/form.css"> -->

    <title>My Address</title>
    
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

        .box{
            border: 2px solid #00000038;
            background-color: #a5c1c596;  
            transition: .5s; 
        }

        .box:hover{
            border: 2px solid black;
            cursor: pointer;
        }

        .error{
            color: red;
            font-family: monospace;
        }

    </style>

    <script>
        function validate(){
            var address = document.getElementById("address");
            var landamrk = document.getElementById("landmark");
            var pincode = document.getElementById("pincode");
            var city = document.getElementById("txtcity");

            var addressError = document.getElementById('addressError');
            var landmarkError = document.getElementById('landmarkError');
            var pincodeError = document.getElementById('pincodeError');
            var cityError = document.getElementById('cityError');

            addressError.textContent = "";
            landmarkError.textContent = "";
            pincodeError.textContent = "";
            cityError.textContent = "";

            if(address.value == "")
            {
                // alert("Please Enter Your Address");
                addressError.textContent = "Enter Your Address";
                address.focus();
                return false;
            }
            else if(landmark.value == "")
            {
                // alert("Please Enter Your Landmark");
                landmarkError.textContent = "Enter Your Landmark";
                landmark.focus();
                return false;
            }
            else if(pincode.value == "")
            {
                // alert("Please Enter Your Pincode");
                pincodeError.textContent = "Enter Your Pincode";
                pincode.focus();
                return false;
            }
            else if(pincode.value.length < 6)
            {
                // alert("Please Enter 6 Digits Only");
                pincodeError.textContent = "Enter Enter 6 Digits Only";
                pincode.focus();
                return false;
            }
            else if(city.value == "")
            {
                // alert("Please Select Your City");
                cityError.textContent = "Enter Your City";
                city.focus();
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
        <div class="row">
            <div class="col-md-6">
                <h1 class="text-center">Add Address</h1>
                    <?php
                        if(isset($_POST["btnsubmit"])){
                            $address = $_POST["txtaddress"];
                            $landmark = $_POST["txtlandmark"];
                            $pincode = $_POST["txtpincode"];
                            $city = $_POST["txtcity"];
                            $userid= $_SESSION["id"];

                            
                            // echo $validate; exit;
                            
                            $result = mysqli_query($conn,"INSERT INTO `address`(`uid`, `address`, `landmark`, `pincode`, `city`) VALUES ('$userid','$address','$landmark','$pincode','$city')")or die(mysqli_error($conn));

                            if($result==true)
                            {
                                if($validate == 'validate')
                                {
                                    echo "<script>alert('Address Added Successfully');</script>";
                                    header('Location: checkout.php?success=success');
                                }
                                else{
                                    echo "<script>alert('Address Added Successfully');</script>";
                                }
                            }
                        }
                    ?>  
                <form class="form mx-auto p-3" method="post">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="txtaddress" id="address" placeholder="Enter Address">
                        <span id="addressError" class="error"></span>
                    </div>
                    <div class="form-group">
                        <label for="landmark">Landmark</label>
                        <input type="text" class="form-control" name="txtlandmark" id="landmark" placeholder="Enter Landmark">
                        <span id="landmarkError" class="error"></span>
                    </div>
                    <div class="form-group">
                        <label for="pincode">Pincode</label>
                        <input type="text" class="form-control" name="txtpincode" id="pincode" placeholder="Enter Pincode" maxlength="6">
                        <span id="pincodeError" class="error"></span>
                    </div>
                    <div class="form-group">
                        <label for="txtcity">City</label>
                        <input type="text" class="form-control" name="txtcity" id="txtcity" placeholder="Enter City">
                        <span id="cityError" class="error"></span>
                    </div>
            
                    <div class="form-group">
                        <button name="btnsubmit" onclick="return validate();" class="btn btn-outline-primary">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="login-content mt-5">
                     <h4 class="text-center">My Address</h4>
                     <div class="grid mt-3">
                         <?php
                         if(isset($_GET["a_id"]))
                         {
                            $a_id = $_GET["a_id"];
                            $result = mysqli_query($conn,"delete from address where a_id='$a_id'")or die(mysqli_error($conn));
                            if(isset($_GET['checkout'])){
                                echo"<script>window.location='myaddress.php?checkout=validate';</script>";
                            }
                            else{
                                echo"<script>window.location='myaddress.php';</script>";
                            }
                            
                         }
                        //session
                        $userid= $_SESSION["id"];
                        $result = mysqli_query($conn,"select * from address where `uid` = ".$userid." order by a_id desc")or die(mysqli_error($conn));
                        while($row=mysqli_fetch_assoc($result))
                        {
                        ?>
                         
                        <div class="text-center box text-primary mt-3" style="padding:10px">
                            
                            <h3> <?php echo $row["address"] ?> </h3>
                            <h4> <?php echo $row["landmark"] ?> </h4>
                            <h5> 
                                <?php echo $row["pincode"] ?>,
                                <?php echo $row["city"] ?>.
                            </h5>
                            <?php
                                if(isset($_GET['checkout'])){
                            ?>
                            <a href="?a_id=<?php echo $row["a_id"] ?>&checkout=validate" class="btn btn-outline-danger mt-2">Delete</a>
                            <?php
                                }
                                else{
                                    ?>
                                    <a href="?a_id=<?php echo $row["a_id"] ?>" class="btn btn-outline-danger mt-2">Delete</a>
                                    <?php
                                }
                            ?>
                    </div>

                     <?php } ?>
                 </div>
            </div>
        </div>
    </div>

    

    <!-- Footer start-->
    <?php
        include('footer.php');
    ?>
    

    <!-- Footer end -->
</body>

</html>