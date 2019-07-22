<?php 
  include 'inc/header_script.php' ; 
  include 'seasson.php' ; 
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
        <div class="col-12 col-lg-6 col-xl-3">
          <div class="card gradient-purpink">
            <div class="card-body">
              <div class="media">
              <div class="media-body text-left">
                <h4 class="text-white">$4530</h4>
                <span class="text-white">Revenue</span>
              </div>
        <div class="align-self-center"><span id="dash-chart-1"><canvas width="81" height="35" style="display: inline-block; width: 81px; height: 35px; vertical-align: top;"></canvas></span></div>
            </div>
            </div>
          </div>
        </div>
    <div class="col-12 col-lg-6 col-xl-3">
          <div class="card gradient-scooter">
            <div class="card-body">
              <div class="media">
              <div class="media-body text-left">
                <h4 class="text-white">2500</h4>
                <span class="text-white">Total Orders</span>
              </div>
        <div class="align-self-center"><span id="dash-chart-2"><canvas width="80" height="40" style="display: inline-block; width: 80px; height: 40px; vertical-align: top;"></canvas></span></div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-3">
          <div class="card gradient-ibiza">
            <div class="card-body">
              <div class="media">
        <div class="media-body text-left">
                <h4 class="text-white">7850</h4>
                <span class="text-white">Comments</span>
              </div>
               <div class="align-self-center"><span id="dash-chart-3"><canvas width="75" height="40" style="display: inline-block; width: 75px; height: 40px; vertical-align: top;"></canvas></span></div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-3">
          <div class="card gradient-ohhappiness">
            <div class="card-body">
              <div class="media">
              <div class="media-body text-left">
                <h4 class="text-white">3524</h4>
                <span class="text-white">Total Views</span>
              </div>
        <div class="align-self-center"><span id="dash-chart-4"><canvas width="100" height="25" style="display: inline-block; width: 100px; height: 25px; vertical-align: top;"></canvas></span></div>
            </div>
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
                    <table class="table table-bordered text-center">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Product Name</th>
                          <th scope="col">Price</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Pizza</td>
                          <td>360</td>
                          <td>Pending</td>
                          <td>
                            <a href="#" class="btn btn-success btn-sm">
                              <i aria-hidden="true" class="fa fa-eye"></i>
                            </a>
                          </td>
                        </tr>
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