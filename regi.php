<?php
    error_reporting(E_ERROR);
    if(isset($_POST['submit'])){
        include('connection.php');

        $fname=$_POST["fname"];
        $lname=$_POST["lname"];
        $mno=$_POST["mno"];
        $dob=$_POST["dob"];
        $city=$_POST["city"];
        $zip=$_POST["zip"];
        $email=$_POST["email"];
        $pass=$_POST["pass"];
        $scode=$_POST["scode"];
        $type = "Teacher";

        $email_find = "SELECT * from `reg_user` WHERE `email` = '$email'";
        $email_find_run = mysqli_query($conn,$email_find);
        $email_count = mysqli_num_rows($email_find_run);

        $scode_find = "SELECT * from `reg_user` WHERE `scode` = '$scode'";
        $scode_find_run = mysqli_query($conn,$scode_find);
        $scode_count = mysqli_num_rows($scode_find_run);

        if($email_count == 1){
            echo "<script>alert('Please Enter Unique Email Address');</script>";
        }
        else if($scode_count == 1){
            echo "<script>alert('Please Enter Unique Secret Code');</script>";
        }
        else{
            $sql = "INSERT INTO `reg_user`(`fname`, `lname`, `mno`, `dob`, `city`, `zip`, `email`, `pass`, `scode`,`type`)  VALUES ('$fname','$lname','$mno','$dob','$city',$zip,'$email','$pass','$scode','$type')";
            $result=mysqli_query($conn,$sql);

            if($result){
                header("Location:login.php");
            }
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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <title>Registration</title>
    
    <style>
        body{
            background-image: url('images/cr13.jpg');
        }

        .one{
            padding: 5px;
        }
    </style>

    <script>
		function validate()
		{
			var fname=document.getElementById("fname");
			var lname=document.getElementById("lname");
			var mno=document.getElementById("mno");
			var dob=document.getElementById("datepicker");
            var city=document.getElementById("city");
            var zip=document.getElementById("zip");
            var email=document.getElementById("email");
            var pass=document.getElementById("pass");
            var scode=document.getElementById("scode");
            var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
			
			if(fname.value=="")
			{
				alert("First name can't be null");
                fname.focus();
				return false;
			}
			else if(lname.value=="")
			{
				alert("Last name can't be null");
                lname.focus();
				return false;
			}
			else if(mno.value=="")
			{
				alert("Mobile No can't be null");
                mno.focus();
				return false;
			}
            else if(mno.value.length < 10){
                alert("Mobile No can't be Less Then 10 Digits");
                mno.focus();
				return false;
            }
			else if(dob.value=="")
			{
				alert("Date of Birth can't be null");
                dob.focus();
				return false;
			}
            else if(city.value=="")
			{
				alert("City can't be null");
                city.focus();
				return false;
			}
            else if(zip.value=="")
			{
				alert("Zipcode can't be null");
                zip.focus();
				return false;
			}
            else if(zip.value.length < 6){
                alert("Zipcode can't be Less Then 6 Digits");
                zip.focus();
				return false;
            }
            else if(email.value=="")
			{
				alert("E-mail can't be null");
                email.focus();
				return false;
			}
            else if(!(emailRegex.test(email.value)))
			{
				alert("Please Enter Email In Valid Formate");
                email.focus();
				return false;
			}
            else if(pass.value=="")
			{
				alert("Password can't be null");
                pass.focus();
				return false;
			}
            else if(cpass.value=="")
			{
				alert("Confirm Password can't be null");
                cpass.focus();
				return false;
			}
            else if(scode.value=="")
			{
				alert("Please Enter Secret code");
                scode.focus();
				return false;
			}
			else
			{
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

    <!-- Form Start -->

    <div class="one">
        <form class="form mx-auto my-5" method="POST">
            <p class="title">Register </p>
            <p class="message">Signup now and get full access to our website. </p>
            <div class="flex">
                <label>
                    <input required="" placeholder="" type="text" class="input" name="fname" id="fname">
                    <span>Firstname</span>
                </label>

                <label>
                    <input required="" placeholder="" type="text" class="input" name="lname" id="lname">
                    <span>Lastname</span>
                </label>
            </div>  

            <label>
                <input required="" placeholder="" type="text" class="input" name="mno" id="mno" maxlength="10">
                <span>Mobile No</span>
            </label>

            <label>
                <input required="" placeholder="" type="text" class="input" name="dob" id="datepicker" >
                <span>DOB</span>
            </label>

            <label>
                <input required="" placeholder="" type="text" class="input" name="city" id="city">
                <span>City</span>
            </label>

            <label>
                <input required="" placeholder="" type="text" class="input" name="zip" id="zip" maxlength="6">
                <span>ZIP</span>
            </label>
                    
            <label>
                <input required="" placeholder="" type="text" class="input" name="email" id="email">
                <span>Email</span>
            </label> 
                
            <label>
                <input required="" placeholder="" type="password" class="input" name="pass" id="pass">
                <span>Password</span>
            </label>

            <label>
                <input required="" placeholder="" type="password" class="input" name="cpass" id="cpass">
                <span>Confirm password</span>
            </label>

            <label>
                <input required="" placeholder="" type="password" class="input" name="scode" id="scode">
                <span>S CODE</span>
            </label>

            <button class="submit" name="submit" onclick="return validate();">Submit</button>
            <p class="signin">Already have an account ? <a href="login.php">Signin</a> </p>
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
<script>
    $( function() {
        $( "#datepicker" ).datepicker({
            dateFormat: 'dd-mm-yy'
        });
    });
</script>