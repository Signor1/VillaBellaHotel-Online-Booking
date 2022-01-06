<!DOCTYPE html>
<html lang="en">
<?php    
    include_once('../helper/functions.php');
    include_once('../helper/helper.php');
include_once("../includes/head.php");
?>
<body>    
<?php 
  include_once("../includes/home_navbar.php");  
?> 
    <!-----Welcome note------>
<section class="hero-wrap" style="background-image: url('../assets/images/big-img-6.jpg');">
<div class="overlay"></div>
<div class="container">
<div class="row no-gutters slider-text align-items-center justify-content-center">
<div class="col-lg-10 text-center">
<p class="breadcrumbs"><span class="me-2"><a href="../default/home.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>Booking</span></p>
<h1 class="mb-4">Book Your Room</h1>
</div>
</div>
</div>
</section>
    <!-----End of Welcome note------>
    
    <!---Booking form ----->
    <section class="ftco-section bg-light justify-content-center">
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-3 col-xl-4 text-center d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
<div class="services">
<div class="icon"><span class="fa fa-door-open"></span></div>
    <div class="text">
<h1 class="text-muted">Easy Booking</h1>
</div>
        </div>
    </div>
    </div>
    <div class="row justify-content-center my-4">
<div class="col-md-12">
    
<div class="wrapper justify-content-center">
<div class="row g-0 justify-content-center">
<div class="col-lg-8 justify-content-center">

    <div id="form-holder" class="my-4">
        
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
                <?php endif;
                
                    ?>
        
    <form method="post" action="../processors/booking-handler.php">
        <div class="form-group mb-3">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name" autocapitalize="words" required/>    
        </div>
        <div class="form-group mb-3">
        <label for="number">Mobile Number</label>
        <input type="number" class="form-control" id="number" placeholder="Enter Your Mobile Number" name="number" required/> 
        </div> 
        <div class="form-group mb-3">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" id="email" placeholder="Enter Your E-mail" name="email" required/>    
        </div> 
        <div class="form-group mb-3">
        <label for="cardtype">ID Type</label>
        <select class="form-control" id="cardtype" name="cardType">
            <option value="">Choose ID Type</option>
            <option value="Voter's Card">Voter's Card</option>
            <option value="Driving Licence Card">Driving Licence Card</option>
            <option value="Passport">Passport</option>
            </select>    
        </div>
        <div class="form-group mb-3">
            <label for="gender">Gender</label><br>
        <div class="form-check form-check-inline my-2">
        <input type="radio" class="form-check-input" name="gender" id="male" value="Male">
            <label for="male" class="form-check-label">Male</label>
        </div>
        <div class="form-check form-check-inline my-2">
        <input type="radio" class="form-check-input" name="gender" id="female" value="Female">
            <label for="female" class="form-check-label">Female</label>
        </div>
        </div>
        
        <div class="form-group mb-3">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" placeholder="Enter Your Address" name="address" autocapitalize="words" required/>    
        </div>
        
        <div class="form-group mb-3">
        <label for="checkInDate">Check-In Date</label>
        <input type="date" class="form-control" id="checkInDate" placeholder="Enter Your Password" name="checkInDate" required/>    
        </div>
        <div class="form-group mb-3">
        <label for="checkOutDate">Check-Out Date</label>
        <input type="date" class="form-control" id="checkOutDate" placeholder="Confirm Your Password" name="checkOutDate" required/>    
        </div>
        <div class="form-group mb-3">
        <label for="roomtype">Room Type</label>
         <?php $row = getRooms($db); ?>
                                          <label for="roomtype">Room Type</label>
                                           <select class="form-control" id="roomtype" name="room_name">
                                            <option value="">Choose Your Room Type</option>
                                               <?php while($rows = mysqli_fetch_assoc($row)): ?>
                                             <option value="<?php echo $rows['room_name']; ?>"><?php echo $rows['room_name']; ?></option>
                                             <?php endwhile; ?>
                                             </select>    
        </div>
        <div class="form-group form-check mb-3">
        <input type="checkbox" name="agreeToTerms" class="form-check-input" id="terms" required/>
            <label class="form-check-label" for="terms">I agree to <a href="../default/terms.php">Terms And Conditions</a></label>
        </div>
    
            <button type="submit" name="book" class="btn btn-primary p-4 py-3 my-4" style="width:50%; margin-left:25%">SEND</button>
    
        </form>
    </div>
    
    </div>
    </div>
    </div>
    </div>
    </div>
        </div>
    </section>
    <!--- End of signup form---->
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
        
    
    </style>