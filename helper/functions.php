<?php

include_once('../config/dbconfig.php');
include_once("../helper/helper.php");

//get total users
function getAllUsers($db){
$allUsers = "SELECT * FROM users";

$allUsersRes = $db->query($allUsers);

$count = mysqli_num_rows($allUsersRes);
    
$formatcount = number_format($count);    

return $formatcount;
}
//get total number of rooms
function getAllRooms($db){
$allRoom = "SELECT * FROM rooms";

$allRoomRes = $db->query($allRoom);

$count = mysqli_num_rows($allRoomRes);
    
$formatcount = number_format($count);    

return $formatcount * 10;
}
//get all bookings
function getAllBookings($db){
$allBookings = "SELECT * FROM bookings";

$allBookingsRes = $db->query($allBookings);

$count = mysqli_num_rows($allBookingsRes);
    
$formatcount = number_format($count);    

return $formatcount;
}

//get all pending bookings
function getAllBookingPending($db){
$allBookings = "SELECT * FROM bookings WHERE booking_status = 'Pending'";

$allBookingsRes = $db->query($allBookings);

$count = mysqli_num_rows($allBookingsRes);
    
$formatcount = number_format($count);    

return $formatcount; 
}

//get all approved bookings
function getAllApprovedBookings($db){
$allBookings = "SELECT * FROM bookings WHERE booking_status = 'Approved'";

$allBookingsRes = $db->query($allBookings);

$count = mysqli_num_rows($allBookingsRes);
    
$formatcount = number_format($count);    

return $formatcount; 
}

//get all cancelled bookings
function getAllCancelledBookings($db){
   $allBookings = "SELECT * FROM bookings WHERE booking_status = 'Cancelled'";

$allBookingsRes = $db->query($allBookings);

$count = mysqli_num_rows($allBookingsRes);
    
$formatcount = number_format($count);    

return $formatcount; 
}

//get total unread enquiry
function getAllUnreadEnquiry($db){
$allUsers = "SELECT * FROM contact WHERE contact_status = 'Unread'";

$allUsersRes = $db->query($allUsers);

$count = mysqli_num_rows($allUsersRes);
    
$formatcount = number_format($count);    

return $formatcount;
}

//get total read enquiry
function getAllReadEnquiry($db){
$allUsers = "SELECT * FROM contact WHERE contact_status = 'Read'";

$allUsersRes = $db->query($allUsers);

$count = mysqli_num_rows($allUsersRes);
    
$formatcount = number_format($count);    

return $formatcount;
}

//get unread enquiries
function getUnreadEnquiry($db){
$sql = "SELECT * FROM contact WHERE contact_status = 'Unread' ORDER BY id ASC";

$res = $db->query($sql);

return $res;
}


//get read enquiries
function getReadEnquiry($db){
$sql = "SELECT * FROM contact WHERE contact_status = 'Read' ORDER BY id ASC";

$res = $db->query($sql);

return $res;
}

//get all users and display them
function getUsersInfo($db){
    $sql= "SELECT * FROM users ORDER BY id ASC";
    $res = $db->query($sql);
    return $res;
}

//getting user profile
function getUserProfile($db){
    $id= $_SESSION['id'];
    
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $res = $db->query($sql);
    return $res;
}

//updating user profile
function updateUserProfile($db){
    $id = $_POST['id'];
    
    $_SESSION['errors']= array();

//collect user data

if(isset ($_POST['update'])){
    
    //check for empty fields
   if(empty($_POST['firstname'])){
       $_SESSION['errors']['firstname']= "Your First Name is required";
   }
    if(empty($_POST['lastname'])){
       $_SESSION['errors']['lastname']= "Your Last Name is required";
   }
    if(empty($_POST['number'])){
       $_SESSION['errors']['number']= "Your Mobile Number is required";
   }
    if(empty($_POST['email'])){
       $_SESSION['errors']['email']= "Your Email is required";
   }  
    
    // filter and sanitize user inputs
    $firstname = mysqli_real_escape_string($db,$_POST['firstname']);
    $lastname = mysqli_real_escape_string($db,$_POST['lastname']);
    $phonenumber = mysqli_real_escape_string($db,$_POST['number']);
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $newDate = date("d/m/y");   
    
    if(App\helper::checkEmail($email)){
        $_SESSION['errors']['invalidEmail'] = "Invalid email format";
        header('Location:../users/profile.php');
    }
    
    
    if(count($_SESSION['errors']) > 0){
        header('Location:../users/profile.php');
    }
    //if no errors
    else{
            //user does not exist
            //insert into db
            $sql = "UPDATE users SET first_name = '$firstname', last_name = '$lastname', mobile_number ='$phonenumber', email ='$email', date_of_reg = '$newDate' WHERE id = '$id'";
            //run db query
            $res = $db->query($sql);
            $affected_rows = $db->affected_rows;
            //if there was an update
            if($affected_rows > 0){
                $_SESSION['success'] = 'Profile Update was successful';
                header('Location:../users/profile.php');
            }else{
                $_SESSION['errors']['error']='Whoops, something went wrong';
                header('Location:../users/profile.php');
            }
        }
    
    
}else{
    //redirect the user back
    header('Location:../users/profile.php');
}

}

//update admin profile
function updateAdminProfile($db){
    $id = $_POST['id'];
    
    $_SESSION['errors']= array();

//collect user data

if(isset ($_POST['update'])){
    
    //check for empty fields
   if(empty($_POST['firstname'])){
       $_SESSION['errors']['firstname']= "Your First Name is required";
   }
    if(empty($_POST['lastname'])){
       $_SESSION['errors']['lastname']= "Your Last Name is required";
   }
    if(empty($_POST['number'])){
       $_SESSION['errors']['number']= "Your Mobile Number is required";
   }
    if(empty($_POST['email'])){
       $_SESSION['errors']['email']= "Your Email is required";
   }  
    
    // filter and sanitize user inputs
    $firstname = mysqli_real_escape_string($db,$_POST['firstname']);
    $lastname = mysqli_real_escape_string($db,$_POST['lastname']);
    $phonenumber = mysqli_real_escape_string($db,$_POST['number']);
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $newDate = date("d/m/y");   
    
    if(App\helper::checkEmail($email)){
        $_SESSION['errors']['invalidEmail'] = "Invalid email format";
        header('Location:../admin/profile.php');
    }
    
    
    if(count($_SESSION['errors']) > 0){
        header('Location:../admin/profile.php');
    }
    //if no errors
    else{
            //user does not exist
            //insert into db
            $sql = "UPDATE users SET first_name = '$firstname', last_name = '$lastname', mobile_number ='$phonenumber', email ='$email', date_of_reg = '$newDate' WHERE id = '$id'";
            //run db query
            $res = $db->query($sql);
            $affected_rows = $db->affected_rows;
            //if there was an update
            if($affected_rows > 0){
                $_SESSION['success'] = 'Profile Update was successful';
                header('Location:../admin/profile.php');
            }else{
                $_SESSION['errors']['error']='Whoops, something went wrong';
                header('Location:../admin/profile.php');
            }
        }
    
    
}else{
    //redirect the user back
    header('Location:../admin/profile.php');
}

}

//update user password
function updateUserPassword($db){
     $id = $_POST['id'];
    
    $_SESSION['errors']= array();
    
    if(isset ($_POST['resetPassword'])){
    //check for empty fields
  
    if(empty($_POST['newPassword'])){
       $_SESSION['errors']['password']= "Your Password is required";
   } 
    if(empty($_POST['confirmPassword'])){
       $_SESSION['errors']['confirmPassword']= "Confirm your password";
   } 
    
    // filter and sanitize user inputs
    $email = $_POST['email'];
    $newPassword = mysqli_real_escape_string($db,$_POST['newPassword']);
    $confirmPassword = mysqli_real_escape_string($db,$_POST['confirmPassword']);
      
    
    if(App\helper::checkPsw($newPassword)){
        $_SESSION['errors']['passwordFailure'] = "Password should be minimum of 8 characters";
        header('Location:../users/change_password.php');
    }
    
    if(App\helper::confirmPassword($newPassword,$confirmPassword)){
        $_SESSION['errors']['passwordMisMatch'] = "Password mismatch";
        header('Location:../users/change_password.php');
    }
    
    if(count($_SESSION['errors']) > 0){
        header('Location:../users/change_password.php');
    }
    //if no errors
   else{
            //user does exist
            //hash the user's password
            $newHashpassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
            //insert into db
            $sql = "UPDATE users SET password  = '$newHashpassword' WHERE id = '$id'";
            //run msql query
            $res = mysqli_query($db, $sql);
            $affected_rows = $db->affected_rows;
            //if there was an update
            if($affected_rows > 0){
                $_SESSION['success'] = "Your Password has been changed successfully";
                header('Location:../users/change_password.php');
            }else{
                $_SESSION['errors']['error']='Whoops, something went wrong';
                header('Location:../users/change_password.php');
            }
        }
    
}else{
    //redirect the user back
    header('Location:../users/change_password.php');
}

}

//update user password
function updateAdminPassword($db){
     $id = $_POST['id'];
    
    $_SESSION['errors']= array();
    
    if(isset ($_POST['resetPassword'])){
    //check for empty fields
  
    if(empty($_POST['newPassword'])){
       $_SESSION['errors']['password']= "Your Password is required";
   } 
    if(empty($_POST['confirmPassword'])){
       $_SESSION['errors']['confirmPassword']= "Confirm your password";
   } 
    
    // filter and sanitize user inputs
    $email = $_POST['email'];
    $newPassword = mysqli_real_escape_string($db,$_POST['newPassword']);
    $confirmPassword = mysqli_real_escape_string($db,$_POST['confirmPassword']);
      
    
    if(App\helper::checkPsw($newPassword)){
        $_SESSION['errors']['passwordFailure'] = "Password should be minimum of 8 characters";
        header('Location:../admin/change_password.php');
    }
    
    if(App\helper::confirmPassword($newPassword,$confirmPassword)){
        $_SESSION['errors']['passwordMisMatch'] = "Password mismatch";
        header('Location:../admin/change_password.php');
    }
    
    if(count($_SESSION['errors']) > 0){
        header('Location:../admin/change_password.php');
    }
    //if no errors
   else{
            //user does exist
            //hash the user's password
            $newHashpassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
            //insert into db
            $sql = "UPDATE users SET password  = '$newHashpassword' WHERE id = '$id'";
            //run msql query
            $res = mysqli_query($db, $sql);
            $affected_rows = $db->affected_rows;
            //if there was an update
            if($affected_rows > 0){
                $_SESSION['success'] = "Your Password has been changed successfully";
                header('Location:../admin/change_password.php');
            }else{
                $_SESSION['errors']['error']='Whoops, something went wrong';
                header('Location:../admin/change_password.php');
            }
        }
    
}else{
    //redirect the user back
    header('Location:../admin/change_password.php');
}

}



//get and display categories
function getCategory($db){
    $sql= "SELECT * FROM categories ORDER BY id ASC";
    $res = $db->query($sql);
    return $res;
}

//add room category
function addCategory($db){
    $_SESSION['errors'] = array();
	
	if(isset($_POST['addCategory'])){
		if(empty($_POST['categoryName'])){
			$_SESSION['errors']['category_name'] = "Category name is required";
			
		}else{
//			check if category already exists
			
			
			$category = mysqli_real_escape_string($db,$_POST['categoryName']);
			$sql = "SELECT * from categories where category_name = '$category'";
			$res = $db->query($sql);
			$count = mysqli_num_rows($res);
			if($count > 0){
				$_SESSION['errors']['name_exist'] = 'Sorry, category name already exist';
				header('Location:../admin/add-category.php');
			}else{
//				proceed to insert db
				$sql = "INSERT INTO categories (category_name)VALUES('$category')";
//				run mysql query
				$res = mysqli_query($db,$sql);
				if($res){
					$_SESSION['success'] = 'category ' .$category.' has been created';
					header('Location:../admin/add-category.php');
				}
				else{
					$_SESSION['errors']['error'] = 'Whoops, something went wrong';
					header('Location:../admin/add-category.php');
				}
			}
		}
	}
	else{
		$_SESSION['errors']['error'] ='Unauthorised';
		header('Location:../admin/add-category.php');
	}
}

//Edit Category
function editCategory($db){
    $id= $_POST['id'];
    $_SESSION['errors'] = array();
	
	if(isset($_POST['edit-category'])){
		if(empty($_POST['category_name'])){
			$_SESSION['errors']['category_name'] = "Category name is required";
			
		}else{
            //edit category
            $category_name= $_POST['category_name'];
            $sql = "UPDATE categories SET category_name = '$category_name' WHERE id = '$id'";
            //run db query
            $res = $db->query($sql);
            $affected_rows = $db->affected_rows;
            //if there was an update
            if($affected_rows > 0){
                $_SESSION['success']= "Category has been edited successfully";
                header('Location:../admin/add-category.php');
            }else{
              $_SESSION['errors']['error']="Whoops, something went wrong";
                header('Location:../admin/add-category.php');
            }
        
}
    }else{
            $_SESSION['errors']['error']="Unauthorized access";
                header('Location:../admin/add-category.php');
                
            }
}

//Delete Category
function deleteCategory($db){
    $id= $_POST['id'];
    $_SESSION['errors'] = array();
    if(isset($_POST['delete-category'])){
    $sql= "DELETE FROM categories WHERE id = '$id'";
        $res = $db->query($sql);
            $affected_rows = $db->affected_rows;
            
            //if there was a delete
            if($affected_rows > 0){
                $_SESSION['success']= "Category has been deleted successfully";
                header('Location:../admin/add-category.php');
            }else{
              $_SESSION['errors']['error']="Whoops, something went wrong";
                header('Location:../admin/add-category.php');
            }
}else{
        $_SESSION['errors']['error']="Unauthorized access";
                header('Location:../admin/add-category.php');
    }

}


//Room Image Storage
function storeImage($file){
     $_SESSION['errors'] = array();
    //handle file upload
    $target_folder_dir = "../assets/hotel_rooms/";
    $target_file = $target_folder_dir.basename($_FILES["room_image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    //check if file already exists
    if(file_exists($target_file)){
        $_SESSION['errors']['exists'] ='Room image already exists';
        header('Location:../admin/add-room.php');
    }
    //check file size
    else if($_FILES["room_image"]["size"] > 30000000){
        $_SESSION['errors']['big'] ='Image size is too big';
          header('Location:../admin/add-room.php');
        
    }
    //check for file formats
    else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif" && $imageFileType != "jpeg"){
       $_SESSION['errors']['format'] ='Image format not allowed';
         header('Location:../admin/add-room.php');
        
    }
    if(count($_SESSION['errors']) > 0){
         
         header('Location:../admin/add-room.php');
       
         }else{
       $path = move_uploaded_file($_FILES["room_image"]["tmp_name"], $target_file);
        
        return $path;
    
}

}

//Add Rooms

function addRoom($db){
    $_SESSION['errors'] = array();
    
    if(isset($_POST['add-Room'])){
        if(empty($_POST['room_name'])){
        $_SESSION['errors']['room_name'] = "Name of room is required";
       
          }
        if(empty($_POST['room_category'])){
        $_SESSION['errors']['room_category'] = "Room category is required";
       }
        
        if(empty($_POST['room_size'])){
        $_SESSION['errors']['room_size'] = "Room size is required";
       }
        
        if(empty($_POST['room_view'])){
        $_SESSION['errors']['room_view'] = "Room view is required";
       }
       if(empty($_POST['room_bed'])){
        $_SESSION['errors']['room_bed'] = "No. of bed is required";
       }
        if(empty($_POST['room_subject'])){
        $_SESSION['errors']['room_subject'] = "Room Subject is required";
       }
        if(empty($_POST['room_description'])){
        $_SESSION['errors']['room_description'] = "Room Description is required";
       }
        if(empty($_POST['room_price'])){
        $_SESSION['errors']['room_price'] = "Room Price is required";
       }
        if(empty($_POST['max_persons'])){
        $_SESSION['errors']['max_persons'] = "Maximum No. of persons is required";
       }
        if(count($_SESSION['errors']) > 0){
        header('Location:../admin/add-room.php');
    }
         //  filter and sanitize user inputs
    
      $room_name = mysqli_real_escape_string($db,$_POST['room_name']);
      $room_category = mysqli_real_escape_string($db,$_POST['room_category']);
      $room_size = mysqli_real_escape_string($db,$_POST['room_size']);
     $room_view = mysqli_real_escape_string($db,$_POST['room_view']);
      $room_bed = mysqli_real_escape_string($db,$_POST['room_bed']);
     $room_subject = mysqli_real_escape_string($db,$_POST['room_subject']);
        $room_description = mysqli_real_escape_string($db,$_POST['room_description']);
        $room_price = mysqli_real_escape_string($db,$_POST['room_price']);
        $max_persons = mysqli_real_escape_string($db,$_POST['max_persons']);
        
       $target_folder_dir = "../assets/hotel_rooms/";
    $target_file = $target_folder_dir.basename($_FILES["room_image"]["name"]);
      if(storeImage($target_file)){
          //proceed to insert other fields into db
            $sql = "INSERT INTO rooms (room_name, room_subject, room_description, category_id, room_image, room_price, room_size, room_view, no_of_bed, max_persons) VALUES('$room_name','$room_subject','$room_description','$room_category','$target_file','$room_price','$room_size','$room_view','$room_bed','$max_persons')";
            
           $res =$db->query($sql);
                
                if($res){
                $_SESSION['success'] ='Room details has been added to the Database';
          header('Location:../admin/add-room.php');
            }
           else{
               $_SESSION['errors']['error'] ='Could not insert Room into the Database';
          header('Location:../admin/add-room.php');
               
           }
            
      }
         
}else{
        $_SESSION['errors']['unauthorized'] = "Unauthorized access";
        header("Location:../admin/add-room.php");
    }
}

//get and display rooms
function getRooms($db){
    $sql= "SELECT * FROM rooms ORDER BY id ASC";
    $res = $db->query($sql);
    return $res;
}

//Make Room Unavailable
function makeUnavailable($db){
     $id= $_POST['id'];
    $_SESSION['errors'] = array();
    if(isset ($_POST['make-unavailable'])){
        $sql= "UPDATE rooms SET room_status = 'Unavailable' WHERE id = '$id'";
        $res = $db->query($sql);
            $affected_rows = $db->affected_rows;
            
            //if there was an update
            if($affected_rows > 0){
                $_SESSION['success']= "Room Status has been made Unavailable successfully";
                header('Location:../admin/edit-room.php');
            }else{
              $_SESSION['errors']['error']="Whoops, something went wrong";
                header('Location:../admin/edit-room.php');
            }
}else{
        $_SESSION['errors']['error']="Unauthorized access";
                header('Location:../admin/edit-room.php');
    }
}


//Make Room Available
function makeAvailable($db){
     $id= $_POST['id'];
    $_SESSION['errors'] = array();
    if(isset ($_POST['make-available'])){
        $sql= "UPDATE rooms SET room_status = 'Available' WHERE id = '$id'";
        $res = $db->query($sql);
            $affected_rows = $db->affected_rows;
            
            //if there was an update
            if($affected_rows > 0){
                $_SESSION['success']= "Room Status has been made Available successfully";
                header('Location:../admin/edit-room.php');
            }else{
              $_SESSION['errors']['error']="Whoops, something went wrong";
                header('Location:../admin/edit-room.php');
            }
}else{
        $_SESSION['errors']['error']="Unauthorized access";
                header('Location:../admin/edit-room.php');
    }
}

//Delete Room
function deleteRoom($db){
     $id= $_POST['id'];
    $_SESSION['errors'] = array();
    if(isset ($_POST['delete-room'])){
        $sql= "DELETE FROM rooms WHERE id = '$id'";
        $res = $db->query($sql);
            $affected_rows = $db->affected_rows;
            
            //if there was an update
            if($affected_rows > 0){
                $_SESSION['success']= "Room has been Deleted successfully";
                header('Location:../admin/edit-room.php');
            }else{
              $_SESSION['errors']['error']="Whoops, something went wrong";
                header('Location:../admin/edit-room.php');
            }
}else{
        $_SESSION['errors']['error']="Unauthorized access";
                header('Location:../admin/edit-room.php');
    }
}


////update Room Image
//function updateRoomImage($file,$id){
//    $id = $_POST['id'];
//     $_SESSION['errors'] = array();
//    if($_FILES['room_image']){
//        $sql = "SELECT room_image FROM rooms WHERE id = '$id'";
//        $res = $db->query($sql);
//        if(mysqli_num_rows($res) > 0){
//            $row = mysqli_fetch_assoc($res);
//            $file = $row['room_image'];
//            if(file_exists($file)){
//                unlink($file);
//            }
//        }
//    }
//    //handle file upload
//    $target_folder_dir = "../assets/hotel_rooms/";
//    $target_file = $target_folder_dir.basename($_FILES["room_image"]["name"]);
//    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//    
//    //check if file already exists
//    if(file_exists($target_file)){
//        $_SESSION['errors']['exists'] ='Room image already exists';
//        header('Location:../admin/edit-room.php');
//    }
//    //check file size
//    else if($_FILES["room_image"]["size"] > 30000000){
//        $_SESSION['errors']['big'] ='Image size is too big';
//          header('Location:../admin/edit-room.php');
//        
//    }
//    //check for file formats
//    else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif" && $imageFileType != "jpeg"){
//       $_SESSION['errors']['format'] ='Image format not allowed';
//         header('Location:../admin/edit-room.php');
//        
//    }
//    if(count($_SESSION['errors']) > 0){
//         
//         header('Location:../admin/edit-room.php');
//       
//         }else{
//       $path = move_uploaded_file($_FILES["room_image"]["tmp_name"], $target_file);
//        
//        return $path;
//    
//}
//
//}
//
////EDIT ROOM DETAILS 
//function editRoom($db){
//    $id = $_POST['id'];
//    
//    $_SESSION['errors'] = array();
//    
//    if(isset($_POST['edit-room'])){
//        if(empty($_POST['room_name'])){
//        $_SESSION['errors']['room_name'] = "Name of room is required";
//       
//          }
//        if(empty($_POST['room_category'])){
//        $_SESSION['errors']['room_category'] = "Room category is required";
//       }
//        
//        if(empty($_POST['room_size'])){
//        $_SESSION['errors']['room_size'] = "Room size is required";
//       }
//        
//        if(empty($_POST['room_view'])){
//        $_SESSION['errors']['room_view'] = "Room view is required";
//       }
//       if(empty($_POST['room_bed'])){
//        $_SESSION['errors']['room_bed'] = "No. of bed is required";
//       }
//        if(empty($_POST['room_subject'])){
//        $_SESSION['errors']['room_subject'] = "Room Subject is required";
//       }
//        if(empty($_POST['room_description'])){
//        $_SESSION['errors']['room_description'] = "Room Description is required";
//       }
//        if(empty($_POST['room_price'])){
//        $_SESSION['errors']['room_price'] = "Room Price is required";
//       }
//        if(empty($_POST['max_persons'])){
//        $_SESSION['errors']['max_persons'] = "Maximum No. of persons is required";
//       }
//        if(count($_SESSION['errors']) > 0){
//        header('Location:../admin/edit-room.php');
//    }
//         //  filter and sanitize user inputs
//    
//      $room_name = mysqli_real_escape_string($db,$_POST['room_name']);
//      $room_category = mysqli_real_escape_string($db,$_POST['room_category']);
//      $room_size = mysqli_real_escape_string($db,$_POST['room_size']);
//     $room_view = mysqli_real_escape_string($db,$_POST['room_view']);
//      $room_bed = mysqli_real_escape_string($db,$_POST['room_bed']);
//     $room_subject = mysqli_real_escape_string($db,$_POST['room_subject']);
//        $room_description = mysqli_real_escape_string($db,$_POST['room_description']);
//        $room_price = mysqli_real_escape_string($db,$_POST['room_price']);
//        $max_persons = mysqli_real_escape_string($db,$_POST['max_persons']);
//        
//        
//        
//       $target_folder_dir = "../assets/hotel_rooms/";
//    $target_file = $target_folder_dir.basename($_FILES["room_image"]["name"]);
//      if(updateRoomImage($target_file,$id)){
//          //proceed to insert other fields into db
//            $sql = "UPDATE rooms SET room_name ='$room_name', room_subject ='$room_subject', room_description ='$room_description', category_id ='$room_category', room_image ='$target_file', room_price ='$room_price', room_size ='$room_size', room_view ='$room_view', no_of_bed ='$room_bed', max_persons ='$max_persons' WHERE id = '$id'";
//           
//          $res = $db->query($sql);
//            $affected_rows = $db->affected_rows;
//            
//            //if there was an update
//            if($affected_rows > 0){
//                $_SESSION['success'] ='Room details has been updated successfully';
//          header('Location:../admin/edit-room.php');
//            }
//           else{
//               $_SESSION['errors']['error'] ='Could not update Room details in the Database';
//          header('Location:../admin/edit-room.php');
//               
//           }
//            
//      }
//         
//}else{
//        $_SESSION['errors']['unauthorized'] = "Unauthorized access";
//        header("Location:../admin/edit-room.php");
//    }
//}




//Delete User
function deleteUser($db){
    $id= $_POST['id'];
    $_SESSION['errors'] = array();
    if(isset($_POST['delete-user'])){
    $sql= "DELETE FROM users WHERE id = '$id'";
        $res = $db->query($sql);
            $affected_rows = $db->affected_rows;
            
            //if there was a delete
            if($affected_rows > 0){
                $_SESSION['success']= "User Contact has been deleted successfully";
                header('Location:../admin/users.php');
            }else{
              $_SESSION['errors']['error']="Whoops, something went wrong";
                header('Location:../admin/users.php');
            }
}else{
        $_SESSION['errors']['error']="Unauthorized access";
                header('Location:../admin/users.php');
    }

}

//Make User an Admin
function makeAdmin($db){
    $id= $_POST['id'];
    $_SESSION['errors'] = array();
    if(isset ($_POST['make-admin'])){
        $sql= "UPDATE users SET role = 'Admin' WHERE id = '$id'";
        $res = $db->query($sql);
            $affected_rows = $db->affected_rows;
            
            //if there was an update
            if($affected_rows > 0){
                $_SESSION['success']= "Contact has been made an Admin successfully";
                header('Location:../admin/users.php');
            }else{
              $_SESSION['errors']['error']="Whoops, something went wrong";
                header('Location:../admin/users.php');
            }
}else{
        $_SESSION['errors']['error']="Unauthorized access";
                header('Location:../admin/users.php');
    }
    
}

//Make Admin a User
function makeUser($db){
    $id= $_POST['id'];
    $_SESSION['errors'] = array();
    if(isset ($_POST['make-user'])){
        $sql= "UPDATE users SET role = 'User' WHERE id = '$id'";
        $res = $db->query($sql);
            $affected_rows = $db->affected_rows;
            
            //if there was an update
            if($affected_rows > 0){
                $_SESSION['success']= "Contact has been made a User successfully";
                header('Location:../admin/users.php');
            }else{
              $_SESSION['errors']['error']="Whoops, something went wrong";
                header('Location:../admin/users.php');
            }
}else{
        $_SESSION['errors']['error']="Unauthorized access";
                header('Location:../admin/users.php');
    }
    
}

//Change enquiry status to read
function readEnquiry($db){
    $id= $_POST['id'];
    $_SESSION['errors'] = array();
    if(isset ($_POST['read-enquiry'])){
        $sql= "UPDATE contact SET contact_status = 'Read' WHERE id = '$id'";
         $res = $db->query($sql);
            $affected_rows = $db->affected_rows;
            
            //if there was an update
            if($affected_rows > 0){
                 $_SESSION['success']= "Enquiry has been read successfully";
                header('Location:../admin/unread-enquiry.php');
            }else{
              $_SESSION['errors']['error']="Whoops, something went wrong";
                header('Location:../admin/unread-enquiry.php');
            }
}else{
        $_SESSION['errors']['error']="Unauthorized access";
                header('Location:../admin/unread-enquiry.php');
    }
    
}

//Delete Enquiry
function deleteEnquiry($db){
    $id= $_POST['id'];
    $_SESSION['errors'] = array();
    if(isset ($_POST['delete-enquiry'])){
        $sql= "DELETE FROM contact WHERE id = '$id'";
         $res = $db->query($sql);
            $affected_rows = $db->affected_rows;
            
            //if there was an update
            if($affected_rows > 0){
                 $_SESSION['success']= "Enquiry has been successfully deleted";
                header('Location:../admin/read-enquiry.php');
            }else{
              $_SESSION['errors']['error']="Whoops, something went wrong";
                header('Location:../admin/read-enquiry.php');
            }
}else{
        $_SESSION['errors']['error']="Unauthorized access";
                header('Location:../admin/read-enquiry.php');
    }
    
}

//For replying an enquiry
function replyMessage($db){
     $id= $_POST['id'];
    
    $_SESSION['errors']= array();

//collect user data

if(isset ($_POST['reply-message'])){
    //check for empty fields
   if(empty($_POST['from'])){
       $_SESSION['errors']['from']= "Sender's email is required";
   }
    if(empty($_POST['to'])){
       $_SESSION['errors']['email']= "Recipient's email is required";
   } 
    if(empty($_POST['subject'])){
       $_SESSION['errors']['subject']= "Subject Header is required";
   }
    if(empty($_POST['message'])){
       $_SESSION['errors']['message']= "Message Body is required";
   } 
    // filter and sanitize user inputs
    $from = mysqli_real_escape_string($db,$_POST['from']);
    $to = mysqli_real_escape_string($db,$_POST['to']);
    $subject = mysqli_real_escape_string($db,$_POST['subject']);
    $message = mysqli_real_escape_string($db,$_POST['message']);
     
    if(App\helper::checkEmail($from)){
        $_SESSION['errors']['invalidEmail'] = "Invalid email format";
        header('Location:../admin/read-enquiry.php');
    }
    if(App\helper::checkEmail($to)){
        $_SESSION['errors']['invalidEmail'] = "Invalid email format";
        header('Location:../admin/read-enquiry.php');
    }
    
    if(count($_SESSION['errors']) > 0){
        header('Location:../admin/read-enquiry.php');
    }
    
    else{
        //To send HTML Mail
        $headers = 'MIME-Version: 1.0'. "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1'. "\r\n";
        //create email headers
        $headers .= 'From: '.$from."\r\n".'X-Mailer: PHP/'.phpversion();
        //compose a HTML email
        $message = '<html><body style="color: #080; font-size:18px;">';
        $message .= '</body></html>';
        
        //sending mail
        if(mail($to, $subject, $message, $headers)){
           $_SESSION['success'] = 'Email was sent successfully';
                header('Location:../admin/read-enquiry.php');
         }else{
                $_SESSION['errors']['error']='Whoops, something went wrong';
                header('Location:../admin/read-enquiry.php');
            }
        
    }
    
}else{
        $_SESSION['errors']['error']="Unauthorized access";
                header('Location:../admin/read-enquiry.php');
    }
    
}

//Send enquiry
function insertEnquiry($db){
    
$_SESSION['errors']= array();

//collect user data

if(isset ($_POST['sendMessage'])){
    //check for empty fields
   if(empty($_POST['name'])){
       $_SESSION['errors']['name']= "Your Name is required";
   }
    if(empty($_POST['email'])){
       $_SESSION['errors']['email']= "Your Email is required";
   } 
    if(empty($_POST['subject'])){
       $_SESSION['errors']['subject']= "Your Subject is required";
   }
    if(empty($_POST['message'])){
       $_SESSION['errors']['message']= "Your Message is required";
   } 
    // filter and sanitize user inputs
    $name = mysqli_real_escape_string($db,$_POST['name']);
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $subject = mysqli_real_escape_string($db,$_POST['subject']);
    $message = mysqli_real_escape_string($db,$_POST['message']);
    $date = date("d/m/y");   
    
    
    if(App\helper::checkEmail($email)){
        $_SESSION['errors']['invalidEmail'] = "Invalid email format";
        header('Location:../auth/contact.php');
    }
    
    
    if(count($_SESSION['errors']) > 0){
        header('Location:../auth/contact.php');
    }
    //if no errors
    else{
            //insert into db
            $sql = "INSERT INTO contact (contact_name, contact_email, contact_subject, contact_message, contact_date) VALUES('$name','$email','$subject','$message','$date')";
            //run msql query
            $res = mysqli_query($db, $sql);
            if($res){
                $_SESSION['success'] = 'Your message was sent successfully';
                header('Location:../auth/contact.php');
            }else{
                $_SESSION['errors']['error']='Whoops, something went wrong';
                header('Location:../auth/contact.php');
            }
        }
    
    
}else{
    //redirect the user back
    header('Location:../auth/contact.php');
}

}

//get and display bookings
function getBookings($db){
    $sql= "SELECT * FROM bookings ORDER BY id ASC";
    $res = $db->query($sql);
    return $res;
}

//get and display new bookings
function getNewBookings($db){
    $sql= "SELECT * FROM bookings WHERE booking_status = 'Pending' ORDER BY id ASC";
    $res = $db->query($sql);
    return $res;
}

//get and display approved  bookings
function getApprovedBookings($db){
    $sql= "SELECT * FROM bookings WHERE booking_status = 'Approved' ORDER BY id ASC";
    $res = $db->query($sql);
    return $res;
}

//get and display cancelled bookings
function getCancelledBookings($db){
    $sql= "SELECT * FROM bookings WHERE booking_status = 'Cancelled' ORDER BY id ASC";
    $res = $db->query($sql);
    return $res;
}

//aprroving a booking
function approveBooking($db){
    $id= $_POST['id'];
    $_SESSION['errors'] = array();
    if(isset ($_POST['approve-booking'])){
        $sql= "UPDATE bookings SET booking_status = 'Approved' WHERE id = '$id'";
         $res = $db->query($sql);
            $affected_rows = $db->affected_rows;
            
            //if there was an update
            if($affected_rows > 0){
                 $_SESSION['success']= "Booking has been approved successfully";
                header('Location:../admin/new-booking.php');
            }else{
              $_SESSION['errors']['error']="Whoops, something went wrong";
                header('Location:../admin/new-booking.php');
            }
}else{
        $_SESSION['errors']['error']="Unauthorized access";
                header('Location:../admin/new-booking.php');
    }
}


//confirming a booking
function confirmBooking($db){
      $id= $_POST['id'];
    $_SESSION['errors'] = array();
    if(isset ($_POST['confirm-booking'])){
        $sql= "UPDATE bookings SET admin_remark = 'Confirmed! Thanks for choosing our Hotel' WHERE id = '$id'";
         $res = $db->query($sql);
            $affected_rows = $db->affected_rows;
            
            //if there was an update
            if($affected_rows > 0){
                 $_SESSION['success']= "Booking has been confirmed successfully";
                header('Location:../admin/new-booking.php');
            }else{
              $_SESSION['errors']['error']="Whoops, something went wrong";
                header('Location:../admin/new-booking.php');
            }
}else{
        $_SESSION['errors']['error']="Unauthorized access";
                header('Location:../admin/new-booking.php');
    }
}


//cancelling a booking
function cancelBooking($db){
   $id= $_POST['id'];
    $_SESSION['errors'] = array();
    if(isset ($_POST['cancel-booking'])){
        $sql= "UPDATE bookings SET booking_status = 'Cancelled' WHERE id = '$id'";
         $res = $db->query($sql);
            $affected_rows = $db->affected_rows;
            
            //if there was an update
            if($affected_rows > 0){
                 $_SESSION['success']= "Booking has been cancelled successfully";
                header('Location:../admin/new-booking.php');
            }else{
              $_SESSION['errors']['error']="Whoops, something went wrong";
                header('Location:../admin/new-booking.php');
            }
}else{
        $_SESSION['errors']['error']="Unauthorized access";
                header('Location:../admin/new-booking.php');
    } 
}

//search bookings
function searchBooking($db){
    if(isset ($_GET['search-booking']))
        $bookingNumber = $_GET['bookingNumber'];
    $sql = "SELECT * FROM bookings WHERE booking_number = '$bookingNumber'";
    $res = $db->query($sql);
    return $res;
}

?>