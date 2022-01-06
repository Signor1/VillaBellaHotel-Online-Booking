<!DOCTYPE html>
<html lang="en">
<?php    
include_once("../includes/head.php");
    include_once("../helper/custom-functions.php");
    
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if(isset ($_POST['id'])){
        getBookingDetails($db);
    }
}
?>
<body>    
<?php 
  include_once("../includes/home_navbar.php");  
?> 
    <!-----Welcome note------>
<section class="hero-wrap" style="background-image: url('../assets/images/banner-slider-2.jpg');">
<div class="overlay"></div>
<div class="container">
<div class="row no-gutters slider-text align-items-center justify-content-center">
<div class="col-lg-10 text-center">
    <p class="breadcrumbs"><span class="me-2"><a href="../default/home.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>My Account <i class="fa fa-chevron-right"></i></span> <span> My Booking</span></p>
<h1 class="mb-4">My Booking</h1>
</div>
</div>
</div>
</section>
    <!-----End of Welcome note------>

<!----My bookings----->
    
    <section class="ftco-section bg-light justify-content-center">
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-3 col-xl-4 text-center d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
<div class="services">
<div class="icon"><span class="fa fa-hotel"></span></div>
    <div class="text">
<h1 class="text-muted">My Booking</h1>
</div>
        </div>
    </div>
    </div>
    <br>
    <div class="row justify-content-center my-4">
<div class="col-md-12">
    
<div class="wrapper justify-content-center">
<div class="row g-0 justify-content-center">
<div class="col-lg-12 justify-content-center">
    
    <div class="table-responsive">
    <table class="table table-bordered text-center table-hover">
       <?php
        $rows = getUserBooking($db);
        $count = 1;
        ?>
    <thead class="bg-dark text-white">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Booking Number</th>
          <th scope="col">Name</th>
            <th scope="col">Mobile Number</th>
            <th scope="col">Email</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($rows)): ?>
        <tr>
            <th scope="row"><?php echo $count++; ?></th>
            <td><?php echo $row['booking_number']; ?></td>
            <td><?php echo $row['user_name']; ?></td>
            <td><?php echo $row['user_number']; ?></td>
            <td><?php echo $row['user_email']; ?></td>
            <td><?php echo $row['booking_status']; ?></td>
            <td><a href="../users/mybooking-dtl.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-block">View</a></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    </div>
        
    </div>
    </div>
    </div>
        </div>
    </div>
        </div>
    </section>
    
<!--- End of Bookings display----> 
    
    <?php
    include_once("../includes/footer.php");
    include_once("../includes/js_files.php");
    ?>
    
    </body>