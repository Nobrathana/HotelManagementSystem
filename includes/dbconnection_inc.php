<?php

    $mysql_host = "localhost";
    $mysql_user = "root";
    $mysql_pwd = "";
    $mysql_db = "hotelsystem";

    $conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pwd, $mysql_db);
    
    if ($conn != true) {
        die("Connection Failed!!");
    }
?>