<?php

 include 'inc/header_script.php' ;
 require_once 'db/class_admin.php';

    $message = "";
    if (isset($_POST['submit'])) {
      $inProduct = new dashboard($_POST);
      $message = $inProduct->addProduct($_POST);
  }

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

          <p class="bg-success text-white p-4"> <?php echo "$message"; ?></p>

           <div class="card mt-4">
             <div class="card-body">
               <div class="card-title">Add Product</div>
               <hr>
                <form action="" method="POST">
               <div class="form-group">
                <label for="product_title">Product Title</label>
                <input name="title" type="text" class="form-control" id="product_title" placeholder="Product Title" required="TRUE" autocomplete="OFF">
               </div>
               <div class="form-group">
                <label for="product_price">Product Price</label>
                <input name="price" type="text" class="form-control" id="product_price" placeholder="Product Title" required="TRUE" autocomplete="OFF">
               </div>
               <div class="form-group">
                <label for="select_cat">Product Category</label>
                <select name="category" class="form-control" id="select_cat">
                  <option value="1">Category 1</option>
                  <option value="2">Category 2</option>
                  <option value="3">Category 3</option>
                  <option value="4">Category 4</option>
                  <option value="5">Category 5</option>
                </select>
               </div>
               <div class="form-group">
                <label for="select_cat">Product Details</label>
                <textarea name="details" rows="4" class="form-control" id="basic-textarea"></textarea>
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