<?php
date_default_timezone_set("Asia/Bangkok");
include 'dbconnection_inc.php';

if (isset($_POST['sort_type'])) {
    if ($_POST['sort_type'] != "") {
        $type = $_POST['sort_type'];
        switch($type){
            case '1':
                  $today = date("Y-m-d");
                  $sql = "SELECT b.booking_id, g.guest_first,g.guest_last, g.guest_gender, g.guest_contact, r.room_number, b.booking_date 
                        FROM booking as b
                        JOIN guest as g ON b.guest_id = g.guest_id
                        JOIN room as r ON b.room_id = r.room_id
                        WHERE g.guest_status ='0' AND b.booking_date='$today'
                        ORDER BY b.booking_date";               
                break;
            case '2':
                  $startdayofweek = date("Y-m-d", strtotime("monday this week"));
                  $lastdayofweek = date("Y-m-d", strtotime("sunday this week"));
                  $sql = "SELECT b.booking_id, g.guest_first,g.guest_last, g.guest_gender, g.guest_contact, r.room_number, b.booking_date 
                        FROM booking as b
                        JOIN guest as g ON b.guest_id = g.guest_id
                        JOIN room as r ON b.room_id = r.room_id
                        WHERE g.guest_status ='0' AND b.booking_date BETWEEN '$startdayofweek' AND '$lastdayofweek'
                        ORDER BY b.booking_date";
                break;
            case '3':
                  $thismonth = date("m");
                  $sql = "SELECT b.booking_id, g.guest_first,g.guest_last, g.guest_gender, g.guest_contact, r.room_number, b.booking_date 
                        FROM booking as b
                        JOIN guest as g ON b.guest_id = g.guest_id
                        JOIN room as r ON b.room_id = r.room_id
                        WHERE g.guest_status ='0' AND MONTH(b.booking_date)= '$thismonth'
                        ORDER BY b.booking_date";
                break;
        }
    }
    else{
        $sql = "SELECT b.booking_id, g.guest_first,g.guest_last, g.guest_gender, g.guest_contact, r.room_number, b.booking_date 
                        FROM booking as b
                        JOIN guest as g ON b.guest_id = g.guest_id
                        JOIN room as r ON b.room_id = r.room_id
                        WHERE g.guest_status ='0'
                        ORDER BY b.booking_date";
    }
}

                $result = mysqli_query($conn, $sql);
                    $count = 1;
                    while($row = mysqli_fetch_array($result)) {
                        echo '<tr><th scope="row">'.$count.'</th><td>'.ucfirst($row['guest_last']).' '.ucfirst($row['guest_first']).'</td><td>'.$row['guest_gender']
                        .'</td><td>'.$row['guest_contact'].'</td><td>'.$row['room_number'].'</td><td>'.$row['booking_date'].'</td><td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button id="'.$row['booking_id'].'" type="button" class="btn btn-primary btn-sm btn_check_out edit_data" >
                                <span data-feather="edit"></span> Check Out</button>
                            </div>
                        </td></tr>';
                        $count++;
                    } 

?>