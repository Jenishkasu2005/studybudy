<?php
    // session_start();
    ob_start();
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="final";

    $conn=mysqli_connect($servername,$username,$password);
    if(!$conn)
    {
        die("Not Connected" . mysqli_connect_error());
    }

    $db=mysqli_select_db($conn,$dbname);
    if(!$conn)
    {
        die("Not Connected" . mysqli_connect_error());
    }

    $sql="SELECT * FROM `teacher` limit 3";
    $result=mysqli_query($conn,$sql);

    $sqll="SELECT * FROM `book` limit 3";
    $resultt=mysqli_query($conn,$sqll);

    $sqlll = "SELECT * FROM `course`";
    $resulttt = mysqli_query($conn,$sqlll);
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

    <title>StudyBuddy</title>
    <style>

        body{
            background-image: url('images/cr18.jpg');
        }

        #myVideo {
            position: relative;
            right: 0;
            bottom: 0;
            max-width: 100%;
            max-height: 100%;
            filter: blur(3px);
        }

        #center {
            text-align: center;
        }

        .photo{
            height: 270px;
            width: 200px;
        }

        h4 {
            word-wrap: break-word;
        }

        .box {
            width: 700px;
        }

        #logo1 {
            height: 100px;
            width: 120px;
        }

        #apply {
            height: 300px;
            width: 533px;
        }

        .carousel-control-next-icon {
            background-image: url(images/r-arrow.png);
            height: 50px;
            width: 50px;
        }

        .carousel-control-prev-icon {
            background-image: url(images/l-arrow.png);
            height: 50px;
            width: 50px;
        }

        .review{
            background-image: url('images/cr17.jpg');
            min-height: 250px; 
            min-width: 100%; 
            background-attachment: fixed;
        }

        .review h4{
            color: black;
            font-family: Lucida Calligraphy;
        }

        .review h5{
            color: #3a55b5cf;
        }

        .review p{
            color: #0000ffbf;
        }

        .head > p{
            color: #ff5200e0;
            font-family: Lucida Handwriting;
            font-weight: bold;
            font-size: larger;
        }

        .head h2{
            color: #ae78bd;
            font-family: Lucida Handwriting;
        }

        .head h1{
            color: #ae78bd;
            font-family: Lucida Handwriting;
        }

        .book img{
            border: 3px solid black;
            border-radius: 5px;
        }

        #center h3{
            color: #2532cfb0;
            font-family: Century Gothic;
        }

        #center p{
            color: #ff4700ba;
            font-family: Century Gothic;
            font-weight: bold;
            font-size: larger;
        }

        .professor img{
            border: 3px solid black;
            border-radius: 5px;
            height: 270px;
            width: 250px;
        }

        #center h4{
            color: #2532cfb0;
            font-family: Century Gothic;
        }

        .last1{
            background-image: url('images/cr23.jpg');
            min-height: 300px; 
            min-width: 533px; 
            background-attachment: fixed;
        }

        .last2{
            background-image: url('images/contact.jpg');
            min-height: 300px; 
            min-width: 533px; 
            background-attachment: fixed;
        }

        .btn{
            font-family: Century Gothic;
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

    <video autoplay muted loop id="myVideo">
        <source src="video/book.mp4" type="video/mp4">
    </video><br>

    <!-- subject start -->

    <div class="container my-5">
        <div class="head">
            <p>DISCOVER SUBJECTS</p>
            <h2>Our Popular Subjects</h2>
        </div><br><br>
        <div class="row">
            <?php
                while($rows=mysqli_fetch_array($resulttt)){
                    $cr[$rows['c_id']] = $rows['c_name'];
                }
                if($result){
                    while($row=mysqli_fetch_array($resultt)){ ?>
                        <div class="col-md-4 my-3">
                            <div class="container book">
                                <a href="book_detail.php?b_id=<?php echo $row['b_id']?>"> <img src="book_images/<?php echo $row['b_img'];?>" 
                                    class="mx-auto d-block photo" alt="Image" width="200" data-aos="fade-up" data-aos-anchor-placement="bottom-center" data-aos-delay="200" data-aos-duration="1000">
                                </a><br><br>
                            </div>
                            <div id="center" data-aos="fade-down" data-aos-anchor-placement="bottom-center" data-aos-delay="200" data-aos-duration="1000"><br>
                                <h3><?php echo $row['b_name'];?></h3>
                                <p>Course : <span><?php echo $cr[$row['course']];?></span></p>
                            </div>
                        </div>
                    <?php
                    }
                }
            ?>
            
        </div><br>
        <div id="center">
            <a href="book_main.php"><button class="btn btn-outline-primary" style="font-family: Ravie;">View More</button></a>
        </div>
    </div>

    <!-- subject end  -->

    <!-- professors start -->

    <div class="container">
        <div class="head text-center">
            <p data-aos="fade-down" data-aos-anchor-placement="bottom-center" data-aos-delay="200" data-aos-duration="1000">EXPERIENCED & SMART</p>
            <h1 style="color: #0008ff91;" data-aos="fade-down" data-aos-anchor-placement="bottom-center" data-aos-delay="300" data-aos-duration="1000">Meet our Professors</h1>
            <p style="font-family: cursive;" data-aos="fade-down" data-aos-anchor-placement="bottom-center" data-aos-delay="400" data-aos-duration="1000">Highly experienced teachers dedicate to providing the best learning in
                their expertise <br>through detailed subject notes, online classrooms, and tutorials.</p>
        </div><br>
        <div class="row">
            <?php
                if($result){
                    while($row=mysqli_fetch_array($result)){ ?>
                        <div class="col-md-4 my-4 ">
                            <div class="container professor">
                                <a href="faculty_detail.php?id=<?php echo $row['id']?>"><img src="teacher_images/<?php echo $row["image"];?>" 
                                    class="mx-auto d-block photo" alt="Image" data-aos="fade-down" data-aos-anchor-placement="bottom-center" data-aos-delay="200" data-aos-duration="1000">
                                </a><br>
                            </div>
                            <div class="details" id="center" data-aos="zoom-out-up" data-aos-anchor-placement="bottom-center" data-aos-delay="200" data-aos-duration="1000"><br>
                                <h4><?php echo $row["name"];?></h4>
                                <p><?php echo $row["degree"];?></p>
                            </div>
                        </div>
                    <?php
                    }
                }
            ?>
        </div><br>
        <div id="center">
            <a href="faculty_main.php"><button class="btn btn-outline-primary" style="font-family: Ravie;">View More</button></a>
        </div><br><br>
    </div>

    <!-- professors end -->

    <!-- feedback start -->

    <div class="container review">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <h1 class="text-center pt-3" style="color: #3a581a; font-family: Castellar;">REVIEWS</h1><br><br>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="box mx-auto">
                        <div class="text-center">
                            <h4>“One of the most trusted and praised spot for Online Material.”</h4>
                            <div class="float-md-right mt-3">
                                <h5>vandan dholakiya</h5>
                                <p>Vivekanand college.. <br> BCA College</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="box mx-auto">
                        <div class="text-center">
                            <h4>“I have reched at perfect place that have all kind of educational materials and
                                courses available on click. I found true treasure.”</h4>
                            <div class="float-md-right mt-3">
                                <h5>Jenish Kasodariya</h5>
                                <p>Vivekanand college..</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="box mx-auto">
                        <div class="text-center">
                            <h4>“I can only say that this is final destination for those who are serching for free
                                online
                                educational material.”</h4>
                            <div class="float-md-right mt-3">
                                <h5>Karan sheladiya</h5>
                                <p>Vivekanand college..</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="box mx-auto">
                        <div class="text-center">
                            <h4>“"I have reached the perfect place that has all kinds of educational materials and 
                                courses available at a click. I have found a true treasure!"”</h4>
                            <div class="float-md-right mt-3">
                                <h5>Ravi Viradiya</h5>
                                <p>Vivekanand college..</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div><br>

    <!-- feedback end  -->

    <!-- offer start -->
    <div class="container md-5">
        <div class="text-center">
            <p style="color: #845ec2;">MAKE CONNECTIONS</p>
            <h2 style="color: #22668d;">What We Offer For Growth</h2>
        </div><br><br>
        <div class="row">
            <div class="col-md-4 my-4 ">
                <div class="card " style="width: 18rem;" data-aos="fade-down" data-aos-anchor-placement="bottom-center" data-aos-duration="1000" data-aos-delay="100">
                    <div class="card-body text-center">
                        <img src="images/logo1.png" alt="" id="logo1"><br><br>
                        <div>
                            <h5>Request video classrooms</h5><br>
                            <p>With on-demand subject training classrooms</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-4">
                <div class="card " style="width: 18rem;" data-aos="fade-down" data-aos-anchor-placement="bottom-center" data-aos-duration="1000" data-aos-delay="200">
                    <div class="card-body text-center">
                        <img src="images/logo1.png" alt="" id="logo1"><br><br>
                        <div>
                            <h5>Earn a Certificate</h5><br>
                            <p>Certificate of acknowledgement on subject learning</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-4">
                <div class="card " style="width: 18rem;" data-aos="fade-down" data-aos-anchor-placement="bottom-center" data-aos-duration="1000" data-aos-delay="300">
                    <div class="card-body text-center">
                        <img src="images/logo1.png" alt="" id="logo1"><br><br>
                        <div>
                            <h5>Practice mock Tests</h5><br>
                            <p>Give online exams to track your preparation</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>

    <!-- offer end  -->

    <!-- apply now  start-->

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h1>Become a Faculty</h1>
                <h6>Provide precise subject notes & training to your students, offer smart learning programs, and get
                    known with online presence.</h6>
                <a href="faculty_apply.php"><button class="btn btn-outline-secondary my-3"><i class="fa-solid fa-circle-plus"></i> Apply Now</button></a>
            </div>
            <div class="col-lg-6 last1">
            </div>
        </div>
    </div>

    <div class="container ">
        <div class="row">
            <div class="col-lg-6 last2">
            </div>
            <div class="col-lg-6">
                <h1>Integrate with us</h1>
                <h6>Any individual professors or college authorities can collaborate with us to be a part of this
                    initiative, and to offer help.</h6>
                <a href="contact.php"><button class="btn btn-outline-secondary my-3"><i class="fa-solid fa-circle-plus"></i> Contact Us</button></a>
            </div>
        </div>
    </div>

    <!-- apply now end-->

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