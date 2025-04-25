<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("Location:/StudyBuddy/");
    }
    unset($_SESSION["id"]);
    // unset($_SESSION["t_id"]);
    header("Location:/StudyBuddy/");
?>
