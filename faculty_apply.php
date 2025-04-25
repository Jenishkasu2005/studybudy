<?php 
    ob_start();
    session_start();
    include('connection.php');
    if(!isset($_SESSION['t_id'])){
        ?>
            <script>
                alert("Please Login First");
            </script>
        <?php
        header('Location: login1.php');
    }
    if(isset($_POST['submit'])){

        $name = $_POST["name"];
        $u_id = $_SESSION["t_id"];
        $email = $_POST["email"];
        $mno = $_POST["mno"];
        $subject = $_POST["subject"];
        $msg = $_POST["msg"];
        $status = "Rejected";

        $sql="INSERT INTO `faculty_apply`(`u_id`,`name`, `email`, `mno`, `subject`, `msg`,`status`) VALUES ('$u_id','$name','$email','$mno','$subject','$msg','$status')";
        $result = mysqli_query($conn,$sql);
        if($result){
            ?>
            <script>
                alert("Form Submitted Successfully...");
            </script>
            <?php
            unset($_SESSION["teacher"]);
            header("Location:index.php");
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

    <title>Faculty Apply</title>
    
    <!-- form style -->
    <style>

        .title {
            font-size: 24px;
            font-weight: 600;
            text-align: center;
        }

        .form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
        }

        .group {
            position: relative;
        }

        .form .group label {
            font-size: 14px;
            color: rgb(99, 102, 102);
            position: absolute;
            top: -10px;
            left: 10px;
            background-color: #fff;
            transition: all .3s ease;
        }

        .form .group input,
        .form .group textarea {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
            outline: 0;
            width: 100%;
            background-color: transparent;
        }

        .form .group input:placeholder-shown+label,
        .form .group textarea:placeholder-shown+label {
            top: 10px;
            background-color: transparent;
        }

        .form .group input:focus,
        .form .group textarea:focus {
            border-color: #3366cc;
        }

        .form .group input:focus+label,
        .form .group textarea:focus+label {
            top: -10px;
            left: 10px;
            /* background-color: #fff; */
            color: #3366cc;
            font-weight: 600;
            font-size: 14px;
        }

        .form .group textarea {
            resize: none;
            height: 100px;
        }

        .form button {
            background-color: #3366cc;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .form button:hover {
            background-color: #27408b;
        }
    </style>

    <style>

        body{
            background-image: url('images/cr18.jpg');
        }

        .main{
            width: 50%;
        }

        h1{
            font-family: "Poppins", sans-serif;
            font-size: 40px;
            font-weight: bolder;
        }

        .heading{
            position: absolute;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 42px;
            font-weight: 700;
            color: white; 
        }

        .parallax {
            background-image: url("images/cbg.jpg");
            min-height: 150px; 
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            filter: blur(3px);
            -webkit-filter: blur(3px);
        }

        .detail{
            width: 80%;
        }

        .error{
            color: red;
            font-family: monospace;
        }
    </style>

    <script>
        function validate(){
            var name = document.getElementById("name");
            var email = document.getElementById("email");
            var mno = document.getElementById("mno");
            var subject = document.getElementById("subject");
            var msg = document.getElementById("msg");
            var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

            var nameError = document.getElementById('nameError');
            var emailError = document.getElementById('emailError');
            var mnoError = document.getElementById('mnoError');
            var subjectError = document.getElementById('subjectError');
            var msgError = document.getElementById('msgError');

            nameError.textContent = "";
            emailError.textContent = "";
            mnoError.textContent = "";
            subjectError.textContent = "";
            msgError.textContent = "";

            if(name.value==""){
                // alert("Please Enter Your Name");
                nameError.textContent = "Name is required";
                name.focus();
                return false;
            }
            else if(email.value==""){
                // alert("Please Enter Your Email");
                emailError.textContent = "Email Address is required";
                email.focus();
                return false;
            }
            else if(!(emailRegex.test(email.value)))
			{
				// alert("Please Enter Email In Valid Formate");
                emailError.textContent = "Enter Email In Valid Format";
                email.focus();
				return false;
			}
            else if(mno.value.length < 10){
                // alert("Mobile No can't be Less Then 10 Digits");
                mnoError.textContent = "Mobile No can't be Less Then 10 Digits";
                mno.focus();
				return false;
            }
            else if(subject.value==""){
                // alert("Please Enter Your Subject");
                mnoError.textContent = "Enter Your Subject";
                subject.focus();
                return false;
            }
            else if(msg.value==""){
                // alert("Please Enter Your Experience,College Name, etc.");
                mnoError.textContent = "Please Enter Your Experience,College Name, etc.";
                msg.focus();
                return false;
            }
            else{
                return true;
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

    <div class="parallax">
    </div>
    <h1 class="heading">Application Form For Faculty</h1>

    <section class="mt-5">
        <h1 class="text-center">Become a Faculty</h1>
        <p class="text-center">Provide precise subject notes & training to your students, offer smart learning programs,<br> and get known with online presence.</p>
        <div class="container my-5 main">
            <form class="form" method="POST">
                <div class="row pt-3">
                    <div class="col-md-6">
                        <div class="group">
                            <input placeholder="" type="text" required="" name="name" id="name">
                            <label for="name">Full Name</label>
                            <span id="nameError" class="error"></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="group">
                            <input placeholder="" type="email" id="email" name="email" required="">
                            <label for="email">Email</label>
                            <span id="emailError" class="error"></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="group">
                            <input placeholder="" type="text" id="mno" name="mno" required="" maxlength="10">
                            <label for="mno">Phone</label>
                            <span id="mnoError" class="error"></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="group">
                            <input placeholder="" type="text" id="subject" name="subject" required="">
                            <label for="subject">Subject</label>
                            <span id="subjectError" class="error"></span>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="group">
                            <input placeholder="" type="text" id="msg" name="msg" title="Enter College Name Or Course Name" >
                            <label for="msg">Message</label>
                            <span id="msgError" class="error"></span>
                        </div>
                    </div>
                </div>
                <button type="submit" class="mb-3" name="submit" onclick="return validate();">Submit</button>
            </form>
        </div>
    </section>

    <div class="container detail">
        <table class="table my-5 text-center">
            <thead>
                <h1 class="text-center">Details</h1>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mo. No.</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // include "connection.php";
                    $id = $_SESSION['t_id'];
                    $sql="SELECT * FROM `faculty_apply` WHERE u_id = $id";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            echo"<tr>
                                <td>".$row['name']."</th>
                                <td>".$row['email']."</td>
                                <td>".$row['mno']."</td>
                                <td>".$row['subject']."</td>
                                <td>".$row['msg']."</td>
                                <td>".$row['status']."</td>
                            </tr>";
                        }
                    }
                ?>
                
            </tbody>
        </table>
    </div>

    <!-- Footer start-->

    <?php
        include('footer.php');
    ?>

    <!-- Footer end -->
</body>

</html>