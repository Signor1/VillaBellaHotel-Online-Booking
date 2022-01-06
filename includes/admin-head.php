
<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['id'])){
    $_SESSION['error']= "You are not logged in";
    header('Location:../auth/login.php');
}
else if(isset($_SESSION['role']) != "Admin"){
    $_SESSION['error'] = "Unauthorized Access";
    header('Location:../default/home.php');
}


?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Villa-Bella Admin Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/hotel_admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/hotel_admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../assets/hotel_admin/vendor/bootstrap/scss/_modal.scss" rel="stylesheet">

</head>