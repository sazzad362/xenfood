<?php

 include 'inc/header_script.php' ;
 include 'seasson.php' ; 
 require_once 'db/class_admin.php';

  $order_id = $_GET['id'];
  $extend   = new dashboard();

  $message  = "";
  if (isset($_POST['submit'])) {
    $db    = new dashboard($_POST);
    $message  = $db->order_status($_POST);
  }

  $order_item = $extend->order_details($order_id);

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
               <div class="card-title">Change Order Status</div>
               <hr>
                <form action="" method="POST">

               <div class="row">
                 <div class="col-md-4">
                   <div class="form-group">
                    <label for="food_title">Food Title</label>
                    <input name="food_title" type="text" class="form-control" id="food_title" value="<?php echo $order_item['pro_title']; ?>" readonly>
                    <input name="user_id" type="hidden" class="form-control" id="user_id" value="<?php echo $order_item['user_id']; ?>" readonly>
                    <input name="order_id" type="hidden" class="form-control" id="order_id" value="<?php echo $order_item['id']; ?>" readonly>
                   </div>
                 </div>
                 <div class="col-md-4">
                   <div class="form-group">
                    <label for="total">Total</label>
                    <input name="total" type="text" class="form-control" id="total" value="<?php echo $order_item['total']; ?>" readonly>
                   </div>
                 </div>
                 <div class="col-md-4">
                   <div class="form-group">
                    <label for="table_no">Table No</label>
                    <input name="table_no" type="text" class="form-control" id="table_no" value="<?php echo $order_item['table_no']; ?>" readonly>
                   </div>
                 </div>
               </div>

               <div class="form-group">
                <div class="icheck-material-success">
                  <input type="checkbox" id="success" required>
                  <label for="success">Mark As Complete</label>
                </div>
               </div>

               <div class="form-group">
                <button type="submit" name="submit" class="btn btn-danger shadow-danger px-5"><i class="icon-lock"></i> Submit</button>
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