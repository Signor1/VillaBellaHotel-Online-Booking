<!DOCTYPE html>
<html lang="en">
<head>
<title>VillaBella Hotel Online-Booking</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="preconnect" href="https://fonts.gstatic.com/">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&amp;family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="assets/hotel_admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="assets/cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
<link rel="stylesheet" href="assets/css/animate.css">
<link rel="stylesheet" href="assets/css/flaticon.css">
<link rel="stylesheet" href="assets/css/tiny-slider.css">
<link rel="stylesheet" href="assets/css/glightbox.min.css">
<link rel="stylesheet" href="assets/css/aos.css">
<link rel="stylesheet" href="assets/css/datepicker.min.css">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg  ftco-navbar-light">
  <div class="container-xl">
  <a class="navbar-brand align-items-center" href="index.php">
  <span class="">Villa-Bella <small>Hotel Booking</small></span>
  </a>

     <script>
  var time = new Date();
  var currenttime = time.getHours();
  var text = document.getElementsByClassName('text-white');
  if(currenttime < 12){
      document.write('<h3 class="text-white">Good Morning And Welcome!</h3>');
  }else if(currenttime == 12){
      document.write('<h3 class="text-white">Good Day And Welcome!</h3>');
  }else if(currenttime > 12 && currenttime <= 15){
      document.write('<h3 class="text-white">Good Afternoon And Welcome!</h3>');
  }else{
      document.write('<h3 class="text-white">Good Evening And Welcome!</h3>');
  }
     </script>

  </div>
  </nav>
<section class="hero-wrap" style="background-image: url('assets/images/hero-bg.jpg');">
<div class="overlay"></div>
<div class="container">
<div class="row no-gutters slider-text align-items-center justify-content-center">
<div class="col-lg-10 text-center">

<h1 class="mb-4">Most Relaxing Place</h1>
<p><a href="auth/signup.php" class="btn btn-primary p-4 py-3">Sign Up </a> <a href="auth/login.php" class="btn btn-white btn-outline-white p-4 py-3">Log In </a></p>
</div>
</div>
</div>
</section>
    <?php
    include_once("includes/copyright.php");
    ?>
</body>

</html>
