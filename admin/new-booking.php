<!DOCTYPE html>
<html lang="en">
<?php 
    include_once("../includes/admin-head.php");
    include_once('../helper/functions.php');
    include_once('../helper/helper.php');
    
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset ($_POST['approve-booking'])){
        approveBooking($db);
    }elseif(isset ($_POST['confirm-booking'])){
        confirmBooking($db);
    }elseif(isset ($_POST['cancel-booking'])){
        cancelBooking($db);
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
                    <h3 class="h3 mb-5 font-weight-bold text-uppercase text-gray-800">Villa-Bella Hotel Booking Management</h3>
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
            <?php foreach($_SESSION['errors'] as $err => $errMsg): ?>
							
             <ul class="error-msg">
	            <li class="alert alert-danger alert-dismissable" data-dismiss="alert">&times; <?php echo $errMsg; ?></li>
             </ul>
            <?php endforeach; ?>
            <?php endif; ?>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-xl-12 col-lg-12">

                            <!-- Edit and delete category -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-uppercase text-warning">Our New Bookings</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <?php 
                                    $rows = getNewBookings($db);
                                    $count = 1;
                                    ?>
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th scope="col">S/N</th>
                                            <th scope="col" class="d-none">Booking Id</th>
                                            <th scope="col">Booking Number</th>
                                            <th scope="col">User Name</th>
                                            <th scope="col">User ID</th>
                                            <th scope="col">User Phone No.</th>
                                            <th scope="col">User Email</th>
                                            <th scope="col">ID Type</th>
                                            <th scope="col">User Gender</th>
                                            <th scope="col">User Address</th>
                                            <th scope="col">Room Name</th>
                                            <th scope="col">Max Persons</th>
                                            <th scope="col">Check-In Date</th>
                                            <th scope="col">Check-Out Date</th>
                                            <th scope="col">Booking Price</th>
                                            <th scope="col">Booking Date</th>
                                            <th scope="col">Booking Status</th>
                                            <th scope="col">Admin Remark</th>
                                            <th scope="col">Action</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($row = mysqli_fetch_assoc($rows)): ?>
                                        <tr>
                                          <td><?php echo $count++; ?></td>
                                            <td class="d-none"><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['booking_number']; ?></td>
                                            <td><?php echo $row['user_name']; ?></td>
                                            <td><?php echo $row['user_id']; ?></td>
                                            <td><?php echo $row['user_number']; ?></td>
                                            <td><?php echo $row['user_email']; ?></td>
                                            <td><?php echo $row['user_ID_type']; ?></td>
                                            <td><?php echo $row['user_gender']; ?></td>
                                            <td><?php echo $row['user_address']; ?></td>
                                            <td><?php echo $row['room_name']; ?></td>
                                            <td><?php echo $row['max_persons']; ?></td>
                                            <td><?php echo $row['check_in_date']; ?></td>
                                            <td><?php echo $row['check_out_date']; ?></td>
                                            <td><?php echo App\helper::formatAmount($row['booking_price']); ?></td>
                                            <td><?php echo $row['booking_date']; ?></td>
                                            <td><?php echo $row['booking_status']; ?></td>
                                            <td><?php echo $row['admin_remark']; ?></td>
                                            <td>
                                            <div class="row mb-3 justify-content-center">
                                                <div class="col-lg-12 col-xl-12">
                <button type="button" class="btn btn-sm btn-block btn-primary approve">Approve</button>
                                                    </div>
                                                </div>
                                                <div class="row mb-3 justify-content-center">
                                                <div class="col-lg-12 col-xl-12">
                     <button type="button" class="btn btn-sm btn-block btn-success confirm">Confirm</button>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center">
                                                <div class="col-lg-12 col-xl-12">
                       <button type="button" class="btn btn-sm btn-block btn-danger cancel">Cancel</a>
                                                    </div>
                                                </div> 
                                            </td>
                                        </tr>
                <!--####################### Modal For approving a booking ###############-->
<div class="modal fade" id="approve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Approve "<span class="title text-success"> </span>" Booking? Confirm First !</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4 class="text-warning">Are you sure ?</h4>
      </div>
      <div class="modal-footer">
          <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
         <input type="hidden" name="id" class="i" value=""/>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="approve-booking" class="btn btn-success">Approve Booking</button>
          </form>
      </div>
    </div>
  </div>
</div>
       
              <!--####################### Modal For confirming a booking ###############-->
<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm "<span class="title text-success"> </span>" Booking?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4 class="text-warning">Are you sure ?</h4>
      </div>
      <div class="modal-footer">
          <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
         <input type="hidden" name="id" class="i" value=""/>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="confirm-booking" class="btn btn-success">Confirm Booking</button>
          </form>
      </div>
    </div>
  </div>
</div>
                                        
      <!--####################### Modal For cancelling a booking ###############-->
<div class="modal fade" id="cancel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cancel "<span class="title text-success"> </span>" Booking?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4 class="text-warning">Are you sure ?</h4>
      </div>
      <div class="modal-footer">
          <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
         <input type="hidden" name="id" class="i" value=""/>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="cancel-booking" class="btn btn-danger">Cancel Booking</button>
          </form>
      </div>
    </div>
  </div>
</div>
                                        
                                        <?php endwhile; ?>
                                    </tbody>
                                        </table>
                                    </div>
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
    
<script>
    // FOR APPROVING A BOOKING
$(document).ready(function(){
    
    $('.approve').on('click', function(){
       $('#approve').modal('show'); 
        
        var tableRow = $(this).closest('tr');
        var data = tableRow.children('td').map(function(){
            return $(this).text();
        }).get();
        
        console.log(data);
        
        $('.title').text(data[3]);
        $('.i').val(data[1]);
    });
    
});
    
    
        // FOR CONFIRMING A BOOKING
$(document).ready(function(){
    
    $('.confirm').on('click', function(){
       $('#confirm').modal('show'); 
        
        var tableRow = $(this).closest('tr');
        var data = tableRow.children('td').map(function(){
            return $(this).text();
        }).get();
        
        console.log(data);
        
        $('.title').text(data[3]);
        $('.i').val(data[1]);
    });
    
});

    
    // FOR CANCELLING A BOOKING
$(document).ready(function(){
    
    $('.cancel').on('click', function(){
       $('#cancel').modal('show'); 
        
        var tableRow = $(this).closest('tr');
        var data = tableRow.children('td').map(function(){
            return $(this).text();
        }).get();
        
        console.log(data);
        
        $('.title').text(data[3]);
        $('.i').val(data[1]);
    });
    
});    
    
    </script>    