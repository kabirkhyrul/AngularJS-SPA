<?php
require_once('db.php');
$data    = json_decode(file_get_contents("php://input"));
$id   	= 	$data->id;
$query 	= 	"DELETE FROM room_info WHERE id='$id'";
if ($cn->query($query)) {
	echo 'Data Deleted Successfully!';
} else {
	echo 'Failed';
}
?>