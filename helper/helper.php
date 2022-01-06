<?php

namespace App;

class helper{
    public static function checkPsw($password){
        if(strlen($password) < 8){
            return true;
        }else{
            return false;
        }
    }
    
//validate email format
    
    public static function checkEmail($email){
        $regExp = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9]+)*(\.[a-z]{2,3})$/";
        
        if(!preg_match($regExp, $email)){
            return true;
        }else{
            return false;
        }
    }
    
    //validate password and confirm password
    public static function confirmPassword($password,$confirmPassword){
        if($password != $confirmPassword){
            return true;
        }else{
            return false;
        }
    }
    
    public static function formatNumber($val){
        $value = number_format($val);
        return $value;
    }
    
    public static function formatAmount($val){
        $amount = number_format($val);
        return "&#8358;".$amount;
    }
}


?>