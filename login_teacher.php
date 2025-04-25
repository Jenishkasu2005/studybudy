<html>
  
<head>
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

    <title>Login | Teacher</title>

  <style>

    body{
        background-image: url('images/cr24.jpg');
        background-size: cover;
    }

    .form{
        max-width: 350px;
        /* margin-top: 12%; */
    }

    .error{
        color: red;
        font-family: monospace;
    }
  </style>

  <script>
		function validate()
		{
			var uname=document.getElementById("uname");
			var pass=document.getElementById("pass");
			
			var unameError = document.getElementById('unameError');
            var passError = document.getElementById('passError');

            unameError.textContent = "";
            passError.textContent = "";
			
			if(uname.value=="")
			{
				// alert("Username can't be null");
                unameError.textContent = "Username is required";
                uname.focus();
				return false;
			}
		    else if(pass.value==""){
				// alert("Password can't be null");
                passError.textContent = "Password can't be null";
                pass.focus();
				return false;
			}
			else{
				true;
			}
		}
	</script>

</head>

<?php
    session_start();
    $message="";
    error_reporting(E_ERROR);
    if(count($_POST)>0) {
        include('connection.php');

        $sql = "SELECT `id`,`uname`, `pass` FROM teacher WHERE uname='". $_POST["uname"] ."'and pass='". $_POST["pass"]."'";
        $result = mysqli_query($conn,$sql);
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
            $_SESSION["teacher_id"] = $row['id'];
            $_SESSION["uname"] = $row['uname'];  
        } else {
           $message = "Invalid Username or Password!";
        }
    }
    if(isset($_SESSION["teacher_id"])) {
        header("Location:teacher_detail.php");
    }
?>

<body>
    <?php   
        include('fake_loader.php');
    ?>

    <form class="form mx-auto" method="POST">
        <p class="title my-4">Teacher Login</p>
        <p class="message"><?php if($message!="") { echo $message; } ?></p>

        <label>
            <input required="" placeholder="" type="text" class="input" name="uname" id="uname">
            <span>Username</span>
        </label>
        <span id="unameError" class="error"></span>
            
        <label>
            <input required="" placeholder="" type="password" class="input" name="pass" id="pass">
            <span>Password</span>
        </label>
        <span id="passError" class="error"></span>

        <button class="submit my-3" name="submit"  onclick="return validate();">Submit</button>
    </form>
</body>

</html>