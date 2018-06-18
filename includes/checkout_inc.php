<?php
    date_default_timezone_set("Asia/Bangkok");
    include 'dbconnection_inc.php';

    if (isset($_POST['booking_id'])) {
       if ($_POST['booking_id'] != "") {
           $id = $_POST['booking_id'];
            $output = '';

            $sql = "SELECT *
                        FROM booking as b
                        JOIN guest as g ON b.guest_id = g.guest_id
                        JOIN room as r ON b.room_id = r.room_id
                        WHERE booking_id='$id'";
            
            $result = mysqli_query($conn, $sql);
            if ($row = mysqli_fetch_assoc($result)) {
                
                if (is_null($row['booking_checkin'])) {
                    $row['booking_checkin'] = $row['booking_date'];
                }
                if (is_null($row['booking_checkout'])) {
                    $row['booking_checkout'] = date("m.d.y");
                }
                
                $duration = (new DateTime($row['booking_checkin']))->diff((new DateTime($row['booking_checkout'])));
                
               


                $output .='
                    <table class="table table-striped table-sm">
                        <tr>
                            <th>Guest Name:</th>
                            <td>'.ucfirst($row['guest_last']).' '.ucfirst($row['guest_first']).'</td>
                        </tr>
                        <tr>
                            <th>Gender:</th>
                            <td>'.$row['guest_gender'].'</td>
                        </tr>
                        <tr>
                            <th>Contact:</th>
                            <td>'.$row['guest_contact'].'</td>
                        </tr>
                        <tr>
                            <th>Address:</th>
                            <td>'.$row['guest_address'].'</td>
                        </tr>
                        <tr>
                            <th>Room Number:</th>
                            <td>'.$row['room_number'].'</td>
                        </tr>
                         <tr>
                            <th>Room Price:</th>
                            <td>'.$row['room_price'].' $</td>
                        </tr>
                        <tr>
                            <th>Check In:</th>
                            <td>'.date("d/m/y h:i A", strtotime($row['booking_checkin'])).'</td>    
                        </tr>
                        <tr>
                            <th>Check Out:</th>
                            <td>'.date("d/m/y h:i A", strtotime($row['booking_checkout'])).'</td>
                        </tr>
                        <tr>
                            <th>Duration:</th>
                            <td>'.$duration->format("%d").' Day '.$duration->format("%h").' Hours</td>
                        </tr>
                        <tr>
                            <th>Price:</th>
                            <td>'.calculate($duration,$row['room_price']).'$</td>
                        </tr>
                    </table>
                    </div>
                <div class="modal-footer">
                <button id="'.$row['booking_id'].'" type="button" class="btn btn-danger btn_check_out_modal">Check Out</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              </div>
                ';
            }
        echo $output;
       }
    }
     

function calculate($duration, $price){
    $d = $duration->format("%d");
    $h = $duration->format("%h");

        if ($d <= 0) {
            return 1 * $price;
        }
        else{
            if ($h < 3) {
                return 1 * $price;
            }
            else{
                return ($d + 1) * $price;
            }
        }
    }


 




?>