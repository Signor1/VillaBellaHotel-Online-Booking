<!DOCTYPE html>
<html lang="en">
<?php    
    include_once("../helper/custom-functions.php");
    include_once("../helper/helper.php");
include_once("../includes/head.php");
    
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if(isset ($_POST['id'])){
        getDetails($db);
    }
}
    
?>
<body>    
<?php 
  include_once("../includes/home_navbar.php");  
?> 
    <!-----Welcome note------>
<section class="hero-wrap" style="background-image: url('../assets/images/gallery-3.jpg');">
<div class="overlay"></div>
<div class="container">
<div class="row no-gutters slider-text align-items-center justify-content-center">
<div class="col-lg-10 text-center">
<span class="subheading">Enjoy Your Wonderful Time With A Great Luxury Experience!</span>
<h1 class="mb-4">Cozzy Rooms/Halls</h1>
</div>
</div>
</div>
</section>
    <!-----End of Welcome note------>
    
<!----Availability Check---->
    
    <section class="ftco-section ftco-no-pb ftco-no-pt ftco-booking">
<div class="container">
<div class="row">
<div class="col-md-12">
<form class="booking-form">
<div class="row g-0">
<div class="col-md-6 col-lg form-wrap d-flex py-3 py-lg-5 px-4">
<div class="form-group ps-4 border-0">
<label for="#">Check-In</label>
<div class="form-field">
<div class="icon"><span class="fa fa-calendar"></span></div>
<input type="date" name="checkIn" class="form-control arrival_date" placeholder="Check-In Date">
</div>
</div>
</div>
<div class="col-md-6 col-lg form-wrap d-flex py-3 py-lg-5 px-4">
<div class="form-group ps-4">
<label for="#">Check-Out</label>
<div class="form-field">
<div class="icon"><span class="fa fa-calendar"></span></div>
<input type="date" name="checkOut" class="form-control departure_date" placeholder="Check-Out Date">
</div>
</div>
</div>
<div class="col-md-6 col-lg form-wrap d-flex py-3 py-lg-5 px-4">
<div class="form-group ps-4">
<label for="#">Rooms</label>
<div class="form-field">
<div class="select-wrap">
<div class="icon"><span class="fa fa-chevron-down"></span></div>
<select name="rooms" id="" class="form-control">
     <?php $rows = getAllRoom($db); ?>
    <option value="">Select Room</option>
        <?php while($row = mysqli_fetch_assoc($rows)): ?>
<option value="<?php echo $row['room_name']; ?>"><?php echo $row['room_name']; ?></option>
<?php endwhile; ?>
</select>
</div>
</div>
</div>
</div>
<div class="col-md-6 col-lg form-wrap d-flex py-3 py-lg-5 px-4">
<div class="form-group ps-4">
<label for="#">Guests</label>
<div class="form-field">
<div class="select-wrap">
<div class="icon"><span class="fa fa-chevron-down"></span></div>
<select name="guests" id="" class="form-control">
    <option value="">Select Guests</option>
<option value="1 person">1 Person</option>
<option value="2 person">2 Person</option>
<option value="3 person">3 Person</option>
<option value="4 person">4 Person</option>
<option value="5 person">5 Person</option>
<option value="6-9 person">6-9 Person</option>
<option value="10+ person">10+ Person</option>
</select>
</div>
</div>
</div>
</div>
<div class="col-md-12 col-lg d-flex">
<div class="form-group d-flex border-0">
<div class="form-field w-100 align-items-center d-flex">
<a href="../default/available.php" class="d-flex justify-content-center align-items-center align-self-stretch form-control btn btn-primary py-lg-4 py-xl-0"><span>Check Availability</span></a>

</div>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</section>
    
    <!-----End of Availability Check------>
    
<!---Display of rooms ----->
    
    <section class="ftco-section bg-light">
<div class="container-xl">
<div class="row justify-content-center">
    <?php
           $rows = getAllRoom($db);
           while($row = mysqli_fetch_assoc($rows)):
           
           ?>
    
<div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="flip-left" data-aos-delay="100" data-aos-duration="1000">
<div class="room-wrap d-md-flex flex-md-column-reverse">
<a href="../default/room_details.php?id=<?php echo $row['id'];?>" class="img img-room" style="background-image: url(<?php echo $row['room_image']; ?>);">
</a>
<div class="text p-4 text-center" style="height:50% !important">
<h3><a href="../default/room_details.php?id=<?php echo $row['id'];?>"><?php echo $row['room_name']; ?></a></h3>
<p><?php echo $row['room_subject']; ?></p>
<p class="mb-0 mt-2"><span class="me-3 price"><?php echo App\helper::formatAmount($row['room_price']); ?> <small>/ night</small></span><a href="../default/room_details.php?id=<?php echo $row['id'];?>" class="btn-custom">Details</a></p>
</div>
</div>
</div>

    <?php endwhile; ?>
</div>

</div>
</section>
<hr>
    
<!--- End of rooms display---->    

    <!---Our services----->
    
    <section class="ftco-section">
<div class="container-xl">
<div class="row justify-content-center">
<div class="col-md-8 heading-section text-center mb-5" data-aos="fade-up" data-aos-duration="1000">
<span class="subheading">Villa-Bella Services</span>
<h2 class="mb-4">Our Hotel Services</h2>
</div>
</div>
<div class="row justify-content-center">
<div class="col-md-3 col-xl-2 text-center d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
<div class="services">
<div class="icon"><span class="fa fa-wifi"></span></div>
<div class="text">
<h2>Free Wifi</h2>
</div>
</div>
</div>
<div class="col-md-3 col-xl-2 text-center d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
<div class="services">
<div class="icon"><span class="fa fa-bed"></span></div>
<div class="text">
<h2>Easy Booking</h2>
</div>
</div>
</div>
<div class="col-md-3 col-xl-2 text-center d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
<div class="services">
<div class="icon"><span class="fas fa-bread-slice"></span></div>
<div class="text">
<h2>Restaurant</h2>
</div>
</div>
</div>
<div class="col-md-3 col-xl-2 text-center d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
<div class="services">
<div class="icon"><span class="fas fa-swimming-pool"></span></div>
<div class="text">
<h2>Swimming Pool</h2>
</div>
</div>
</div>
<div class="col-md-3 col-xl-2 text-center d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
<div class="services">
<div class="icon"><span class="fas fa-spa"></span></div>
<div class="text">
<h2>Beauty &amp; Health</h2>
</div>
</div>
</div>
<div class="col-md-3 col-xl-2 text-center d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
<div class="services">
<div class="icon"><span class="fas fa-hands-helping"></span></div>
<div class="text">
<h2>Help &amp; Support</h2>
</div>
</div>
</div>
</div>
</div>
</section>
    
    <!--End of services display---->
    
<!---Footer---->
 <?php 
    include_once("../includes/footer.php");
    ?>
<!---End of Footer---->    