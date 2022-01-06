<!DOCTYPE html>
<html lang="en">
<?php    
include_once("../includes/head.php");
    include_once("../helper/custom-functions.php");
    include_once("../helper/helper.php");
?>
<body>
    
    
    
<div class="wrapper container justify-content-center mb-4">
<div class="row g-0 justify-content-center">
<div class="col-lg-12 justify-content-center">
    
    <?php
        $rows = getBookingDetails($db);
        $row = mysqli_fetch_assoc($rows);
           
        ?>
    <div class="card shadow mb-4" >
                                <!-- Card Header - Dropdown -->
            <div class="card-header mb-2">
             <h6 class="m-0 font-weight-bold text-uppercase text-center text-primary">My Booking Number : <?php echo $row['booking_number']; ?></h6>
            </div>
        
        <div class="card-header">
             <h6 class="m-0 font-weight-bold text-primary">Booking Details</h6>
            </div>
                                <!-- Card Body -->
        <div class="row">
        <div class="col-lg-6">
            <div class="card-body">
             <div class="table-responsive">
    <table class="table table-bordered table-hover">
        
        <tr>
            <th>Customer Name</th>
            <td><?php echo $row['user_name']; ?></td>
            </tr>
        <tr>
            <th>Mobile Phone Number</th>
            <td><?php echo $row['user_number']; ?></td>
            </tr>
            <tr>
            <th>E-mail</th>
            <td><?php echo $row['user_email']; ?></td>
            </tr>
        <tr>
            <th>ID Type</th>
            <td><?php echo $row['user_ID_type']; ?></td>
            </tr>
        <tr>
            <th>Gender</th>
            <td><?php echo $row['user_gender']; ?></td>
            </tr>
        <tr>
            <th>Address</th>
            <td><?php echo $row['user_address']; ?></td>
            </tr>
        </table> 
    </table>
    </div> 
      </div>
            
            </div>
        <div class="col-lg-6">
            <div class="card-body">
             <div class="table-responsive">
    <table class="table table-bordered table-hover">
        <tr>
            <th>Date of Booking</th>
            <td><?php echo $row['booking_date']; ?></td>
            </tr>
        
            <tr>
            <th>Check-In Date</th>
            <td><?php echo $row['check_in_date']; ?></td>
            </tr>
        <tr>
            <th>Check-Out Date</th>
            <td><?php echo $row['check_out_date']; ?></td>
            </tr>
        <tr>
            <th>Room Name</th>
            <td><?php echo $row['room_name']; ?></td>
            </tr>
        <tr>
            <th>Booking Price For Number of Days/Day</th>
            <td><?php echo App\helper::formatAmount($row['booking_price']); ?></td>
            </tr>
        <tr>
            <th>Max No. of Persons</th>
            <td><?php echo $row['max_persons']; ?></td>
            </tr>
        </table> 
    </table>
    </div> 
      </div>
            
            </div>
        </div>
    
    <div class="card-header">
             <h6 class="m-0 font-weight-bold text-primary">Admin Remark</h6>
            </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card-body">
             <div class="table-responsive">
    <table class="table table-bordered table-hover">
        
        <tr>
            <th>Booking Status</th>
            <td><?php echo $row['booking_status']; ?></td>
            </tr>
        
        </table> 
    </table>
    </div> 
      </div>
            
            </div>
        <div class="col-lg-6">
            <div class="card-body">
             <div class="table-responsive">
    <table class="table table-bordered table-hover">
        
        <tr>
            <th>Admin Remark</th>
            <td><?php echo $row['admin_remark']; ?></td>
            </tr>
        
        </table> 
    </div> 
      </div>
            
            </div>
    
        </div>
    <div class="row justify-content-center mb-3">
    <div class="col-lg-2" >
        <button type="button" onclick="window.print()" class="btn btn-primary p-4 py-2">CLICK TO PRINT</button>
        </div>
    </div>
    
            
                            </div>
    
    
        
    </div>
    </div>
    
    
    </div>
      
    
<!--- End of Bookings display----> 
    
    <?php
include_once("../includes/js_files.php");
    ?>
    
    </body>

</html>
    
    