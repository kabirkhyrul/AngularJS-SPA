<?php
$cn = new mysqli("localhost", "root", "", "hotel_managment");
$output = array();
$query  = "SELECT * FROM room_info";
$send = $cn->query($query);
if ($send->num_rows> 0) {
    while ($row = $send->fetch_assoc()) {
        $output[] = $row;
    }
    echo json_encode($output);
}
?> 