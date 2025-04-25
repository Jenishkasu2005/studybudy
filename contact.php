<?php 
    ob_start();
    // if(isset($_POST['submit'])){
    //     include('connection.php');

    //     $name = $_POST["name"];
    //     $email = $_POST["email"];
    //     $cmt = $_POST["comment"];
    //     $status = "Unsolve";

    //     $sql="INSERT INTO `inquiry`(`name`, `email`, `cmt`,`status`) VALUES('$name','$email','$cmt','$status')";
    //     $result = mysqli_query($conn,$sql);
    //     if($result){
    //         header("Location:index.php");
    //     }
    // }
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/head_image.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/main.css">

    <!-- animation start -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- animation end -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="css/fake_loader.css">
    <script src="js/fake_loader.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>

    <title>Contact Us</title>
    <style>

        body{
            background-image: url('images/cr18.jpg');
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

        .card{
            border: 1px solid black;
            box-shadow: 0px 0px 12px 2px;
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

        .icon{
            padding: 20px;
            font-size: 70px;
            transition: 2s;
        }

        .icon:hover{
            background-color: #7700ffa1;
            border-radius: 50%;
            border: 2px solid black;
        }

        /* .img-box{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            height: 350px;
            width: 433px;
        } */

        .img-box img{
            border: 2px solid black;
            height: 350px;
            width: auto;
            border-radius: 18% 52% 73% 52%;
            filter: drop-shadow(-2px 18px 20px black);
        }

        .map{
            width: 80%;
        }

        i{
            color: black;
        }

        h3{
            color: black;
        }

        .error{
            color: red;
            font-family: monospace;
        }
        
    </style>

    <!-- form style -->
    <style>
        .card {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            width: 350px;
            display: flex;
            flex-direction: column;
            }

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

            .form .group input:placeholder-shown+ label, .form .group textarea:placeholder-shown +label {
            top: 10px;
            background-color: transparent;
            }

            .form .group input:focus,
            .form .group textarea:focus {
            border-color: #3366cc;
            }

            .form .group input:focus+ label, .form .group textarea:focus +label {
            top: -10px;
            left: 10px;
            background-color: #fff;
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
        .block-title__image {
            background-image: url(images/logo1.png);
            background-size: 100%;
            width: 70px;
            height: 70px;
            background-position: center center;
            background-repeat: no-repeat;
        }
    </style>

    <script>
        function validate(){
            var name = document.getElementById("name");
            var email = document.getElementById("email");
            var cmt = document.getElementById("comment");
            var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

            let nameError = document.getElementById('nameError');
            let emailError = document.getElementById('emailError');
            let commentError = document.getElementById('commentError');

            nameError.textContent = "";
            emailError.textContent = "";
            commentError.textContent = "";

            if(name.value==""){
                // alert("Please Enter Your Name");
                nameError.textContent = "Name is required";
                name.focus();
                return false;
            }
            else if(email.value==""){
                // alert("Please Enter Your Email");
                emailError.textContent = "Enter Your Email";
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
            else if(cmt.value==""){
                // alert("Please Enter Your Comment/Suggestions");
                commentError.textContent = "Enter Your Comment/Suggestions";
                cmt.focus();
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
    <h1 class="heading">Contact Us</h1>

    <!-- contact section start -->

    

    <section class="contact-two">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-5">
                    <div class="contact-two__image">
                        <div class="contact-two__image-bubble-1"></div>
                        <div class="contact-two__image-bubble-2"></div>
                        <div class="contact-two__image-bubble-3"></div>
                        <img src="images/c4.png" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
                    <div class="contact-two__content">
                        <div class="block-title">
                            <div class="block-title__image"></div>
                            <p>Contact now</p>
                            <h3>Leave Us A Comment</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                    
                    <form method="post" class="contact-one__form contact-form-validated">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php
                                    if(isset($_POST["submit"]))
                                    {
                                        include('connection.php');
                                
                                        $name = $_POST["name"];
                                        $email = $_POST["email"];
                                        $cmt = $_POST["comment"];
                                        $status = "Unsolve";
                                
                                        $sql="INSERT INTO `inquiry`(`name`, `email`, `cmt`,`status`) VALUES('$name','$email','$cmt','$status')";
                                        $result = mysqli_query($conn,$sql);

                                        if($result == true)
                                        {
                                            echo '
                                            <div class="alert alert-success alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <p>Data inserted successfully!</p>
                                            </div>';
                                        }
                                        else
                                        {
                                            echo '
                                            <div class="alert alert-dangure alert-dismissible" width="100%">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <h5><i class="icon fas fa-check"></i> Success!</h5>
                                                Data not inserted!
                                            </div>';
                                        }
                                    }                 
                                    
                                ?>
                            </div>
                            <div class="col-lg-12">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                                <span id="nameError" class="error"></span>
                            </div>
                            <div class="col-lg-12">
                                <input type="email" name="email"  class="form-control" id="email" placeholder="Email">
                                <span id="emailError" class="error"></span>
                            </div>
                            <div class="col-lg-12">
                                <textarea id="comment" name="comment" rows="5" placeholder="Comment"></textarea>
                                <span id="commentError" class="error"></span>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" name="submit" onclick="return validate();" id="submit" class="thm-btn">Send Comment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-4 my-3" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="200">
                <div class="card mx-auto">
                <a href="#" class="nav-link p-0"><a href="mailto:info@studybuddy.com"><div class="text-center mt-5"><i class="fa-solid fa-envelope icon"></i></div></a>
                    <div class="card-body">
                        <div class="text-center">
                            <h3 class="mt-4">Email</h3>
                            <p>info@studybuddy.com</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 my-3" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="300">
                <div class="card mx-auto">
                <div class="text-center mt-5"><i class="fa-solid fa-map-location-dot icon"></i></div></a>
                    <div class="card-body">
                        <div class="text-center">
                            <h3 class="mt-4">Location</h3>
                            <p>Vivekanand college,olpad Road,olpad, Surat, Gujarat 395009</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 my-3" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="400">
                <div class="card mx-auto">
                <a href="#" class="nav-link p-0"><a href="tel:+91 90999 90960"><div class="text-center mt-5"><i class="fa-solid fa-phone icon"></i></div></a>
                    <div class="card-body">
                        <div class="text-center">
                            <h3 class="mt-4">Call</h3>
                            <p>+91 90999 90960</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container map">
<iframe 
    src="https://www.google.com/maps?q=Olpad+Rd,+near+Jakat+Naka,+Jahangir+Pura,+Surat,+Gujarat+395005&hl=en&z=15&output=embed" 
    width="100%" 
    height="450" 
    style="border:0;" 
    allowfullscreen="" 
    loading="lazy">
</iframe>
</div>

    <!-- contact section end -->

    <!-- Footer start-->

    <?php
        include('footer.php');
    ?>

    <!-- Footer end -->

    <!-- for animation Start -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
		AOS.init({
			easing: 'ease-out-back',
			duration: 1000
		});
    </script>
    <!-- for Animation End -->

</body>

</html>