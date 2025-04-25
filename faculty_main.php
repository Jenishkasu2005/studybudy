<?php
    // session_start();
    include('connection.php');

    $sql="SELECT * FROM `teacher`";
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
            height: 200px;
            width: 200px;
            transition: 1s;
            border-radius: 10px;
            border: 2px solid black;
        }

         .container{
            overflow: hidden;
            cursor: pointer;
        }

        .container img:hover{
            box-shadow: 0 10px 20px 0 rgba(0,0,0,0.2);
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
    <h1 class="heading">⩙ Our Faculties ⩙</h1>

    <div class="container my-5">
        <div class="row">
            <?php
                if($result){
                    while($row=mysqli_fetch_array($result)){ ?>
                        <div class="col-sm-4 my-5">
                            <div class="container">
                                <a href="faculty_detail.php?id=<?php echo $row['id']?>">
                                    <img src="teacher_images/<?php echo $row["image"];?>" class="mx-auto d-block photo" alt="Image" data-aos="fade-down" data-aos-duration="1000">
                                </a><br>
                            </div>
                            <h4 class="text-center" data-aos="fade-down" data-aos-duration="1000"> <?php echo $row["name"];?></h4>
                            <h6 class="text-center" data-aos="fade-down" data-aos-duration="1000"><?php echo $row["degree"];?></h6>
                        </div>
                    <?php
                    }
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