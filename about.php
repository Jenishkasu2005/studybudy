<?php
    ob_start();
    session_start();
    include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/head_image.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">

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
    <link rel="stylesheet" href="css/form.css">

    <title>About Us</title>
    
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
            color: #4950a7; 
        }

        .parallax {
            background-image: url("images/bg3.jpg");
            min-height: 150px; 
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            filter: blur(3px);
            -webkit-filter: blur(3px);
        }

        .main-img{
            border: 2px solid black;
            height: 350px;
            width: auto;
            border-radius: 18% 52% 73% 52%;
            filter: drop-shadow(-2px 18px 20px black);
        }

        .head{
            /* color: #ff5200e0; */
            color: #ae78bd;
        }

        h2,h3{
            color: #3a55b5cf;
        }

        h6{
            color: #bd8229e0;
        }

        /* .second h6{
            color: #ff5200e0;
        } */

        .second:nth-child(even) {
            color: #ff5200e0;
        }

        /* .card{
            border: 1px solid black;
            box-shadow: 0px 0px 12px 2px;
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
        } */

        .map-container{
            width: 100%;
        }

        hr {
            background-color: #555;
            border: none;
            display: block;
            height: 4px;
            overflow: visible;
            position: relative;
            width: 100%;
        }

        hr:before {
            background-color: #f90;
            content: '';
            display: block;
            height: 8px;
            left: 0;
            position: absolute;
            top: -2px;
            width: 35%;
            z-index: 1;
        }

        .col-lg-3 > h4{
            font-weight: 700;
            font-family: Century Gothic;
            color: #5151bd;
        }

    </style>


    <!-- FAQ Styles  -->
    <style>

        h1 {
            text-align: center;
        }

        .one {
            list-style: none;
            padding: 0;
        }

        .one .inner {
            /* padding-left: 1em; */
            overflow: hidden;
            display: none;
        }

        .one .two {
            margin: 0.5em 0;
        }

        .one .two a.toggle {
            display: block;
            background: rgba(0, 0, 0, 0.78);
            color: #fefefe;
            padding: 0.75em 0.75em;
            border-radius: 0.15em;
            transition: background 0.3s ease;
        }

        .one .two a.toggle:hover {
            background: rgba(0, 0, 0, 0.9);
        }

        .accordion{
            border: 2px solid black;
            padding: 0.5em;
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

    <div class="parallax">
    </div>
    <h1 class="heading">About Us</h1>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <img src="images/bg1.jpg" alt="" class="main-img" data-aos="fade-up" data-aos-duration="1000">
            </div>
            <div class="col-md-6">
                <h5 class="head" data-aos="fade-right" data-aos-duration="1000">ABOUT</h5>
                <h2 data-aos="fade-right" data-aos-duration="1000" data-aos-delay="100">Learn New Skills to go ahead for Your Career</h2>
                <h6 data-aos="fade-right" data-aos-duration="1000" data-aos-delay="200">Are you still not able to get top grades despite hard work throughout the semester?
                    Are you still running for subject notes till the exams are around the corner? 
                    Well there is a stop to all your problems.
                </h6>
                <h6 data-aos="fade-right" data-aos-duration="1000" data-aos-delay="300">We at StudyBuddy provide dedicated subject notes for the students of BBA, BCA, BCOM, BA streams and 
                    cover subjects like accounting & finance, english, politics, etc. 
                    Our courseware is designed by highly qualified and richly experienced professors.
                </h6>
                <h3 data-aos="fade-right" data-aos-duration="1000" data-aos-delay="100">A place where you can achieve</h3>
                <h6 data-aos="fade-right" data-aos-duration="1000" data-aos-delay="100">The current academic pattern demands for smart work along with hard work.</h6>
            </div>
        </div><br><br>
    </div>

    <div class="container">
        <div class="row">
            <?php
                include ('connection.php');
                $sql = "SELECT * FROM about_us_content";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($result)){
                    ?>
                    <div class="col-lg-3">
                        <h4 data-aos="fade-right" data-aos-duration="1000"><?php echo $row['title']?></h4>
                        <hr data-aos="fade-right" data-aos-duration="1000">
                        <h6 data-aos="fade-right" data-aos-duration="1000"><?php echo $row['description']?>
                        </h6>
                    </div>
                    <?php
                }
            ?>
    </div><br><br>

    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mt-3">FAQ's</h1>
                <?php
                    include ('connection.php');
                    $sql = "SELECT * FROM about_us_faq";
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_array($result)){
                    ?>
                        <ul class="accordion one">
                            <li class="two">
                                <a class="toggle"><?php echo $row['question']?></a>
                                <p class="inner">
                                    <?php echo $row['answer']?>
                                </p>
                            </li>
                        </ul>
                    <?php
                    }
                ?>
            </div>
        </div>
    </div><br><br>
 

    <!-- FAQ Script start -->
    <script>
        $('.toggle').click(function(e) {
            e.preventDefault();
        
            let $this = $(this);
        
            if ($this.next().hasClass('show')) {
                $this.next().removeClass('show');
                $this.next().slideUp(350);
            } else {
                $this.parent().parent().find('li .inner').removeClass('show');
                $this.parent().parent().find('li .inner').slideUp(350);
                $this.next().toggleClass('show');
                $this.next().slideToggle(350);
            }
        });
    </script>
    <!-- FAQ Script End -->

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