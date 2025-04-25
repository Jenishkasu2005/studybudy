<?php
    session_start();
    unset($_SESSION["teacher_id"]);
    header("Location:login_teacher.php");
?>
