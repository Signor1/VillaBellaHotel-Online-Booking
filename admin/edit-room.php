<!DOCTYPE html>
<html lang="en">
<?php 
    include_once('../helper/functions.php');
    include_once('../helper/helper.php');
    include_once("../includes/admin-head.php");
    
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset ($_POST['edit-room'])){
        editRoom($db);
    }elseif(isset ($_POST['make-unavailable'])){
        makeUnavailable($db);
    }elseif(isset ($_POST['make-available'])){
        makeAvailable($db);
    }elseif(isset ($_POST['delete-room'])){
        deleteRoom($db);
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

                            <!-- Edit and delete room -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-uppercase text-success">Our Room Details</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <?php 
                                    $rows = getRooms($db);
                                    $count = 1;
                                    ?>
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th>S/N</th>
                                            <th class="d-none">Room Id</th>
                                            <th>Room Name</th>
                                            <th>Category Id</th>
                                            <th>Room Subject</th>
                                            <th>Room Description</th>
                                            <th>Room Image</th>
                                            <th>Room Price</th>
                                            <th>Room Size</th>
                                            <th>Room View</th>
                                            <th>No. of Beds</th>
                                            <th>Max No. of Persons</th>
                                            <th>Room Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($row = mysqli_fetch_assoc($rows)): ?>
                                        <tr>
                                          <td><?php echo $count++; ?></td>
                                            <td class="d-none"><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['room_name']; ?></td>
                                            <td><?php echo $row['category_id']; ?></td>
                                            <td><?php echo $row['room_subject']; ?></td>
                                            <td><?php echo $row['room_description']; ?></td>
                                            <td><img src="<?php echo $row['room_image']; ?>" alt="<?php echo $row['room_name']; ?>" class="img-responsive" height="240" width="200"/></td>
                                            <td><?php echo App\helper::formatAmount($row['room_price']); ?></td>
                                            <td><?php echo $row['room_size']; ?></td>
                                            <td><?php echo $row['room_view']; ?></td>
                                            <td><?php echo $row['no_of_bed']; ?></td>
                                            <td><?php echo $row['max_persons']; ?></td>
                                            <td><?php echo $row['room_status']; ?></td>
                                            <td>
                                                <div class="row mb-3 justify-content-center">
                                                <div class="col-lg-12 col-xl-12">
                           <button type="button" class="btn btn-sm btn-block btn-primary edit">Edit</button>
                                                    </div>
                                                </div>
                                                <div class="row mb-3 justify-content-center">
                                                <div class="col-lg-12 col-xl-12">
                                                  <?php if($row['room_status'] == 'Available'): ?>  
                        <button type="button" class="btn btn-sm btn-block btn-secondary unavailable">Unavailable</button>
                                                    <?php else: ?>
                        <button type="button" class="btn btn-sm btn-block btn-success available">Available</button>
                                                     <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center">
                                                <div class="col-lg-12 col-xl-12">
                        <button type="button" class="btn btn-sm btn-block btn-danger delete">Delete</button>
                                                    </div>
                                                </div>  
                                            </td>
                                        </tr>
                                        
                                        <?php endwhile; ?>
                                    </tbody>
                                        </table>
                                    </div>
                                    
                                                 <!--####################### Modal For MAking A room Unavailable ###############-->
<div class="modal fade" id="unavailable" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Make "<span class="title text-success"> </span>" Unavailable?</h5>
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
        <button type="submit" name="make-unavailable" class="btn btn-primary">Make Unavailable</button>
          </form>
      </div>
    </div>
  </div>
</div>                 
                                        
                    
                                        
  <!--####################### Modal For MAking A room Available ###############-->
<div class="modal fade" id="available" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Make "<span class="title text-success"> </span>" Available?</h5>
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
        <button type="submit" name="make-available" class="btn btn-success">Make Available</button>
          </form>
      </div>
    </div>
  </div>
</div>                 
       
                                        
      <!--####################### Modal For MAking A room Available ###############-->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Do You Want To Delete "<span class="title text-success"> </span>" ?</h5>
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
        <button type="submit" name="delete-room" class="btn btn-danger">Delete Room</button>
          </form>
      </div>
    </div>
  </div>
</div>  
                                        
                                        
             <!--####################### Modal For Editing A room  ###############-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit "<span class="title text-success"> </span>"</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="modal-body">
       <input type="hidden" name="id" class="i" value=""/>
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
                                     <input type="text" class="form-control" id="roomprice" placeholder="Enter Room Price" name="room_price"  required/>    
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
          
      </div>
      <div class="modal-footer"> 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="edit-room" class="btn btn-success">Edit Room</button>
          </form>
      </div>
    </div>
  </div>
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
    // FOR MAKING ROOM -=== UNAVAILABLE
$(document).ready(function(){
    
    $('.unavailable').on('click', function(){
       $('#unavailable').modal('show'); 
        
        var tableRow = $(this).closest('tr');
        var data = tableRow.children('td').map(function(){
            return $(this).text();
        }).get();
        
        console.log(data);
        
        $('.title').text(data[2]);
        $('.i').val(data[1]);
    });
    
});
    
   // FOR MAKING ROOM -=== AVAILABLE
$(document).ready(function(){
    
    $('.available').on('click', function(){
       $('#available').modal('show'); 
        
        var tableRow = $(this).closest('tr');
        var data = tableRow.children('td').map(function(){
            return $(this).text();
        }).get();
        
        console.log(data);
        
        $('.title').text(data[2]);
        $('.i').val(data[1]);
    });
    
}); 
    
    
     // FOR DELETING ROOM
$(document).ready(function(){
    
    $('.delete').on('click', function(){
       $('#delete').modal('show'); 
        
        var tableRow = $(this).closest('tr');
        var data = tableRow.children('td').map(function(){
            return $(this).text();
        }).get();
        
        console.log(data);
        
        $('.title').text(data[2]);
        $('.i').val(data[1]);
    });
    
}); 

    
        
     // FOR EDITING A ROOM
$(document).ready(function(){
    
    $('.edit').on('click', function(){
       $('#edit').modal('show'); 
        
        var tableRow = $(this).closest('tr');
        var data = tableRow.children('td').map(function(){
            return $(this).text();
        }).get();
        
        console.log(data);
        
        $('.title').text(data[2]);
        $('.i').val(data[1]);
        $('#roomname').val(data[2]);
        $('#roomsize').val(data[8]);
        $('#roomview').val(data[9]);
        $('#roombed').val(data[10]);
        $('#roomsubject').val(data[4]);
        $('#roomdescription').val(data[5]);
        $('#roomprice').val(data[7]);
        $('#maxperson').val(data[11]);
    });
    
}); 
    
    </script>    