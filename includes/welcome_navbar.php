<nav class="navbar navbar-expand-lg  ftco-navbar-light">
<div class="container-xl">
<a class="navbar-brand align-items-center" href="../index.php">
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
<?php
include_once("../includes/js_files.php");
?>
