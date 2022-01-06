<?php
//To create a database conection
$db = mysqli_connect("localhost", "root", "", "villa_bella") or die("Could not connect to database");
if($db->connect_error > 0){
    die($db->connect_error);
}


?>