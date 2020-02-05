<?php
include_once('db.php');
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