<?php
    session_start();
    ob_start();
    
    include('connection.php');

    if(!isset($_GET['b_id'])){
        header("Location:book_main.php");  
    }

    $b_id=$_GET["b_id"];
    $sql1="SELECT * FROM `book_note` WHERE b_id = $b_id";
    $result1=mysqli_query($conn,$sql1);
    
    $count = mysqli_num_rows($result1);

    $sql2="SELECT * FROM `book` WHERE b_id = $b_id";
    $result2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_array($result2);
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

    <title>Book Notes</title>
    
    <style>
        body{
            background-image: url('images/cr18.jpg');
        }

        .photo{
            border: 2px solid black;
            border-radius: 6px;
            height: 200px;
            width: 150px;
            cursor: pointer;
        }
    </style>

    <?php
        // $target_dir1 = "Notes/";
        // $target_file1 = $target_dir1 . basename($_FILES["FileUpload"]["name"]);
        // move_uploaded_file($_FILES["FileUpload"]["tmp_name"], $target_file1);
        // $book_image=basename($_FILES["FileUpload"]["name"]);
    ?>
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

    <div class="container my-3">
        <?php
            if($count == 0){
                ?>
                    <h1 class="my-5">Sorry!!! We Don't Have Any Notes....</h1>
                <?php
            }
            else{
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <img src="book_images/<?php echo $row2['b_img'];?>" class="mx-auto d-block photo" alt="Image" data-aos="fade-down" data-aos-duration="1000">
                    </div>
                    <div class="col-md-12 mt-3">
                        <table class="table" data-aos="fade-down" data-aos-duration="1000">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th col-span="2">Name</th>
                                    <th>Read</th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php
                            $id = 1;
                            while($row1=mysqli_fetch_array($result1)){   
                        ?>
                        <tr>
                            <td ><?php echo $id;?></td>
                            <td ><?php echo $row1['note'];?></td>
                            <td>
                                <a href="Notes/<?php echo $row1['note'];?>" target="_blank">
                                    <button class="btn btn-outline-primary" title="<?php echo $row1['note'];?>">Read</button>
                                </a>
                            </td>
                        </tr>
                        
                        <?php
                            $id = $id + 1;
                            }
                        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
            }
        ?>
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