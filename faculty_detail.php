<?php
    // session_start();
    include('connection.php');

    if(!isset($_GET['id'])){
        header("Location:faculty_main.php");  
    }

    $id=$_GET["id"];
    $sql="SELECT * FROM `teacher` WHERE id='$id'";
    $result=mysqli_query($conn,$sql);
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

    <title>Faculty</title>

    <style>

        body{
            background-image: url('images/cr18.jpg');
        }

        .photo{
            border: 2px solid black;
            border-radius: 10px;
        }

        h2{
            color: black;
            font-family: math;
        }

        h2{
            color: #0000008f;
        }   

        .parallax {
            background-image: url("images/fbg.jpg");
            min-height: 150px; 
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            filter: blur(3px);
            -webkit-filter: blur(3px);
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

    <div class="parallax"></div>
    <h1 class="heading">⩙ Faculty Details ⩙</h1>

    <div class="container my-5">
        <div class="row">
            <?php
                if($result){
                    $row=mysqli_fetch_array($result)?>
                    <div class="col-md-6 my-4">
                        <img src="teacher_images/<?php echo $row['image'];?>" class="mx-auto d-block photo" alt="Image" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="100">
                    </div>
                    <div class="col-md-6 my-4">
                        <h2 data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100"><?php echo $row['name'];?> <br> <span style="color: #3329d7bf;"> [ <?php echo $row['degree'];?> ]</span></h2>
                        <!-- <h5>Details</h5> -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="200">
                                    <div class="card-header text-center bg-info text-white">
                                        <i class="fa-solid fa-city"></i> &nbsp;College
                                    </div>
                                    <li class="list-group-item text-center"><?php echo $row['college'];?></li>
                                </div>
                            </div>
                            <div class="col-sm-4 my-2">
                                <div class="card" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="300">
                                    <div class="card-header text-center bg-primary text-white">
                                        <i class="fa-solid fa-book"></i> &nbsp;Course
                                    </div>
                                    <li class="list-group-item text-center"><?php echo $row['course'];?></li>
                                </div>
                            </div>

                            <div class="col-sm-4 my-2">
                                <div class="card" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="400">
                                    <div class="card-header text-center bg-secondary text-white">
                                        <i class="fa-solid fa-calendar-days"></i> &nbsp;Experience
                                    </div>
                                    <li class="list-group-item text-center"><?php echo $row['exp'];?></li>
                                </div>
                            </div>
                            <div class="col-sm-4 my-2">
                                <div class="card" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="500">
                                    <div class="card-header text-center bg-success text-white">
                                        Subject
                                    </div>
                                    <li class="list-group-item text-center"><?php echo $row['subject'];?></li>
                                </div>
                            </div>

                            <div class="col-md-6 my-2">
                                <div class="card" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100">
                                    <div class="card-header text-center bg-dark text-white">
                                        <i class="fa-solid fa-address-card"></i> &nbsp; Email
                                    </div>
                                    <li class="list-group-item text-center">info@studybuddy.com</li>
                                </div>
                            </div>

                            <div class="col-md-6 my-2">
                                <div class="card" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100">
                                    <div class="card-header text-center bg-warning text-white">
                                        <i class="fa-solid fa-phone"></i> &nbsp; Phone
                                    </div>
                                    <li class="list-group-item text-center">+91 90999 90960</li>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php
                }
            ?>
        </div>
    </div>

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