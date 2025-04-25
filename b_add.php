<?php
    session_start();
    if(!isset($_SESSION["admin_id"]))
    {
      echo "<script>window.location='login_admin.php';</script>";
    }
?>
<?php
    include('connection.php');
    
    if(isset($_POST['upload'])){
        $name=$_POST['bname'];
        $price=$_POST['bprice'];
        $author=$_POST['bauthor'];
        $course=$_POST['course'];
        $quantity=$_POST['bqty'];

        $target_dir1 = "book_images/";
        $target_file1 = $target_dir1 . basename($_FILES["bookUpload"]["name"]);
        move_uploaded_file($_FILES["bookUpload"]["tmp_name"], $target_file1);
        $book_image=basename($_FILES["bookUpload"]["name"]);

        $sql="INSERT INTO `book`(`b_name`,`b_price`,`b_author`,`b_img`,`course`,`quantity`) VALUES('$name','$price','$author','$book_image','$course','$quantity')";

        $result=mysqli_query($conn,$sql);

        if($result){
            ?>
                <script>
                    alert("Book Added Successfully...");
                    window.location.href="book.php";
                </script>
            <?php
        }
    }
?>