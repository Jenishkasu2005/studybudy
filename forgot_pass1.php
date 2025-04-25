<?php
    session_start();
    $message="";
    error_reporting(E_ERROR);
    if(count($_POST)>0) {
        include('connection.php');

        $one = "SELECT `email`,`scode` FROM reg_user WHERE email='". $_POST["email"] ."' and scode='". $_POST["scode"] ."'";
        $oneR = mysqli_query($conn,$one);
        $row  = mysqli_fetch_assoc($oneR);
        if($row['email'] == $_POST["email"] && $row['scode'] == $_POST["scode"])
        {
          $sql = "UPDATE reg_user SET pass='".$_POST['pass']."' WHERE email='". $_POST["email"]."' and scode='". $_POST["scode"]."'";
          $result = mysqli_query($conn,$sql);
          if(array_key_exists('submit',$_POST))
          {
            header('Location:login1.php');
          }
        }else{
          $message = "Invalid Username or Secret Code!";
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

    <title>Forgot Password</title>
    
    <style>
        body{
            background-image: url('images/cr13.jpg');
        }
        .form{
            max-width: 350px;
        }

        .error{
            color: red;
            font-family: monospace;
        }
        </style>

    <script>
		function validate()
		{
			var email=document.getElementById("email");
            var scode=document.getElementById("scode");
			var pass=document.getElementById("pass");
            var cpass=document.getElementById("cpass");
            var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

            var emailError = document.getElementById('emailError');
            var scodeError = document.getElementById('scodeError');
            var passError = document.getElementById('passError');
            var confirmpassError = document.getElementById('confirmpassError');

            emailError.textContent = "";
            scodeError.textContent = "";
            passError.textContent = "";
            confirmpassError.textContent = "";
			
			if(email.value=="")
			{
				// alert("Please Enter Your Email Address");
                emailError.textContent = "E-mail is required";
                email.focus();
				return false;
			}
            else if(!(emailRegex.test(email.value)))
			{
				// alert("Please Enter Email In Valid Formate");
                emailError.textContent = "Enter Email In Valid Formate";
                email.focus();
				return false;
			}
            else if(scode.value=="")
			{
				// alert("Please Enter Your Secrete Code");
                scodeError.textContent = "Enter Your Secrete Code";
                scode.focus();
				return false;
			}
		    else if(pass.value=="")
			{
				// alert("Please Enter Your Password");
                passError.textContent = "Enter Your Password";
                pass.focus();
				return false;
			}
            else if(cpass.value == ""){
                confirmpassError.textContent = "Enter Confirm Password";
                cpass.focus();
				return false;
            }
            else if(cpass.value!=pass.value)
			{
				// alert("Please Enter Same Password");
                confirmpassError.textContent = "Enter Same Password";
                cpass.focus();
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

    <form class="form mx-auto my-4" method="POST">
        <p class="title">Forgot Password</p>
        <p class="message"><?php if($message!="") { echo $message; } ?></p>

        <label>
            <input required="" placeholder="" type="email" class="input" name="email" id="email">
            <span>Email</span>
        </label>
        <span id="emailError" class="error"></span>

        <label>
            <input required="" placeholder="" type="password" class="input" name="scode" id="scode">
            <span>S CODE</span>
        </label>
        <span id="scodeError" class="error"></span>
            
        <label>
            <input required="" placeholder="" type="password" class="input" name="pass" id="pass">
            <span>Password</span>
        </label>
        <span id="passError" class="error"></span>

        <label>
            <input required="" placeholder="" type="password" class="input" name="cpass" id="cpass">
            <span>Confirm Password</span>
        </label>
        <span id="confirmpassError" class="error"></span>

        <button class="submit my-3" name="submit" onclick="return validate();">Submit</button>
    </form>

    <!-- Footer start-->

    <?php
        include('footer.php');
    ?>

    <!-- Footer end -->
</body>

</html>
