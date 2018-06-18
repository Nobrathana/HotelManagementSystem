<?php

    include 'dbconnection_inc.php';

    $sql="SELECT b.booking_id, g.guest_first,g.guest_last, g.guest_gender, g.guest_contact, r.room_number, b.booking_date 
        FROM guest as g, booking as b, room as r
        WHERE g.guest_id = b.guest_id AND r.room_id=b.room_id AND g.guest_status ='0'
        ORDER BY b.booking_date";
    $result = mysqli_query($conn, $sql);
    $count = 1;
        while($row = mysqli_fetch_array($result)) {       
           $dateformat = date("Y-m-d h:i A",strtotime($row['booking_date']));
            echo '<tr><th scope="row">'.$count.'</th><td>'.ucfirst($row['guest_last']).' '.ucfirst($row['guest_first']).'</td><td>'.$row['guest_gender']
            .'</td><td>'.$row['guest_contact'].'</td><td>'.$row['room_number'].'</td><td>'.$dateformat.'</td><td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button id="'.$row['booking_id'].'" type="button" class="btn btn-primary btn-sm btn_check_out edit_data" >
                    <span data-feather="edit"></span> Check Out</button>
                </div>
            </td></tr>';
            $count++;
                    }    
?>