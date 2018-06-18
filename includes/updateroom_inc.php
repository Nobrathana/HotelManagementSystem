<?php
    include_once 'dbconnection_inc.php';
        $roomId = $_POST['roomId'];
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
                $sql = "SELECT * FROM room WHERE room_id='$roomId'";
                $result = mysqli_query($conn, $sql);
                if($row = mysqli_fetch_assoc($result)){
                    if ($row['room_number'] == $roomNumber) {
                        $sql = "UPDATE room SET room_type='$roomType', room_price='$roomPrice'
                                WHERE room_id='$roomId'";
                        if(mysqli_query($conn, $sql)){
                            echo '
                                <div class="alert alert-success" role="alert">
                                    Successfully! New Room is Modify.
                                </div>
                            ';
                        }
                        else{
                            echo "ERROR OCCURED!!!";
                        }
                    }
                    else{
                        $sql = "SELECT * FROM room WHERE room_number='$roomNumber'";
                        $result = mysqli_query($conn, $sql);
                        $resultchk = mysqli_num_rows($result);
                            if ($resultchk > 0) {
                                echo '
                                    <div class="alert alert-warning" role="alert">
                                        Room Number is Already existing in this system.
                                    </div>
                                ';
                            }
                            else{
                                $sql = "UPDATE room SET room_number='$roomNumber', room_type='$roomType', room_price='$roomPrice'
                                WHERE room_id='$roomId'";
                                if(mysqli_query($conn, $sql)){
                                    echo '
                                        <div class="alert alert-success" role="alert">
                                            Successfully! New Room is Modify.
                                        </div>
                                    ';
                                }
                                else {
                                    echo "Error Occured!";
                                }
                            }
                    }
                }

            }   
           
                

        
    
?>