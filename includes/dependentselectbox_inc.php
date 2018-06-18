<?php


    if (isset($_POST['room_type'])) {

        include 'dbconnection_inc.php';

        $output = '';
        if ($_POST['room_type'] != "") {
            $sql = "SELECT * FROM room WHERE room_type=".$_POST['room_type']." AND room_status='available'";
        }
        else{
            $sql = "SELECT * FROM room";
        }
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)){
                $output .= '<option value="'.$row['room_id'].'">'.$row['room_number'].'</option>';
            }
            echo $output;
    }



?>