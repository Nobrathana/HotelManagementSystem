<?php
    include_once 'dbconnection_inc.php';

    if(isset($_POST['room_id'])){
        $id = $_POST['room_id'];
        $table = "";
        $sql = "SELECT * FROM room WHERE room_id='$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $table .='
                    <form id="form_modify_room" class="needs-validation" validate>
                        <div class="row">
                            <input id="roomId" name="roomId" type="hidden" value="'.$row['room_id'].'">
                            <div class="col-md-6 mb-3">
                                <label for="roomNumber">Room Number</label>
                                <input type="number" class="form-control" name="roomNumber" id="roomNumber" placeholder="" value="'.$row['room_number'].'" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="roomType">Room Type</label>
                                <input type="number" class="form-control" name="roomType" id="roomType" placeholder="" value="'.$row['room_type'].'" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="roomPrice">Price</label>
                                <input type="number" class="form-control" name="roomPrice" id="roomPrice" placeholder="" value="'.$row['room_price'].'" required>
                            </div>
                        </div>
                    </form>
                    <p id="alert_msg">ssss</p>
                ';

        echo $table;
    }
?>