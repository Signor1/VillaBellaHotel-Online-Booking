<!DOCTYPE html>
<html lang="en">
<?php    
    include_once("../helper/custom-functions.php");
    include_once("../helper/helper.php");
include_once("../includes/head.php");
     
?>
<body>    
<?php 
  include_once("../includes/home_navbar.php");  
?> 
    <!-----Welcome note------>
<section class="hero-wrap" style="background-image: url('../assets/images/bg_2.jpg');">
<div class="overlay"></div>
<div class="container">
<div class="row no-gutters slider-text align-items-center justify-content-center">
<div class="col-lg-10 text-center">
<span class="subheading">Enjoy Your Wonderful Time With A Great Luxury Experience!</span>
<h1 class="mb-4">Available Rooms/Halls</h1>
</div>
</div>
</div>
</section>
    <!-----End of Welcome note------>
    

<!---Display of rooms ----->
    
    <section class="ftco-section bg-light">
<div class="container-xl">
    <div class="row justify-content-center">
<div class="col-md-8 heading-section text-center mb-5" data-aos="fade-up" data-aos-duration="1000">
<span class="subheading">Our Rooms And Halls</span>
<h2 class="mb-4">Available Rooms/Halls</h2>
</div>
</div>
<div class="row justify-content-center">
    <?php
           $rows = getAllAvailableRoom($db);
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


    
<!---Footer---->
 <?php 
    include_once("../includes/footer.php");
    ?>
<!---End of Footer---->    