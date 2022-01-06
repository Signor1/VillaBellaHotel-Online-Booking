<!DOCTYPE html>
<html lang="en">
<?php    
    session_start();
include_once("../includes/head.php");
?>
<body class="bg-darken">    
<?php 
  include_once("../includes/welcome_navbar.php");  
?>    
<section class="hero-wrap" style="background-image: url('../assets/images/blog-3.jpg');">
    <br>
<div class="overlay"></div>
<div class="container">
<div class="row  align-items-center justify-content-center">
<div class="col-lg-6 text-white">
    <br>
    </br>
    
    </br>
    <h3 class="text-white text-center mb-3"><b>Password Recovery</b></h3>
<!---Login form ----->
    <div id="form-holder">
        <?php
            if(isset($_SESSION['errors'])):
            ?>
            <?php foreach($_SESSION['errors'] as $err => $errMsg): ?>
            <ul class="error-msg">
            <li class="alert alert-danger alert-dismissable" data-dismiss="alert">&times; <?php echo $errMsg; ?>
                </li>
            </ul>
            <?php endforeach; ?>
            <?php endif;
            session_destroy()
                ?>
    <form method="post" action="../processors/recover-handler.php">
        <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" class="form-control mb-4" id="email" placeholder="Enter Your E-mail" name="email" required/>    
        </div> 
        <label for="newpassword">New Password</label>
        <div class="input-group">
        
        <input type="password" class="form-control" id="newpassword" placeholder="Enter Your New Password" aria-describedby="passwordHelp" name="newPassword" required/>    
             <div class="input-group-append">
                <button type="button" onclick="showPass()" class="btn btn-primary" id="eye"><i class="fas fa-eye-slash"></i><span class="fa fa-eye" style="display:none"></span></button>
                </div>
        </div>
        <small id="passwordHelp" class="text-muted">Must be 8 characters long.</small><br> 
         <label for="confirmPassword">Confirm Password</label>
        <div class="input-group">
       
        <input type="password" class="form-control mb-4" id="confirmPassword" placeholder="Confirm Your Password" name="confirmPassword" required/>  
            <div class="input-group-append">
                <button type="button" onclick="showPass()" class="btn btn-primary" id="eye"><i class="fas fa-eye-slash"></i><span class="fa fa-eye" style="display:none"></span></button>
                </div>
        </div> 
        
        <button type="submit" name="resetPassword" class="btn btn-block btn-primary p-4 py-3 mb-4" style="width:100%">RESET PASSWORD</button>
        <a href="../auth/signup.php">You Have Not Signed-Up?</a>
        </form>
    </div>
    <!--- End of login form---->
    <style>
        #form-holder{
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            border-radius: 20px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.25);
            border-top: 1px solid rgba(255,255,255,0.5);
            border-left: 1px solid rgba(255,255,255,0.5);
            padding: 40px;
            background: none;
            
        }
        #eye{
            height: 45px !important;
        }
    
    </style>
</div>
</div>
</div>
    
</section>
    <?php 
    include_once("../includes/copyright.php");
        include_once("../includes/js_files.php");
    ?>
</body>
    
<script>
    
    function showPass(){
        
      var inputType = $("#newpassword").attr('type');
        if(inputType == 'password'){
           $('.fa-eye').css({display: "block"});
        $('.fa-eye-slash').css({display: "none"});
        $("#newpassword").attr('type',"text");
            $('#confirmPassword').attr('type',"text");
            
        }else if(inputType == "text"){
             $('.fa-eye').css({display: "none"});
        $('.fa-eye-slash').css({display: "block"});
        $("#newpassword").attr('type',"password");
            $('#confirmPassword').attr('type',"password");
        }
        
    }
  
</script>

</html>