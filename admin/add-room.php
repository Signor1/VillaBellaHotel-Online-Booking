<!DOCTYPE html>
<html lang="en">
<?php 
    include_once('../helper/functions.php');
    include_once("../includes/admin-head.php");
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
	    if(isset ($_POST['add-Room'])){
            addRoom($db);
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
                    <h3 class="h3 mb-5 font-weight-bold text-uppercase text-gray-800">Villa-Bella Hotel Room Management</h3>
                    
                     <?php if(isset($_SESSION['success'])): ?>
                <ul class="error-msg">
                <li class="alert alert-success alert-dismissable " data-dismiss="alert">&times; <?php echo $_SESSION['success']; ?>
                </li>
                </ul>  
                <?php endif; ?>
                 <?php if(isset($_SESSION['errors'])) :?>
                <?php foreach($_SESSION['errors'] as $err => $errMsg) : ?>
                      <ul class="error-msg">
                    <li class="alert alert-danger alert-dismissable " data-dismiss="alert">&times; <?php echo $errMsg; ?>
                        </li>
                      </ul> 
                        <?php endforeach;  ?>  
                 
                        <?php endif;  ?>

                    <!-- Content Row -->
                    <div class="row justify-content-center">
                     
                        
                         <!-- Add Category -->
                        <div class="col-xl-10 col-lg-10">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-uppercase text-primary">Add Room Details</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                     <label for="roomname">Room Name</label>
                                     <input type="text" class="form-control" id="roomname" name="room_name" placeholder="Enter Room Name" autocapitalize="words" required/>    
                                      </div>
                                        
                                        <div class="form-group">
                                            <?php $row = getCategory($db); ?>
                                          <label for="roomtype">Room Category</label>
                                           <select class="form-control" id="roomtype" name="room_category">
                                            <option value="">Choose Your Category</option>
                                               <?php while($rows = mysqli_fetch_assoc($row)): ?>
                                             <option value="<?php echo $rows['id']; ?>"><?php echo $rows['category_name']; ?></option>
                                             <?php endwhile; ?>
                                             </select>    
                                            </div>
                                        
                                        <div class="form-group">
                                     <label for="roomsize">Room Size</label>
                                     <input type="text" class="form-control" id="roomsize" placeholder="Enter Room Size" name="room_size" autocapitalize="words" required/>    
                                      </div>
                                        
                                        <div class="form-group">
                                     <label for="roomview">Room View</label>
                                     <input type="text" class="form-control" id="roomview" placeholder="Enter Room View" name="room_view" autocapitalize="words" required/>    
                                      </div>
                                        
                                        <div class="form-group">
                                     <label for="roombed">No. of Beds</label>
                                     <input type="number" class="form-control" id="roombed" placeholder="Enter No. of Beds" name="room_bed" autocapitalize="words" required/>    
                                      </div>
                                        
                                        <div class="form-group">
                                     <label for="roomsubject">Room Subject</label>
                                     <textarea class="form-control" id="roomsubject" placeholder="Enter Room Subject" name="room_subject" required></textarea>   
                                      </div>
                                        
                                        <div class="form-group">
                                     <label for="roomdescription">Room Description</label>
                                     <textarea class="form-control" id="roomdescription" placeholder="Enter Room Description" name="room_description" required></textarea>    
                                      </div>
                                        
                                        <div class="form-group">
                                     <label for="roomprice">Room Price</label>
                                     <input type="number" class="form-control" id="roomprice" placeholder="Enter Room Price" name="room_price"  required/>    
                                      </div>
                                        
                                        <div class="form-group">
                                     <label for="maxperson">Maximum No. of Persons</label>
                                     <input type="number" class="form-control" id="maxperson" placeholder="Enter No. of Persons" name="max_persons" required/>    
                                      </div>
                                        
                                        <div class="form-group">
                                    <img src="../assets/images/rooms/room-2.jpg" alt="img-placeholder" height="240"   id="display_image" />
                                   <br />
                                     <label for="roomimage">Room Image</label>
                                     <input type="file" class="form-control" id="roomimage" name="room_image" onchange="document.getElementById('display_image').src = window.URL.createObjectURL(this.files[0])" required/>    
                                      </div>
                                    
                                        <hr>
                                        <button type="submit" name="add-Room" class="btn btn-primary">SUBMIT</button>
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