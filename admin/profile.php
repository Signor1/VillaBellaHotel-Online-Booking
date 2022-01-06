<!DOCTYPE html>
<html lang="en">
<?php 
     include_once("../helper/functions.php");
    include_once("../includes/admin-head.php");
    
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset ($_POST['update'])){
        updateAdminProfile($db);
    }
}
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        
        <!---- Sidebar---->
        <?php
        include_once("../includes/admin-sidebar.php");
        ?>
        <!--- End of Sidebar---->
        
        
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php 
                include_once("../includes/admin-topbar.php");
                ?>
                <!-- End of Topbar -->
                    
                <!-- Begin Page Content -->
               <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h3 class="h3 mb-5 font-weight-bold text-uppercase text-gray-800">Villa-Bella Hotel Admin Data Management</h3>
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

                    <!-- Content Row -->
                    <div class="row justify-content-center">
                        
                         <!-- Add Category -->
                        <div class="col-xl-10 col-lg-10">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-uppercase text-success">Admin Profile</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <?php
                                    $rows = getUserProfile($db);
                                    ?>
                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <?php while($row = mysqli_fetch_assoc($rows)): ?>
                                        
                                        <input type="hidden" name="id"  value="<?php echo $row['id']; ?>" />
                                        <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" class="form-control" id="firstname" value="<?php echo $row['first_name']; ?>"  name="firstname" autocapitalize="words" required/>    
        </div>
        <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" class="form-control" id="lastname" value="<?php echo $row['last_name']; ?>" name="lastname" autocapitalize="words" required/> 
        </div> 
        <div class="form-group">
        <label for="number">Mobile Number</label>
        <input type="number" class="form-control" id="number" value="<?php echo $row['mobile_number']; ?>"  name="number" required/> 
        </div>
        <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" id="email" value="<?php echo $row['email']; ?>"  name="email" required/>    
        </div> 
                                    <?php endwhile; ?>
                                        <hr>
                                        <button type="submit" name="update" class="btn btn-success">UPDATE</button>
                                    </form>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    
            </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
                
                
                
            </div>
        <!-- End of Content Wrapper -->    
        
    </div>
    </div>
    
    <?php
            include_once("../includes/admin-footer.php");
            ?>

             </body>  
              
    
                
<?php
    include_once("../includes/admin_js-files.php");
?>               