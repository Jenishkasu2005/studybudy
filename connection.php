<?php
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
?>