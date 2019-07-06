<?php

 include 'inc/header_script.php' ;
 require_once 'db/class_admin.php';

    $message = "";
    if (isset($_POST['submit'])) {
      $inCat = new dashboard($_POST);
      $message = $inCat->category_update($_POST);
  }

  if (isset($_GET['edit'])) {
      $id = $_GET['edit'];
  }

  //Others information
  $extend = new dashboard();
  // Single data view Query
  $cat_single = $extend->getcategory($id); 
  $cat_info = mysqli_fetch_assoc($cat_single);

 ?>

<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
  <?php include 'inc/sidebar.php'; ?>
   <!--End sidebar-wrapper-->
  
    <div class="content-wrapper">
    <div class="container-fluid">
      
      <!-- ==========================
            Add New Customet Form
        =============================-->

      <div class="row">
        <div class="col-lg-12">
          <?php if ( !empty($message) ): ?>
            <p class="bg-success text-white p-3 sd_alert"> <?php echo "$message"; ?></p>
          <?php endif ?>

           <div class="card mt-4">
             <div class="card-body">
               <div class="card-title">Edit Category</div>
               <hr>
                <form action="" method="POST">
               <div class="form-group">
                <label for="cat_name">Category Name</label>
                <input name="cat_name" type="text" class="form-control" id="cat_name" value="<?php echo $cat_info['name']; ?>" required="TRUE" autocomplete="OFF">
                <input type="hidden" name="edit_id" value="<?php echo $id; ?>"> 
               </div>

               <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary shadow-primary px-5"><i class="icon-lock"></i> Submit</button>
              </div>
              </form>
             </div>
           </div>
        </div>
      </div><!--End Row-->

    </div><!-- End container-fluid-->
    
    </div> <!-- End Content waper -->
    

   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
   
  </div><!--End wrapper-->

<?php include 'inc/footer_script.php'; ?>