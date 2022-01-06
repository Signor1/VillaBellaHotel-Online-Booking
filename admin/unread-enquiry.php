<!DOCTYPE html>
<html lang="en">
<?php 
    include_once("../helper/functions.php");
    include_once("../includes/admin-head.php");
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset ($_POST['read-enquiry'])){
        readEnquiry($db);
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
                    <h3 class="h3 mb-5 font-weight-bold text-uppercase text-gray-800">Villa-Bella Hotel Contact Management</h3>
                    
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
                                    <h6 class="m-0 font-weight-bold text-uppercase text-warning">Our Unread Enquiries</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <?php
                                  $rows = getUnreadEnquiry($db);
                                  $count = 1;
                                  ?>
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th scope="col">S/N</th>
                                            <th scope="col" class="d-none">Contact Id</th>
                                            <th scope="col">Contact Name</th>
                                            <th scope="col">Contact Email</th>
                                            <th scope="col">Contact Subject</th>
                                            <th scope="col">Contact Message</th>
                                            <th scope="col">Contact Date</th>
                                            <th scope="col">Contact Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($row = mysqli_fetch_assoc($rows)): ?>
                                        <tr>
                                          <td><?php echo $count++; ?></td>
                                            <td class="d-none"><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['contact_name']; ?></td>
                                            <td><?php echo $row['contact_email']; ?></td>
                                            <td><?php echo $row['contact_subject']; ?></td>
                                            <td><?php echo $row['contact_message']; ?></td>
                                            <td><?php echo $row['contact_date']; ?></td>
                                            <td><?php echo $row['contact_status']; ?></td>
                                            <td>
                                                <div class="row">
                                                <div class="col-lg-12 col-xl-12">
                            <button type="button" class="btn btn-sm btn-block btn-success read">Read</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr> 
 
    <!--####################### Modal For MARKING AN ENQUIRY AS READ  ###############-->
<div class="modal fade" id="read" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Have You Read "<span class="title text-success"> </span>'s " Message?</h5>
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
        <button type="submit" name="read-enquiry" class="btn btn-success">Read</button>
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
   //FOR MARKING CONTACT'S ENQUIRY AS READ
     
    $(document).ready(function(){
    
    $('.read').on('click', function(){
       $('#read').modal('show'); 
        
        var tableRow = $(this).closest('tr');
        var data = tableRow.children('td').map(function(){
            return $(this).text();
        }).get();
        
        console.log(data);
        
        $('.title').text(data[2]);
        $('.i').val(data[1]);
    });
    
});

    </script>    
</html>