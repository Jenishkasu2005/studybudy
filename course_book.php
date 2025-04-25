<?php
    ob_start();
    error_reporting(E_ERROR);
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    include('connection.php');

    if(!isset($_GET['c_id'])){
        header("Location:course_main.php");  
    }
    $course = $_GET['c_id'];
    $sql="SELECT * FROM `book` where course=$course";

    $result=mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
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

    <title>Course | Books</title>
    
    <style>

        body{
            background-image: url('images/cr18.jpg');
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

    

    <div class="container my-5">
        <div class="row">
            <?php
                if($count == 0){
                    echo "<h1>Sorryyyy... We Don't Have Book Like $b_name </h1>";
                }
                else{
                    if($result){
                        while($row=mysqli_fetch_array($result)){ ?>
                            <div class="col-sm-4 my-4">
                                <a href="book_detail.php?b_id=<?php echo $row['b_id']?>">
                                    <img src="book_images/<?php echo $row['b_img'];?>" class="mx-auto d-block" alt="Image" height="250" width="200" data-aos="fade-down" data-aos-duration="1000">
                                </a><br><br>
                                <h3 class="text-center" data-aos="fade-up" data-aos-duration="1000"><?php echo $row['b_name'];?></h3>
                            </div>
                        <?php
                        }
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