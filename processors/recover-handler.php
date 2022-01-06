<?php

session_start();
//include your dbconfig and helper files
require_once("../config/dbconfig.php");
require_once("../helper/helper.php");

$_SESSION['errors']= array();

//collect user data

if(isset ($_POST['resetPassword'])){
    //check for empty fields
  
    if(empty($_POST['email'])){
       $_SESSION['errors']['email']= "Your Email is required";
   } 
    if(empty($_POST['newPassword'])){
       $_SESSION['errors']['password']= "Your Password is required";
   } 
    if(empty($_POST['confirmPassword'])){
       $_SESSION['errors']['confirmPassword']= "Confirm your password";
   } 
    
    // filter and sanitize user inputs
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $newPassword = mysqli_real_escape_string($db,$_POST['newPassword']);
    $confirmPassword = mysqli_real_escape_string($db,$_POST['confirmPassword']);
      
    
    if(App\helper::checkPsw($newPassword)){
        $_SESSION['errors']['passwordFailure'] = "Password should be minimum of 8 characters";
        header('Location:../auth/forgot.php');
    }
    
    if(App\helper::checkEmail($email)){
        $_SESSION['errors']['invalidEmail'] = "Invalid email format";
        header('Location:../auth/forgot.php');
    }
    
    if(App\helper::confirmPassword($newPassword,$confirmPassword)){
        $_SESSION['errors']['passwordMisMatch'] = "Password mismatch";
        header('Location:../auth/forgot.php');
    }
    
    if(count($_SESSION['errors']) > 0){
        header('Location:../auth/forgot.php');
    }
    //if no errors
    else{
        //check if user does not exists
        $sql = "SELECT * from users where email = '$email'";
        $res = $db->query($sql);
        if($res->num_rows <= 0){
            $_SESSION['errors']['user']= "Sorry, User does not exists. Signup!";
            header('Location:../auth/forgot.php');
            
        }else{
            //user does not exist
            //hash the user's password
            $newHashpassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
            //insert into db
            $sql = "UPDATE users SET password  = '$newHashpassword' WHERE email = '$email'";
            //run msql query
            $res = mysqli_query($db, $sql);
            $affected_rows = $db->affected_rows;
            //if there was an update
            if($affected_rows > 0){
                $_SESSION['success']= "Your Password has been changed successfully";
                header('Location:../auth/login.php');
            }else{
                $_SESSION['errors']['error']='Whoops, something went wrong';
                header('Location:../auth/forgots.php');
            }
        }
    }
    
}else{
    //redirect the user back
    header('Location:../auth/forgot.php');
}



?>