<?php

include 'dbconnection_inc.php';

if (isset($_POST['search_data'])) {
    if ($_POST['search_data'] != "") {
        $search_data = $_POST['search_data'];
        $sql = "SELECT b.booking_id, g.guest_first,g.guest_last, g.guest_gender, g.guest_contact, r.room_number, b.booking_date 
                        FROM booking as b
                        JOIN guest as g ON b.guest_id = g.guest_id
                        JOIN room as r ON b.room_id = r.room_id
                        WHERE g.guest_status ='0' AND (
                        g.guest_first LIKE '%$search_data%' OR 
                        g.guest_last LIKE '%$search_data%' OR 
                        r.room_number LIKE '%$search_data%' OR
                        b.booking_date LIKE '%$search_data%' )
                        ORDER BY b.booking_date";
    }
    else{
        $sql = "SELECT b.booking_id, g.guest_first,g.guest_last, g.guest_gender, g.guest_contact, r.room_number, b.booking_date 
                        FROM guest as g, booking as b, room as r
                        WHERE g.guest_id = b.guest_id AND r.room_id=b.room_id 
                        AND g.guest_status ='0'
                        ORDER BY b.booking_date";
    }


                    $result = mysqli_query($conn, $sql);
                    // $resultchk = mysqli_num_rows($result);
                    // if($result)
                    $count = 1;
                    while($row = mysqli_fetch_array($result)) {
                        echo '<tr><th scope="row">'.$count.'</th><td>'.ucfirst($row['guest_last']).' '.ucfirst($row['guest_first']).'</td><td>'.$row['guest_gender']
                        .'</td><td>'.$row['guest_contact'].'</td><td>'.$row['room_number'].'</td><td>'.$row['booking_date'].'</td><td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button id="'.$row['booking_id'].'" type="submit" class="btn btn-primary btn-sm btn_check_out edit_data" >
                                <span data-feather="edit"></span> Check Out</button>
                            </div>
                        </td></tr>';
                        $count++;
                    } 
}
?>