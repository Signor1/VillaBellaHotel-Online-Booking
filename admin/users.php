<!DOCTYPE html>
<html lang="en">
<?php 
    include_once("../helper/functions.php");
    include_once("../includes/admin-head.php");
    
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset ($_POST['delete-user'])){
        deleteUser($db);
    }elseif(isset ($_POST['make-admin'])){
        makeAdmin($db);
    }elseif(isset ($_POST['make-user'])){
        makeUser($db);
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
                    <h3 class="h3 mb-5 font-weight-bold text-uppercase text-gray-800">Villa-Bella Hotel Users Management</h3>
                  
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
                                    <h6 class="m-0 font-weight-bold text-uppercase text-success">Our List of Users</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <?php
                                  $rows = getUsersInfo($db);
                                  $count = 1;
                                  ?>
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th scope="col">S/N</th>
                                            <th scope="col" class="d-none">User Id</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Mobile Number</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Date of Reg.</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php while($row = mysqli_fetch_assoc($rows)): ?>
                                        <tr>
                                          <td><?php echo $count++; ?></td>
                                            <td class="d-none"><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['first_name']; ?></td>
                                            <td><?php echo $row['last_name']; ?></td>
                                            <td><?php echo $row['mobile_number']; ?></td>
                                            <td><?php echo $row['gender']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['date_of_reg']; ?></td>
                                            <td><?php echo $row['status']; ?></td>
                                            <td><?php echo $row['role']; ?></td>
                                            <td>
                                                <div class="row mb-3 justify-content-center">
                                                <div class="col-lg-12 col-xl-12">
                                                    <?php if($row['role'] == 'User'): ?>
                          <button type="button" class="btn btn-sm btn-block btn-success admin">Admin</button>
                                                    <?php else: ?>
                           <button type="button" class="btn btn-sm btn-block btn-primary user">User</button>
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
   
     <!--####################### Modal For MAking User An Admin ###############-->
<div class="modal fade" id="admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Make "<span class="title text-success"> </span>" Admin</h5>
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
        <button type="submit" name="make-admin" class="btn btn-success">Make Admin</button>
          </form>
      </div>
    </div>
  </div>
</div>
                             
                               
                                        
                                        
  
            <!--####################### Modal For MAking An Admin A User ###############-->
<div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Make "<span class="title text-success"> </span>" User</h5>
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
        <button type="submit" name="make-user" class="btn btn-primary">Make User</button>
          </form>
      </div>
    </div>
  </div>
</div>

                                        
                                        
 <!--####################### Modal For DELETING A USER  ###############-->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete "<span class="title text-success"> </span>'s " Account</h5>
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
        <button type="submit" name="delete-user" class="btn btn-danger">Delete User</button>
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
    // FOR MAKING ROLE -=== ADMIN
$(document).ready(function(){
    
    $('.admin').on('click', function(){
       $('#admin').modal('show'); 
        
        var tableRow = $(this).closest('tr');
        var data = tableRow.children('td').map(function(){
            return $(this).text();
        }).get();
        
        console.log(data);
        
        $('.title').text(data[2]);
        $('.i').val(data[1]);
    });
    
});

 //FOR MAKING ROLE === USER  
    
    $(document).ready(function(){
    
    $('.user').on('click', function(){
       $('#user').modal('show'); 
        
        var tableRow = $(this).closest('tr');
        var data = tableRow.children('td').map(function(){
            return $(this).text();
        }).get();
        
        console.log(data);
        
        $('.title').text(data[2]);
        $('.i').val(data[1]);
    });
    
});
    
    //FOR DELETING A USER'S ACCOUNT
    
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
    
</script>     