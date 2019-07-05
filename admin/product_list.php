<?php

 include 'inc/header_script.php' ;
 require_once 'db/class_admin.php';

    $proData      = new dashboard();
    $query_result = $proData->ViewProduct();
    
    //Delete config
    if (isset($_GET['delete'])) {
      $id           = $_GET['delete'];
      $table        = $_GET['table_name'];
      $delete_id    = $proData->GlobalDelete($id,$table);
    }

 ?>

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
                      <th scope="col">title</th>
                      <th scope="col">price</th>
                      <th scope="col">category</th>
                      <th scope="col">Images</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $i = 1;
                      $table = "product";
                      while($item = mysqli_fetch_assoc($query_result)){
                      $id = $item['id'];   

                      $cat_name = $proData->catName($id);
                      
                    ?>
                    <tr>
                      <th scope="row"><?php echo $i++ ?></th>
                      <td><?php echo $item['title']; ?></td>
                      <td><?php echo $item['price']; ?></td>
                      <td><?php echo $cat_name['name']; ?></td>
                      <td>
                        <a href="" class="btn btn-danger waves-effect waves-light btn-sm"><i class="fa fa-picture-o"></i></a>
                      </td>
                      <td>
                        <a href="edit_product.php?edit=<?php echo $id; ?>" class="btn btn-success waves-effect waves-light btn-sm"><i class="fa fa-pencil"></i></a>
                        <a href="?table_name=<?php echo $table; ?>&delete=<?php echo $id; ?>" class="btn btn-danger waves-effect waves-light btn-sm"><i class="fa fa-trash-o"></i></a>
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