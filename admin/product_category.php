<?php

 include 'inc/header_script.php' ;
 require_once 'db/class_admin.php';

    $catData = new dashboard();
    $query_result = $catData->ViewCategory();

    //Delete config
    if (isset($_GET['delete'])) {
      $id           = $_GET['delete'];
      $table        = $_GET['table_name'];
      $delete_id    = $catData->GlobalDelete($id,$table);
    }

 ?>

<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
  <?php include 'inc/sidebar.php'; ?>
   <!--End sidebar-wrapper-->
	
    <div class="content-wrapper">
    <div class="container-fluid">
      
    </div><!-- End container-fluid-->
      <div class="row">
        <div class="col-lg-12 mt-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between mb-4">
                <h5 class="card-title">Category List</h5>
                <a href="category_add.php" class="btn btn-sm btn-success">+</a>
              </div>
               <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">SL NO</th>
                      <th scope="col">Name</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $i = 1;
                      $table = "category";
                      while($catinfo = mysqli_fetch_assoc($query_result)){
                      $id = $catinfo['id'];                                         
                    ?>
                    <tr>
                      <th scope="row"><?php echo $i++ ?></th>
                      <td><?php echo $catinfo['name']; ?></td>
                      <td class="text-center">
                        <a href="edit_category.php?edit=<?php echo $id; ?>" class="btn btn-danger waves-effect waves-light btn-sm"><i class="fa fa-pencil"></i></a>
                        <a href="?table_name=<?php echo $table; ?>&delete=<?php echo $id; ?>" class="btn btn-success waves-effect waves-light btn-sm"><i class="fa fa-trash-o"></i></a>
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
    </div> <!-- End Content waper -->
    

   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
   
  </div><!--End wrapper-->

<?php include 'inc/footer_script.php'; ?>