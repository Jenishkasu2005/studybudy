<?php
    session_start();
    $message="";
    if(isset($_POST['submit'])) {
        include('connection.php');

        $sql="SELECT * FROM reg_user WHERE email='". $_POST["email"] ."'and pass='". $_POST["pass"]."'";
        $result = mysqli_query($conn,$sql);
        $check  = mysqli_fetch_array($result);
        if(!is_array($check)) {
            $message = "Invalid Username Or Password";
        }
        else{
            $_SESSION["teacher"] = $check['type'];
            header("Location:faculty_apply.php");
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

    <title>Login</title>
    
    <style>

        body{
            background-image: url('images/cr13.jpg');
        }

        .form{
            max-width: 350px;
        }
    </style>

    <script>
		function validate()
		{
			var email=document.getElementById("email");
			var pass=document.getElementById("pass");
            var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
			
			if(email.value=="")
			{
				alert("Please Enter Your Email Address");
                email.focus();
				return false;
			}
            else if(!(emailRegex.test(email.value)))
			{
				alert("Please Enter Email In Valid Format");
                email.focus();
				return false;
			}
		    else if(pass.value=="")
			{
				alert("Password can't be null");
                pass.focus();
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
        
    <form class="form mx-auto my-5" method="POST">
        <p class="title">Login </p>
        <p class="message">SignIn now and get full access to our app. </p>
        <p class="message"><?php if($message!="") { echo $message; } ?></p>

        <label>
            <input required="" placeholder="" type="email" class="input" name="email" id="email">
            <span>Email</span>
        </label> 
            
        <label>
            <input required="" placeholder="" type="password" class="input" name="pass" id="pass">
            <span>Password</span>
    </label>

        <button class="submit" type="submit" name="submit" onclick="return validate();">Submit</button>
        <div class="signin">
            <p>Forgot Password ? <a href="forgot_pass.php">Click Here</a></p>
            <p>Don't have an acount ? <a href="regi.php">SignUp</a></p>
        </div>
        
    </form>

    <!-- Form End -->

    <!-- Footer start-->

    <?php
        include('footer.php');
    ?>

    <!-- Footer end -->
</body>

</html>