<?php

    include 'dbconnection_inc.php';
    $output = '';

    if (isset($_POST['booking_id'])) {
        if ($_POST['booking_id'] != "") {
            $id = $_POST['booking_id'];
            $sql = "SELECT b.booking_id, r.room_id, g.guest_id
                    FROM booking as b
                    JOIN guest as g ON b.guest_id=g.guest_id
                    JOIN room as r ON b.room_id = r.room_id
                    WHERE b.booking_id ='$id'";
            $result = mysqli_query($conn, $sql);
            if ($row = mysqli_fetch_assoc($result)) {
                $sql = "UPDATE room as r SET r.room_status='Available'
                            WHERE r.room_id=".$row['room_id'];
                if (mysqli_query($conn, $sql)) {
                    $sql = "UPDATE guest as g SET g.guest_status='1'
                            WHERE g.guest_id=".$row['guest_id'];
                    if (mysqli_query($conn, $sql)) {
                        $output = "1";
                    }
                    else{
                        $output = "0";
                    }
                }
                else{
                    $output = "0";
                }
            }
            else{
                $output = "0";
            }
        }
        else{
            $output = "0";
        }
        echo "$output";
    }

?>