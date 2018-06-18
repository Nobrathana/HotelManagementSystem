<?php
    date_default_timezone_set("Asia/Bangkok");
    include 'dbconnection_inc.php';

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nationality'];
    $address = $_POST['address'];
    $idcard = $_POST['idcard'];
    $contact = $_POST['contact'];
    $roomid = $_POST['roomnumber'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $last_id = '';
    $date = date("d/m/y H:i");

    if (empty($firstname) || empty($lastname) || empty($gender) || empty($nationality) || empty($address) || 
        empty($idcard) || empty($contact) || empty($roomid)) {
            echo "Pleae fill all data";
    }
    else{

    $sql = "INSERT INTO guest(guest_first, guest_last, guest_gender, guest_contact, guest_address,guest_nationality, guest_idcard, guest_status)
            VALUES('$firstname', '$lastname', '$gender', '$contact', '$address', '$nationality', '$idcard', '0')";
        
        if(mysqli_query($conn, $sql)){
             $last_id = mysqli_insert_id($conn);   
             $sql = "INSERT INTO booking(booking_checkin, booking_checkout, booking_date, guest_id, room_id) 
                     VALUES(".($checkin == NULL ? "NULL" : "'$checkin'").", ".($checkout == NULL ? "NULL" : "'$checkout'").",
                      '$date', '$last_id', '$roomid')";   


                if(mysqli_query($conn, $sql)){
                    $sql = "UPDATE room SET room_status='Busy' WHERE room_id='$roomid'";
                    if (mysqli_query($conn, $sql)) {
                        echo "1";
                    }
                    else{
                        echo "change status";
                    }
                }
                else{
                        echo "cannot save booking";
                    }
        }
        else{
            echo "cannot save guest";
        }
     }
?>