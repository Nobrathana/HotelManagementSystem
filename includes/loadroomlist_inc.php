<?php

    include_once 'dbconnection_inc.php';

    $sql="SELECT * FROM room ORDER BY room_number";
    $result = mysqli_query($conn, $sql);
    $count = 1;
        while($row = mysqli_fetch_array($result)) {
            echo '<tr><th scope="row">'.$count.'</th><td>'.$row['room_number'].'</td><td>'.$row['room_type']
            .' bed</td><td>$ '.$row['room_price'].'</td><td>'.$row['room_status'].'</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button id="'.$row['room_id'].'" type="button" class="btn btn-primary btn-sm edit_data" >
                    <span data-feather="edit"></span> Edit</button>
                    <button id="'.$row['room_id'].'" type="button" class="btn btn-danger btn-sm delete_data" 
                    data-toggle="modal" data-target="#delete_data"><span data-feather="trash-2"></span> Delete</button>
                </div>
            </td></tr>';
            $count++;
                    }    
?>