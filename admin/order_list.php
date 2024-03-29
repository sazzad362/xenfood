<?php 
  include 'inc/header_script.php' ; 
  include 'seasson.php' ; 
  require_once 'db/class_admin.php';

  $extend      = new dashboard();
  $query_result = $extend->all_order();

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
              <h5 class="card-title">All Order</h5>
                <div class="table-responsive">
                   <table class="table table-bordered" id="default-datatable">
                      <thead>
                        <tr class="text-center">
                          <th scope="col">#</th>
                          <th scope="col">Food Name</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Total</th>
                          <th scope="col">Table No</th>
                          <th scope="col">Status</th>
                          <th scope="col">Order At</th>
                          <th scope="col">Order By</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $i = 0;
                          $table = "orders";
                          while($item = mysqli_fetch_assoc($query_result)){
                          $id = $item['id'];   
                          $i++;
                          $user_id = $item['user_id'];
                          $user_name = $extend->user_name($user_id);
                          $status = $item['status'];
                        ?>
                        <tr class="<?php if($status==1) { echo "bg-success text-white"; } ?>">
                          <th scope="row"><?php echo $i; ?></th>
                          <td><?php echo $item['pro_title']; ?></td>
                          <td class="text-center"><?php echo $item['qty']; ?></td>
                          <td class="text-center"><?php echo $item['total']; ?></td>
                          <td class="text-center"><?php echo $item['table_no']; ?></td>
                          <td>
                            <?php 
                              if ($status == 1) {
                                echo "Complete";
                              }else{
                                echo "Pending";
                              }
                            ?>
                          </td>
                          <td>
                            <?php 
                              $create_date = $item['created_at'];
                              echo $timeStamp = date( "d-m-Y h:i:sa", strtotime($create_date));
                            ?>    
                          </td>
                          <td class="text-center">
                          <?php echo $user_name['name']; ?>
                              
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