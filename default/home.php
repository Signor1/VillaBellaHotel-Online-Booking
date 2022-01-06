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
<section class="hero-wrap" style="background-image: url('../assets/images/bg_1.jpg');">
<div class="overlay"></div>
<div class="container">
<div class="row no-gutters slider-text align-items-center justify-content-center">
<div class="col-lg-10 text-center">
<span class="subheading">Enjoy Your Wonderful Time With Great Luxury Experience!</span>
<h1 class="mb-4">Welcome Home</h1>
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
<form class="booking-form" >
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

    <!---About Us----->

    <section class="ftco-section ftco-about-section">
<div class="container-xl">
<div class="row g-xl-5">
<div class="col-md-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
<div class="row">
<div class="col-md-6">
<div class="f-services d-md-flex flex-md-column-reverse">
<div class="img w-100" style="background-image: url(../assets/images/f-services.jpg);"></div>
<div class="text w-100 p-4 text-center mb-md-4">
<div class="icon"><span class="fa fa-house-user"></span></div>
<h3>Cozy Room</h3>
<p>We have different luxury rooms that suits your choice. This is home!</p>
</div>
</div>
</div>
<div class="col-md-6">
<div class="f-services">
<div class="img w-100 mb-md-4" style="background-image: url(../assets/images/f-services-2.jpg);"></div>
<div class="text w-100 p-4 text-center">
<div class="icon"><span class="fa fa-lightbulb"></span></div>
<h3>Special Offers</h3>
<p>We offer nothing but the best services to our customers.</p>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-6 heading-section d-flex align-items-center" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
<div class="mt-5 mt-md-0">
<span class="subheading">About Us</span>
<h2 class="mb-4">Villa-Bella A Hotel Booking Agency</h2>
<p class="mb-5">If you are seeking for a superior hotel, Villa-Bella is the perfect location. Our Hotel blends current-day modernity with classic elegance. You will enjoy the convenience of newly redesigned rooms and suites, a full-service fitness center, swimming pool, large restaurant and some of best bars and lounges to celebrate and entertain in sophisticated style.</p>
<p><a href="../users/booking.php" class="btn btn-primary py-3 px-4">Book Your Room Now</a></p>
</div>
</div>
</div>
</div>
</section>

    <!---- End of About Us---->

    <!----Our Services---->

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

    <!------End of our Services---->

<!----Featured Rooms---->
<section class="ftco-section bg-light">
<div class="container-xl">
<div class="row justify-content-center">
<div class="col-md-8 heading-section text-center mb-5" data-aos="fade-up" data-aos-duration="1000">
<span class="subheading">Our Rooms</span>
<h2 class="mb-4">Featured Rooms/Halls</h2>
</div>
</div>
<div class="row justify-content-center">
    <?php
           $rows = getThreeRooms($db);
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
    <div class="row justify-content-center">
    <div class="col-md-6 col-lg-2 d-flex" data-aos="flip-left" data-aos-delay="100" data-aos-duration="1000">
        <a href="../default/rooms.php" class="btn btn-primary p-4 py-3">SEE MORE</a>
        </div>
    </div>
</div>
</section>
<!----End of featured rooms---->

<!---Restuarant and Bar display----->
    <section class="ftco-section">
<div class="container-fluid">
<div class="row justify-content-center pb-4">
<div class="col-md-7 text-center heading-section" data-aos="fade-up" data-aos-duration="1000">
<span class="subheading">Resto &amp; Bar</span>
<h2 class="mb-3">Restaurant &amp; Bar</h2>
</div>
</div>
<div class="row g-md-5">
<div class="col-md-12 col-xl-5 d-flex align-items-stretch">
<div class="img w-100 img-cuisine" style="background-image: url(../assets/images/resto-bar.jpg);" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
<div class="icon d-flex align-items-center justify-content-center"><span class="fas fa-bread-slice"></span></div>
</div>
</div>
<div class="col-md-12 col-xl-7 ps-xl-5">
<div class="row g-md-2">
<div class="col-md-6">
<div class="pricing-entry d-flex align-items-center" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
<div class="img" style="background-image: url(../assets/images/local.jpg);"></div>
<div class="desc ps-3">
<div class="d-flex text">
<h3><span>Native Vegetable Soup</span></h3>

</div>
</div>
</div>
<div class="pricing-entry d-flex align-items-center" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
<div class="img" style="background-image: url(../assets/images/chicken.jpg);"></div>
<div class="desc ps-3">
<div class="d-flex text">
<h3><span>Creamed Chicken</span></h3>

</div>
</div>
</div>
<div class="pricing-entry d-flex align-items-center" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
<div class="img" style="background-image: url(../assets/images/nkwobi.jpg);"></div>
<div class="desc ps-3">
<div class="d-flex text">
<h3><span>Natively Prepared Meat (Nkwobi)</span></h3>

</div>
</div>
</div>
<div class="pricing-entry d-flex align-items-center" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
<div class="img" style="background-image: url(../assets/images/rice.jpg);"></div>
<div class="desc ps-3">
<div class="d-flex text">
<h3><span>Fried Rice with Beef</span></h3>

</div>
</div>
</div>
</div>
<div class="col-md-6">
<div class="pricing-entry d-flex align-items-center" data-aos="fade-up" data-aos-delay="500" data-aos-duration="1000">
<div class="img" style="background-image: url(../assets/images/menu-5.jpg);"></div>
<div class="desc ps-3">
<div class="d-flex text">
<h3><span>Grilled Beef with potatoes</span></h3>

</div>
</div>
</div>
<div class="pricing-entry d-flex align-items-center" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
<div class="img" style="background-image: url(../assets/images/fish.jpg);"></div>
<div class="desc ps-3">
<div class="d-flex text">
<h3><span>Stewed Fish And Potatoes</span></h3>

</div>
</div>
</div>
<div class="pricing-entry d-flex align-items-center" data-aos="fade-up" data-aos-delay="700" data-aos-duration="1000">
<div class="img" style="background-image: url(../assets/images/menu-7.jpg);"></div>
<div class="desc ps-3">
<div class="d-flex text">
<h3><span>Assorted Natural Juice</span></h3>

</div>
</div>
</div>
<div class="pricing-entry d-flex align-items-center" data-aos="fade-up" data-aos-delay="800" data-aos-duration="1000">
<div class="img" style="background-image: url(../assets/images/menu-1.jpg);"></div>
<div class="desc ps-3">
<div class="d-flex text">
<h3><span>Varied Bakery Recipes</span></h3>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


<br>
    </br>
    <br>
    </br>

<?php
    include_once("../includes/footer.php");

?>
<script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
<script>
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#000"
    },
    "button": {
      "background": "#d4b55d"
    }
  },
  "type": "opt-out"
});
</script>
</body>
