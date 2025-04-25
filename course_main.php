<?php
    include('connection.php');

    $sql="SELECT * FROM `course`";
    $result=mysqli_query($conn,$sql);

    $qry = "SELECT count(course) as ct, c.c_id, c.c_name FROM `book` b, `course` c WHERE b.course=c.c_id GROUP by b.course";
    $results=mysqli_query($conn,$qry);
    while($rows=mysqli_fetch_assoc($results)){
        $cid[$rows['c_id']] = $rows['ct'];
    }

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

    <title>Courses</title>
    <style>

        body{
            background-image: url('images/cr18.jpg');
        }

        .course{
            mix-blend-mode: difference;
            width: 218px;
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


    <div class="container">
        <div class="row">
            <?php
                if($result){
                    while($row=mysqli_fetch_array($result)){
                        if (!array_key_exists($row['c_id'], $cid)){
                            $cid[$row['c_id']] = 0;
                        }
                        ?>
                        <div class="col-md-3">
                            <a href="course_book.php?c_id=<?php echo $row['c_id'];?>">
                                <img src="course_images/<?php echo $row['c_img'];?>" class="mx-auto d-block course" alt="Image" data-aos="fade-down" data-aos-duration="1000">    
                            </a>
                            <div class="text-center">
                                <h3 data-aos="fade-up" data-aos-duration="1000"><?php echo $row['c_name'];?></h3><br>
                                <p data-aos="fade-up" data-aos-duration="1000"><?php echo $cid[$row['c_id']];?> Books</p><br>
                            </div>
                        </div>
                        <?php
                    }
                }
           ?>
        </div>
    </div>

    <hr>

    <!-- Footer start-->

    <?php
        include('footer.php');
    ?>

    <!-- Footer end -->

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
		AOS.init({
			easing: 'ease-out-back',
			duration: 1000
		});
    </script>

</body>
</html>