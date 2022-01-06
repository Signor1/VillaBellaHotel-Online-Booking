<?php
//require database connection
include_once('../config/dbconfig.php');



//make ajax call t0 fetch article info
$id = $_POST['id'];
$sql="SELECT * FROM categories WHERE id = '$id'";
//run db query
$res = $db->query($sql);
while($row=mysqli_fetch_assoc($res)){
    $output = array('id' => $row['id'], 'category_name' => $row['category_name']);
}
echo json_encode($output);
    

//make ajax call t0 fetch article info
if(isset ($_POST['users'])){
    
$id = $_POST['id'];
$sql="SELECT * FROM users WHERE id = '$id'";
//run db query
$res = $db->query($sql);
while($row=mysqli_fetch_assoc($res)){
    $output = array('id' => $row['id'], 
                    'first_name' => $row['first_name'], 
                    'last_name' => $row['last_name'], 
                    'mobile_number' => $row['mobile_number'], 
                    'gender' => $row['gender'], 
                    'email' => $row['email'], 
                    'password' => $row['password'], 
                    'date_of_reg' => $row['date_of_reg'], 
                    'status' => $row['status'], 
                    'role' => $row['role']
                   );
}
echo json_encode($output);
    
    }
    
    
if(isset ($_POST['enquiry'])){
    //make ajax call t0 fetch article info
$id = $_POST['id'];
$sql="SELECT * FROM contact WHERE id = '$id'";
//run db query
$res = $db->query($sql);
while($row=mysqli_fetch_assoc($res)){
    $output = array('id' => $row['id'], 
                    'contact_name' => $row['contact_name'], 
                    'contact_email' => $row['contact_email'], 
                    'contact_subject' => $row['contact_subject'], 
                    'contact_message' => $row['contact_message'], 
                    'contact_date' => $row['contact_date'], 
                    'contact_status' => $row['contact_status'],
                   );
}
echo json_encode($output);
    }

?>
