<?php
    include('connection.php');
    
    if(isset($_POST['upload'])){
        $name=$_POST['bname'];

        $target_dir1 = "Notes/";
        $target_file1 = $target_dir1 . basename($_FILES["FileUpload"]["name"]);
        move_uploaded_file($_FILES["FileUpload"]["tmp_name"], $target_file1);
        $book_note=basename($_FILES["FileUpload"]["name"]);

        // $sql="INSERT INTO `book`(`b_name`,`b_price`,`b_author`,`b_img`,`course`,`quantity`) VALUES('$name','$price','$author','$book_image','$course','$quantity')";
        $sql = "INSERT INTO `book_note`(`b_name`, `note`) VALUES ('$name','$book_note')";

        $result=mysqli_query($conn,$sql);

        if($result){
            ?>
                <script>
                    alert("Book Note Added Successfully...");
                    window.location.href="teacher_detail.php";
                </script>
            <?php
        }
    }
?>