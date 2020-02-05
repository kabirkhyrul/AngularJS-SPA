<?php
require_once('db.php');
$info = json_decode(file_get_contents("php://input"));

$name     = $cn->real_escape_string($info->name);
$book    = $cn->real_escape_string($info->book);
$nid      = $cn->real_escape_string($info->nid);
$checkout  = $cn->real_escape_string($info->checkout);
$room      = $cn->real_escape_string($info->room);
$btn_name = $info->btnName;
if ($btn_name == "Insert") {
   $query = "INSERT INTO `room_info` (`id`, `name`, `book`, `checkout`, `nid`, `room`) VALUES(NULL,'$name','$book','$checkout','$nid','$room')";
   if (mysqli_query($cn, $query)) {

    echo "Data Inserted Successfully";
} else {
    echo 'Failed';
}
}
if ($btn_name == 'Update') {
    $id    = $info->id;

    $query = "UPDATE `room_info` SET `name` = '$name', `book` = '$book',  `nid` = '$nid', `checkout` = '$checkout', `room`='$room'  WHERE `room_info`.`id` =".$id;
    if (mysqli_query($cn, $query)) {
        echo 'Data Updated Successfully';
    } else {
        echo 'Failed';
        
    }
}
