<?php
    session_start();
    if(!isset($_SESSION["admin_id"]))
    {
      echo "<script>window.location='login_admin.php';</script>";
    }
?>

<?php
    include('connection.php');

    $teacher_sql="SELECT count(*) as `tc`  FROM `teacher`";
    $teacher_result=mysqli_query($conn,$teacher_sql);
    $teacher_row = mysqli_fetch_assoc($teacher_result);

    $book_sql="SELECT count(*) as `tc`  FROM `book`";
    $book_result=mysqli_query($conn,$book_sql);
    $book_row = mysqli_fetch_assoc($book_result);

    $course_sql="SELECT count(*) as `tc`  FROM `course`";
    $course_result=mysqli_query($conn,$course_sql);
    $course_row = mysqli_fetch_assoc($course_result);

    $user_sql="SELECT count(*) as `tc`  FROM `reg_user`";
    $user_result=mysqli_query($conn,$user_sql);
    $user_row = mysqli_fetch_assoc($user_result);

    $inquiry_sql="SELECT count(*) as `tc`  FROM `inquiry`";
    $inquiry_result=mysqli_query($conn,$inquiry_sql);
    $inquiry_row = mysqli_fetch_assoc($inquiry_result);

    $order_sql="SELECT count(*) as `tc`  FROM `order`";
    $order_result=mysqli_query($conn,$order_sql);
    $order_row = mysqli_fetch_assoc($order_result);

    $faculty_apply_sql="SELECT count(*) as `tc`  FROM `faculty_apply`";
    $faculty_apply_result=mysqli_query($conn,$faculty_apply_sql);
    $faculty_apply_row = mysqli_fetch_assoc($faculty_apply_result);

    $about_us_content_sql="SELECT count(*) as `tc`  FROM `about_us_content`";
    $about_us_content_result=mysqli_query($conn,$about_us_content_sql);
    $about_us_content_row = mysqli_fetch_assoc($about_us_content_result);

    $about_us_faq_sql="SELECT count(*) as `tc`  FROM `about_us_faq`";
    $about_us_faq_result=mysqli_query($conn,$about_us_faq_sql);
    $about_us_faq_row = mysqli_fetch_assoc($about_us_faq_result);

    $book_note_sql="SELECT count(*) as `tc`  FROM `book_note`";
    $book_note_result=mysqli_query($conn,$book_note_sql);
    $book_note_row = mysqli_fetch_assoc($book_note_result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php');?>
    <style>
        
        #header_menu{
            padding-left: 0px;
        }

        .content{
            height: 70px;
            width: 230px
        }
        
        .one, .two, .three, .four, .five, .six, .seven, .eight, .nine, .ten{
            /* border-radius: 100px 39px 100px 39px; */
            border-radius: 80px 40px 80px 40px;
        }
    </style>
</head>
<body>
    <?php   
        include('fake_loader.php');
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3" id="header_menu">
                <?php include('header.php');?>
            </div>
            <div class="col-md-9 my-5">
                <div class="row">

                    <div class="col-md-3 p-4 m-4 bg-warning text-center one" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                        <h3 class="text-white"><b>Orders</b></h3>
                        <h2 class="text-white"><b><?php echo $order_row['tc'];?></b></h2>
                    </div>

                    <div class="col-md-3 p-4 m-4 bg-primary text-center two" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <h3 class="text-white"><b>Books</b></h3>
                        <h2 class="text-white"><b><?php echo $book_row['tc'];?></b></h2>
                    </div>

                    <div class="col-md-3 p-4 m-4 bg-success text-center three" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                        <h3 class="text-white"><b>Users</b></h3>
                        <h2 class="text-white"><b><?php echo $user_row['tc'];?></b></h2>
                    </div>

                    <div class="col-md-3 p-4 m-4 bg-secondary text-center four" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                        <h3 class="text-white"><b>Courses</b></h3>
                        <h2 class="text-white"><b><?php echo $course_row['tc'];?></b></h2>
                    </div>

                    <div class="col-md-3 p-4 m-4 bg-danger text-center five" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
                        <h3 class="text-white"><b>Inquiry</b></h3>
                        <h2 class="text-white"><b><?php echo $inquiry_row['tc'];?></b></h2>
                    </div>

                    <div class="col-md-3 p-4 m-4 bg-info text-center six" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                        <h3 class="text-white"><b>Teachers</b></h3>
                        <h2 class="text-white"><b><?php echo $teacher_row['tc'];?></b></h2>
                    </div>

                    <div class="col-md-3 p-4 m-4 bg-success text-center seven" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="700">
                        <h3 class="text-white"><b>Apllications</b></h3>
                        <h2 class="text-white"><b><?php echo $faculty_apply_row['tc'];?></b></h2>
                    </div>

                    <div class="col-md-3 p-4 m-4 bg-primary text-center eight" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
                        <h3 class="text-white"><b>Contents</b></h3>
                        <h2 class="text-white"><b><?php echo $about_us_content_row['tc'];?></b></h2>
                    </div>

                    <div class="col-md-3 p-4 m-4 bg-warning text-center nine" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="900">
                        <h3 class="text-white"><b>FAQ's</b></h3>
                        <h2 class="text-white"><b><?php echo $about_us_faq_row['tc'];?></b></h2>
                    </div>

                    <div class="col-md-3 p-4 m-4 bg-info text-center ten" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                        <h3 class="text-white"><b>Book Notes</b></h3>
                        <h2 class="text-white"><b><?php echo $book_note_row['tc'];?></b></h2>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

<!-- for animation Start -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init({
  easing: 'ease-out-back',
  duration: 1000
});
</script>
<!-- for Animation End -->
</html>