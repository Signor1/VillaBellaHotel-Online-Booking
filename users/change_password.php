<!DOCTYPE html>
<html lang="en">
<?php    
include_once("../includes/head.php");
    include_once("../helper/functions.php");
    
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset ($_POST['resetPassword'])){
        updateUserPassword($db);
    }
}
  
    
?>
<body>    
<?php 
  include_once("../includes/home_navbar.php");  
?> 
    <!-----Welcome note------>
<section class="hero-wrap" style="background-image: url('../assets/images/banner-slider-1.jpg');">
<div class="overlay"></div>
<div class="container">
<div class="row no-gutters slider-text align-items-center justify-content-center">
<div class="col-lg-10 text-center">
    <p class="breadcrumbs"><span class="me-2"><a href="../default/home.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>My Account <i class="fa fa-chevron-right"></i></span> <span> Change Password</span></p>
<h1 class="mb-4">Change My Password</h1>
</div>
</div>
</div>
</section>
    <!-----End of Welcome note------>

    
    <!---My Profile--->
    
    <section class="ftco-section bg-light justify-content-center">
<div class="container">
<div class="row justify-content-center mb-4">
    <div class="col-md-3 col-xl-4 text-center d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
<div class="services">
<div class="icon"><span class="fa fa-key"></span></div>
    <div class="text">
<h1 class="text-muted">New Password</h1>
</div>
        </div>
    </div>
    </div>
    <div class="row justify-content-center">
    <div class="col-lg-8">
           <?php if(isset($_SESSION['success'])): ?>
                <ul class="error-msg">
                <li class="alert alert-success alert-dismissable" data-dismiss="alert">&times; <?php echo $_SESSION['success']; ?></li>
                </ul>
                <?php endif; ?>
                <?php if(isset($_SESSION['error'])): ?>
                <ul class="error-msg">
                <li class="alert alert-danger alert-dismissable" data-dismiss="alert">&times; <?php echo $_SESSION['error']; ?></li>
                </ul>
                <?php endif; ?>
                
                <?php if(isset($_SESSION['errors'])): ?>
                <?php foreach($_SESSION['errors'] as $err => $errMsg) : ?>
                <ul class="error-msg">
                <li class="alert alert-danger alert-dismissable" data-dismiss="alert">&times; <?php echo $errMsg; ?></li>
                </ul>
                <?php endforeach; ?>
                <?php endif; ?>
        </div>
    </div>
    <div class="row justify-content-center my-4">
<div class="col-md-12">
    
<div class="wrapper justify-content-center">
<div class="row g-0 justify-content-center">
<div class="col-lg-8 justify-content-center">
   
    <div id="form-holder">
  <?php
        $rows = getUserProfile($db);
       
        ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <?php while($row = mysqli_fetch_assoc($rows)): ?>
        <input type="hidden" name="id"  value="<?php echo $row['id']; ?>" />
        <div class="form-group mb-4">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" id="email" value="<?php echo $row['email']; ?>" name="email" readonly/>    
        </div> 
        <label for="newpassword">New Password</label>
        <div class="input-group">
        
        <input type="password" class="form-control" id="newpassword" placeholder="Enter Your New Password" name="newPassword" required/> 
            <div class="input-group-append">
                <button type="button" onclick="showPass()" class="btn btn-primary" id="eye"><i class="fas fa-eye-slash"></i><span class="fa fa-eye" style="display:none"></span></button>
                </div>
        </div>
        <small id="passwordHelp" class="text-muted text-primary mb-3">Must be 8 characters long.</small><br>
        <br/>
        <label for="confirmPassword">Confirm Password</label>
        <div class="input-group mb-4">
        <input type="password" class="form-control " id="confirmPassword" placeholder="Confirm Your Password" name="confirmPassword" required/> 
            <div class="input-group-append">
                <button type="button" onclick="showPass()" class="btn btn-primary" id="eye"><i class="fas fa-eye-slash"></i><span class="fa fa-eye" style="display:none"></span></button>
                </div>
        </div> 
        <?php endwhile; ?>
        <button type="submit" name="resetPassword" class="btn btn-block btn-primary p-4 py-3 mb-4" style="width:100%">RESET PASSWORD</button>
        </form>
    </div>
    
    </div>
    </div>
    </div>
        </div>
    </div>
        </div>
    </section>
    
    <!---End of Profile display--->
    
    <?php
    include_once("../includes/footer.php");
    include_once("../includes/js_files.php");
    ?>
    
    </body>
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
            margin-bottom: 40px !important;
        }
        #eye{
            height: 45px !important;
        }
    
    </style>
    
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