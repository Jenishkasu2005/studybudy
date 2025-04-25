<?php
    session_start();
    if(!isset($_SESSION["admin_id"]))
    {
      echo "<script>window.location='login_admin.php';</script>";
    }
?>
<?php
    include('connection.php');

    $id=$_GET['n_id'];

    $sql="DELETE FROM `book_note` WHERE n_id='$id'";
    $result=mysqli_query($conn,$sql);
    if($result){
        ?>
            <script>
                alert("Note Deleted Successfully...");
                window.location.href="book_note_admin.php";
            </script>
        <?php
    }
?>