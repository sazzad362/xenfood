<?php 
  include 'inc/header_script.php' ; 
  include 'seasson.php' ; 
  require_once 'db/class_admin.php';

  $extend      = new dashboard();
  $query_result = $extend->allUser();

?>

<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
  <?php include 'inc/sidebar.php'; ?>
   <!--End sidebar-wrapper-->
	
  <div class="content-wrapper">
    <div class="container-fluid">

      <!--Start Dashboard Content-->
      
      <div class="row mt-4">
        <!--===============
               Recent Order 
          ================ -->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Customer List</h5>
                <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr class="text-center">
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $i = 0;
                          $table = "users";
                          while($item = mysqli_fetch_assoc($query_result)){
                          $id = $item['id'];   
                          $i++;
                        ?>
                        <tr>
                          <th scope="row"><?php echo $i; ?></th>
                          <td><?php echo $item['name']; ?></td>
                          <td><?php echo $item['email']; ?></td>
                          <td><?php echo $item['phone']; ?></td>
                          <td>
                            <?php 
                              if ($item['status'] == 1) {
                                echo "Active";
                              }
                            ?>
                          </td>
                          <td>
                            <a href="#" class="btn btn-success btn-sm">
                              <i aria-hidden="true" class="fa fa-eye"></i>
                            </a>
                          </td>
                        </tr>
                         <?php } ?>
                      </tbody>
                    </table>
                  </div>
            </div>
          </div>
        </div>

      </div> <!-- End Row -->

    </div><!-- End container-fluid-->
    
    </div> <!-- End Content waper -->
    
    

   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
   
  </div><!--End wrapper-->

<?php include 'inc/footer_script.php'; ?>