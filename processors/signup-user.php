<?php

session_start();
//include your dbconfig and helper files
require_once("../config/dbconfig.php");
require_once("../helper/helper.php");

$_SESSION['errors']= array();

//collect user data

if(isset ($_POST['submit'])){
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
    if(empty($_POST['gender'])){
       $_SESSION['errors']['gender']= "Your Gender is required";
   }
    if(empty($_POST['password'])){
       $_SESSION['errors']['password']= "Your Password is required";
   } 
    if(empty($_POST['confirmPassword'])){
       $_SESSION['errors']['confirmPassword']= "Confirm your password";
   } 
    
    // filter and sanitize user inputs
    $firstname = mysqli_real_escape_string($db,$_POST['firstname']);
    $lastname = mysqli_real_escape_string($db,$_POST['lastname']);
    $phonenumber = mysqli_real_escape_string($db,$_POST['number']);
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $gender = mysqli_real_escape_string($db,$_POST['gender']);
    $password = mysqli_real_escape_string($db,$_POST['password']);
    $confirmPassword = mysqli_real_escape_string($db,$_POST['confirmPassword']);
    $date = date("d/m/y");   
    
    if(App\helper::checkPsw($password)){
        $_SESSION['errors']['passwordFailure'] = "Password should be minimum of 8 characters";
        header('Location:../auth/signup.php');
    }
    
    if(App\helper::checkEmail($email)){
        $_SESSION['errors']['invalidEmail'] = "Invalid email format";
        header('Location:../auth/signup.php');
    }
    
    if(App\helper::confirmPassword($password,$confirmPassword)){
        $_SESSION['errors']['passwordMisMatch'] = "Password mismatch";
        header('Location:../auth/signup.php');
    }
    
    if(count($_SESSION['errors']) > 0){
        header('Location:../auth/signup.php');
    }
    //if no errors
    else{
        //check if user already exists
        $sql = "SELECT * from users where email = '$email'";
        $res = $db->query($sql);
        if($res->num_rows >= 1){
            $_SESSION['errors']['user']= "Sorry, User already exists";
            header('Location:../auth/signup.php');
            
        }else{
            //user does not exist
            //hash the user's password
            $hashpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
            //insert into db
            $sql = "INSERT INTO users(first_name,last_name, mobile_number, gender, email, password, date_of_reg) VALUES('$firstname','$lastname','$phonenumber','$gender','$email','$hashpassword','$date')";
            //run msql query
            $res = mysqli_query($db, $sql);
            if($res){
                $_SESSION['reg_success'] = 'Registration was successful';
                header('Location:../auth/login.php');
            }else{
                $_SESSION['errors']['error']='Whoops, something went wrong';
                header('Location:../auth/signup.php');
            }
        }
    }
    
}else{
    //redirect the user back
    header('Location:../auth/signup.php');
}



?>