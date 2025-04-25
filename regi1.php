<?php
error_reporting(E_ERROR);
include('connection.php');

if (isset($_POST['submit'])) {
    $fname = trim($_POST["fname"]);
    $lname = trim($_POST["lname"]);
    $mno = trim($_POST["mno"]);
    $dob = trim($_POST["dob"]);
    $city = trim($_POST["city"]);
    $zip = trim($_POST["zip"]);
    $email = trim($_POST["email"]);
    $pass = trim($_POST["pass"]);
    $cpass = trim($_POST["cpass"]);
    $scode = trim($_POST["scode"]);
    $type = trim($_POST['u_type']);

    // Validate Age (Server-Side)
    $dobDate = new DateTime($dob);
    $today = new DateTime();
    $age = $today->diff($dobDate)->y;

    if ($age < 7) {
        echo "<script>alert('You must be at least 7 years old to register.'); window.history.back();</script>";
        exit;
    }

    // Check if email exists
    $email_find = "SELECT * FROM `reg_user` WHERE `email` = ?";
    $stmt = $conn->prepare($email_find);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $email_find_run = $stmt->get_result();

    if ($email_find_run->num_rows > 0) {
        echo "<script>alert('Please enter a unique email address.'); window.history.back();</script>";
        exit;
    }

    // Check if secret code exists
    $scode_find = "SELECT * FROM `reg_user` WHERE `scode` = ?";
    $stmt = $conn->prepare($scode_find);
    $stmt->bind_param("s", $scode);
    $stmt->execute();
    $scode_find_run = $stmt->get_result();

    if ($scode_find_run->num_rows > 0) {
        echo "<script>alert('Please enter a unique secret code.'); window.history.back();</script>";
        exit;
    }

    // Validate Password Match
    if ($pass !== $cpass) {
        echo "<script>alert('Passwords do not match!'); window.history.back();</script>";
        exit;
    }

    // Insert Data
    $sql = "INSERT INTO `reg_user`(`fname`, `lname`, `mno`, `dob`, `city`, `zip`, `email`, `pass`, `scode`, `type`)  
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssss", $fname, $lname, $mno, $dob, $city, $zip, $email, $pass, $scode, $type);
    $result = $stmt->execute();

    if ($result) {
        header("Location: login1.php");
        exit;
    } else {
        echo "<script>alert('Registration failed. Please try again.'); window.history.back();</script>";
    }
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

    <link rel="stylesheet" href="css/form.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->

    <title>Registration</title>
    
    <style>
        body{
            background-image: url('images/cr13.jpg');
        }

        .one{
            padding: 5px;
        }

        .error{
            color: red;
            font-family: monospace;
        }
    </style>

<script>
    function validate() {
        var fname = document.getElementById("fname");
        var lname = document.getElementById("lname");
        var mno = document.getElementById("mno");
        var dob = document.getElementById("datepicker").value;
        var city = document.getElementById("city");
        var zip = document.getElementById("zip");
        var email = document.getElementById("email");
        var pass = document.getElementById("pass");
        var cpass = document.getElementById("cpass");
        var scode = document.getElementById("scode");
        var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

        var dobDate = new Date(dob);
        var today = new Date();
        var age = today.getFullYear() - dobDate.getFullYear();
        var monthDiff = today.getMonth() - dobDate.getMonth();
        
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dobDate.getDate())) {
            age--;
        }

        // Validate Age
        if (dob === "" || age < 7) {
            alert("You must be at least 7 years old to register.");
            return false;
        }

        // Validate First Name
        if (fname.value.trim() === "") {
            alert("Please enter your First Name.");
            fname.focus();
            return false;
        }

        // Validate Last Name
        if (lname.value.trim() === "") {
            alert("Please enter your Last Name.");
            lname.focus();
            return false;
        }

        // Validate Mobile Number
        if (mno.value.trim() === "" || mno.value.length < 10 || isNaN(mno.value)) {
            alert("Please enter a valid 10-digit Mobile Number.");
            mno.focus();
            return false;
        }

        // Validate City
        if (city.value.trim() === "") {
            alert("Please enter your City.");
            city.focus();
            return false;
        }

        // Validate ZIP Code
        if (zip.value.trim() === "" || zip.value.length < 6 || isNaN(zip.value)) {
            alert("Please enter a valid 6-digit ZIP Code.");
            zip.focus();
            return false;
        }

        // Validate Email
        if (email.value.trim() === "" || !emailRegex.test(email.value)) {
            alert("Please enter a valid Email Address.");
            email.focus();
            return false;
        }

        // Validate Password
        if (pass.value.trim() === "") {
            alert("Please enter a Password.");
            pass.focus();
            return false;
        }

        // Validate Confirm Password
        if (cpass.value.trim() === "") {
            alert("Please confirm your Password.");
            cpass.focus();
            return false;
        }

        // Check if Passwords Match
        if (pass.value !== cpass.value) {
            alert("Passwords do not match. Please try again.");
            cpass.focus();
            return false;
        }

        // Validate Secret Code
        if (scode.value.trim() === "") {
            alert("Please enter a Secret Code.");
            scode.focus();
            return false;
        }

        // Validate User Type Selection
        var radios = document.getElementsByName("u_type");
        var isValid = false;
        for (var i = 0; i < radios.length; i++) {
            if (radios[i].checked) {
                isValid = true;
                break;
            }
        }

        if (!isValid) {
            alert("Please select a User Type.");
            return false;
        }

        return true; // Allow form submission if all validations pass
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

    <!-- Form Start -->

    <div class="one">
        <form class="form mx-auto my-5" method="POST">
            <p class="title">Register </p>
            <p class="message">Signup now and get full access to our website. </p>
            
            
            <div class="flex">
                <span id="firstnameError" class="error"></span>
                <span id="lastnameError" class="error"></span>
            </div>
            
            <!-- <label><span id="firstnameError" class="error"></span></label> -->
            <div class="flex">
                <label>
                    <input required="" placeholder="" type="text" class="input" name="fname" id="fname">
                    <span>First Name</span>
                </label>
                
                <label>
                    <input required="" placeholder="" type="text" class="input" name="lname" id="lname">
                    <span>Last Name</span>
                </label>
            </div>  

            <span id="mnoError" class="error"></span>
            <label>
                <input required="" placeholder="" type="text" class="input" name="mno" id="mno" maxlength="10">
                <span>Mobile No</span>
            </label>

            <span id="dobError" class="error"></span>
            <label>
                <input required="" placeholder="" type="date" class="input" name="dob" id="datepicker" >
                <span>DOB</span>
            </label>

            <span id="cityError" class="error"></span>
            <label>
                <input required="" placeholder="" type="text" class="input" name="city" id="city">
                <span>City</span>
            </label>

            <span id="zipError" class="error"></span>
            <label>
                <input required="" placeholder="" type="text" class="input" name="zip" id="zip" maxlength="6">
                <span>ZIP</span>
            </label>
                   
            <span id="emailError" class="error"></span>
            <label>
                <input required="" placeholder="" type="text" class="input" name="email" id="email">
                <span>Email</span>
            </label> 
                
            <span id="passError" class="error"></span>
            <label>
                <input required="" placeholder="" type="password" class="input" name="pass" id="pass">
                <span>Password</span>
            </label>

            <span id="cpassError" class="error"></span>
            <label>
                <input required="" placeholder="" type="password" class="input" name="cpass" id="cpass">
                <span>Confirm password</span>
            </label>

            <span id="scodeError" class="error"></span>
            <label>
                <input required="" placeholder="" type="password" class="input" name="scode" id="scode">
                <span>S CODE</span>
            </label>

            <span id="utypeError" class="error"></span>
            <div class="form-check">
                <span>User Type : </span>&nbsp;
                <input type="radio" name="u_type" id="User" value="User">
                <label for="User">User</label> &nbsp;

                <input type="radio" name="u_type" id="Teacher" value="Teacher">
                <label for="Teacher">Teacher</label><br>
            </div>

            <button class="submit" name="submit" onclick="return validate();">Submit</button>
            <p class="signin">Already have an account ? <a href="login1.php">Signin</a> </p>
        </form>
    </div>

    <!-- Form End -->

    <!-- Footer start-->

    <?php
        include('footer.php');
    ?>

    <!-- Footer end -->
</body>

</html>
