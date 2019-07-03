<?php include 'inc/header_script.php' ; ?>

<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
  <?php include 'inc/sidebar.php'; ?>
   <!--End sidebar-wrapper-->
	
    <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 mt-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Product List</h5>
               <div class="table-responsive">
                <table class="table table-bordered text-center">
                  <thead>
                    <tr>
                      <th scope="col">SL NO</th>
                      <th scope="col">Name</th>
                      <th scope="col">Address</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Md Sazzad Hossain</td>
                      <td>Jatrabari, Dhaka, Bangladesh</td>
                      <td>01234567890</td>
                      <td>
                        <a href="" class="btn btn-danger waves-effect waves-light btn-sm"><i class="fa fa-trash-o"></i></a>
                        <a href="" class="btn btn-success waves-effect waves-light btn-sm"><i class="fa fa-pencil"></i></a>
                        <a href="" class="btn btn-info waves-effect waves-light btn-sm"><i class="fa fa-eye"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Md Saiful Islam</td>
                      <td>Kollanpur, Dhaka, Bangladesh</td>
                      <td>01234567890</td>
                      <td>
                        <a href="" class="btn btn-danger waves-effect waves-light btn-sm"><i class="fa fa-trash-o"></i></a>
                        <a href="" class="btn btn-success waves-effect waves-light btn-sm"><i class="fa fa-pencil"></i></a>
                        <a href="" class="btn btn-info waves-effect waves-light btn-sm"><i class="fa fa-eye"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Sanjil Khan Badhon</td>
                      <td>Agargao, Dhaka, Bangladesh</td>
                      <td>01234567890</td>
                      <td>
                        <a href="" class="btn btn-danger waves-effect waves-light btn-sm"><i class="fa fa-trash-o"></i></a>
                        <a href="" class="btn btn-success waves-effect waves-light btn-sm"><i class="fa fa-pencil"></i></a>
                        <a href="" class="btn btn-info waves-effect waves-light btn-sm"><i class="fa fa-eye"></i></a>
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