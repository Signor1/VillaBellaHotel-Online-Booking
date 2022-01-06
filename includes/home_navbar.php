<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['id'])){
    $_SESSION['error']= "You are not logged in";
    header('Location:../auth/login.php');
}
else if(isset($_SESSION['role']) != "User"){
    $_SESSION['error'] = "Unauthorized Access";
    header('Location:../admin/dashboard.php');
}
include_once("../helper/functions.php");
include_once("../helper/custom-functions.php");

  if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if(isset ($_POST['id'])){
        getUserProfile($db);
    }elseif(isset ($_POST['id'])){
        getUserBooking($db);
    }
}

?>

<nav class="navbar navbar-expand-lg  ftco-navbar-light">
<div class="container-xl">
<a class="navbar-brand align-items-center" href="index-2.html">
<span class="">Villa-Bella <small>Hotel Booking</small></span>
</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="fa fa-bars"></span> Menu
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
<li class="nav-item"><a class="nav-link" href="../default/home.php">Home</a></li>
<li class="nav-item"><a class="nav-link" href="../default/about.php">About</a></li>
<li class="nav-item"><a class="nav-link" href="../default/rooms.php">Rooms/Halls</a></li>
<li class="nav-item"><a class="nav-link" href="../auth/contact.php">Contact</a></li>
<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        
    <a class="dropdown-item" href="../users/profile.php?id=<?php $_SESSION['id']; ?>">Profile</a>
       
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="../users/mybooking.php?id=<?php $_SESSION['id']; ?>">My Booking</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="../users/change_password.php?id=<?php $_SESSION['id']; ?>">Change Password</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="../auth/logout.php">Logout</a>
    </div>
    </li>    
</ul>

</div>
</div>
</nav>
<?php
include_once("../includes/js_files.php");
?>

