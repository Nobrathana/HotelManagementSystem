<?php
    include_once 'dbconnection_inc.php';

        $roomNumber = $_POST['roomNumber'];
        $roomType = $_POST['roomType'];
        $roomPrice =  $_POST['roomPrice'];
        $roomStatus = "Available";
       
            if (empty($roomNumber) || empty($roomType) || empty($roomPrice)) {
                echo '
                <div class="alert alert-warning" role="alert">
                    Please Provide an Information to empty fields.
                </div>
                ';
            }
            else{
            $sql = "SELECT * FROM room WHERE room_number='$roomNumber'";
            if (mysqli_num_rows(mysqli_query($conn, $sql)) > 0) {         
                echo '
                    <div class="alert alert-warning" role="alert">
                        Room Number is Already existing in this system.
                    </div>
                ';
            }
            else{
                $sql1="INSERT INTO room(room_number, room_type, room_price, room_status) 
                VALUES('$roomNumber', '$roomType', '$roomPrice', '$roomStatus')";
                    if (mysqli_query($conn, $sql1)) {
                        echo '
                            <div class="alert alert-success" role="alert">
                                Successfully! New Room is Created.
                            </div>
                        ';
                    }
                    else{
                        echo "error";
                    }
                }   
            }   
           
                

        
    
?>