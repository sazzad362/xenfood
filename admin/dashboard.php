<?php 
  include 'inc/header_script.php' ; 
  include 'seasson.php' ; 

  require_once 'db/class_admin.php';

  $extend               = new dashboard();
  $query_result         = $extend->recent_order();
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
        <div class="col-md-4">
          <div class="card gradient-purpink">
            <div class="card-body">
              <a href="customer_list.php">
              <div class="media">
              <div class="media-body text-left">
                <h4 class="text-white">
                  <?php 
                    echo $extend->customer_count();
                  ?>
                </h4>
                <span class="text-white">Customers</span>
              </div>
        <div class="align-self-center"><span id="dash-chart-1"><canvas width="81" height="35" style="display: inline-block; width: 81px; height: 35px; vertical-align: top;"></canvas></span></div>
            </div>
            </a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card gradient-ibiza">
            <div class="card-body">
              <a href="order_list_pending.php">
              <div class="media">
        <div class="media-body text-left">
                <h4 class="text-white">
                  <?php 
                    echo $extend->count_pending_order();
                  ?>
                </h4>
                <span class="text-white">Pending Orders</span>
              </div>
               <div class="align-self-center"><span id="dash-chart-3"><canvas width="75" height="40" style="display: inline-block; width: 75px; height: 40px; vertical-align: top;"></canvas></span></div>
            </div>
          </a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card gradient-ohhappiness">
            <div class="card-body">
              <a href="order_list_complete.php">
              <div class="media">
              <div class="media-body text-left">
                <h4 class="text-white">
                  <?php 
                    echo $extend->count_complete_order();
                  ?>
                </h4>
                <span class="text-white">Complete Orders</span>
              </div>
        <div class="align-self-center"><span id="dash-chart-4"><canvas width="100" height="25" style="display: inline-block; width: 100px; height: 25px; vertical-align: top;"></canvas></span></div>
            </div>
            </a>
            </div>
          </div>
        </div>

        <!--===============
               Recent Order 
          ================ -->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Recent Order</h5>
                <div class="table-responsive">
                    <table class="table table-bordered">
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
                        <tr>
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