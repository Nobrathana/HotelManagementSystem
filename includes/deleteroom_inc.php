<?php
    include_once 'dbconnection_inc.php';

    if(isset($_POST['room_id'])){
        $id=$_POST['room_id'];
        $sql = "DELETE FROM room WHERE room_id='$id'";
        $result = mysqli_query($conn, $sql);

    }
?>