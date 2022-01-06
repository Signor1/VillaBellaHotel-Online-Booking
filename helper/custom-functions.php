<?php 

include_once('../config/dbconfig.php');



//getting the first 3 rooms to dsiplay
function getThreeRooms($db){
    $sql = "SELECT * FROM rooms ORDER BY id ASC LIMIT 3";
    $res = $db->query($sql);
    return $res;
}

//getting all the rooms to display
function getAllRoom($db){
    $sql = "SELECT * FROM rooms ORDER BY id ASC";
    $res = $db->query($sql);
    return $res;
}

//getting details of each room
function getDetails($db){
    $id= $_GET['id'];
    $sql = "SELECT * FROM rooms WHERE id = '$id'";
    $res = $db->query($sql);
    return $res;
}
//getting user's bookings
function getUserBooking($db){
    $user_id= $_SESSION['id'];
    $sql = "SELECT * FROM bookings WHERE user_id = '$user_id'";
    $res = $db->query($sql);
    return $res;
}

//getting booking details
function getBookingDetails($db){
    $id= $_GET['id'];
    $sql = "SELECT * FROM bookings WHERE id = '$id'";
    $res = $db->query($sql);
    return $res;
}

//get available rooms
function getAllAvailableRoom($db){
    $sql = "SELECT * FROM rooms WHERE room_status = 'Available'";
    $res = $db->query($sql);
    return $res;
}
?>