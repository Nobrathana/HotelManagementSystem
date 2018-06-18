<?php


    function loadroom($type){
        include 'dbconnection_inc.php';
        
        $output = '';
        $sql = "SELECT DISTINCT $type FROM room ORDER BY $type";
        $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
                $output .= '
                    <option value="'.$row[$type].'">'.$row[$type].'</option>';
            }
            return $output;
    }



?>
