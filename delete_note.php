<?php
    include('connection.php');

    $id=$_GET['n_id'];

    $sql="DELETE FROM `book_note` WHERE n_id='$id'";
    $result=mysqli_query($conn,$sql);
    if($result){
        ?>
            <script>
                alert("Note Deleted Successfully...");
                window.location.href="teacher_detail.php";
            </script>
        <?php
    }
?>