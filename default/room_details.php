<!DOCTYPE html>
<html lang="en">
<?php    
include_once("../includes/head.php");
    include_once("../helper/helper.php");
    include_once("../helper/custom-functions.php");
?>
<body>    
<?php 
  include_once("../includes/home_navbar.php");  
?> 
    <!-----Welcome note------>
<section class="hero-wrap" style="background-image: url('../assets/images/gallery-4.jpg');">
<div class="overlay"></div>
<div class="container">
<div class="row no-gutters slider-text align-items-center justify-content-center">
<div class="col-lg-10 text-center">
<p class="breadcrumbs"><span class="me-2"><a href="../default/home.php">Home <i class="fa fa-chevron-right"></i></a></span> <span class="me-2"><a href="../default/rooms.php">Rooms <i class="fa fa-chevron-right"></i></a></span> <span>Room Description <i class="fa fa-chevron-right"></i></span></p>
<h1 class="mb-4">Room Description</h1>
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
<form  class="booking-form">
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
    
<!--- Room Description----->
    
<section class="ftco-section ftco-room-section">
<div class="container">
<div class="row justify-content-center">
    <?php
        $rows = getDetails($db);
        $row = mysqli_fetch_assoc($rows);
           
        ?>
<div class="col-lg-10 blog-single">
    <div class="card mb-4">
        <div class="card-body bg-dark">
<div class="carousel-room">
<div class="item">
<div class="room-detail img" style="background-image: url(<?php echo $row['room_image']; ?>)">
</div>
</div>
</div>
    </div>
    </div>
    <h2 class="text-center"><?php echo $row['room_name']; ?></h2>
    
    <br>
   
        <p><?php echo $row['room_description']; ?></p>
<div class=" justify-content-center d-md-flex mt-5 mb-5">
<ul class="list">
<li><span>Max: </span><?php echo $row['max_persons']; ?> Persons</li>
</ul>
    <ul class="list ms-md-5">
<li><span>Size: </span><?php echo $row['room_size']; ?></li>
</ul>
<ul class="list ms-md-5">
<li><span>View: </span><?php echo $row['room_view']; ?></li>
</ul>
<ul class="list ms-md-5">
<li><span>Bed: </span><?php echo $row['no_of_bed']; ?></li>
</ul>        
</div>  
        
<h3 class="text-center mb-4">Room Features</h3>
     <div class="d-md-flex justify-content-center mb-4">
<ul class="categories me-md-4">
<li>Air Conditioning</li>
<li>60" Flatscreen TV</li>
</ul>
    <ul class="categories me-md-4">
<li>Balcony</li>
<li>Free Wifi</li>
</ul>
<ul class="categories ms-md-4">
<li>No Smoking</li>
<li>BreakFast</li>
</ul>
    <ul class="categories ms-md-4">
<li>Use of Pool</li>
<li>Free Newspaper</li>
</ul>
         <ul class="categories ms-md-4">
<li>Telephone</li>
<li>Room Services</li>
</ul>
</div>
    
    <h1 class="text-center"><button class="btn btn-lg btn-white p-4 py-3 price">Price: <?php echo App\helper::formatAmount($row['room_price']); ?> <small>/ night</small> </button> <a href="../users/booking.php" class="btn btn-lg btn-primary p-4 py-3">Book Now </a></h1>   
        
    </div>

<!---Our services----->
    
    <section class="ftco-section">
<div class="container-xl">
<div class="row justify-content-center">
<div class="col-md-8 heading-section text-center mb-5" data-aos="fade-up" data-aos-duration="1000">
<span class="subheading">Villa-Bella</span>
<h2 class="mb-4">Hotel Services</h2>
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


</div> 

    </div>

</div>
</section> 

<!--- End of Room Description--->    
<?php
    include_once("../includes/footer.php");
    ?>
    
<?php
    include_once("../includes/js_files.php");
?>    