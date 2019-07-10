  <?php 
  include('header.php');
  include('navbar.php');
  ?>
  
    <div class="page">
      <!-- navbar-->
      <?php include('dashboard_header.php'); ?>
      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Form </li>
          </ul>
        </div>
      </div>
      <section class="forms">
        <?php
        if(isset($error)){
      ?>    
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Holy guacamole!</strong> <?php echo $error;?>
          </div>
     <?php   }
      ?>
      <?php
        if(isset($success)){
    ?>    
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Holy guacamole!</strong> <?php echo $success;?>
          </div>
     <?php   }
      ?>


        <div class="container-fluid">
          <!-- Page Header-->
          
        
        
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4>Manage Products</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="myTable" >
                  <!-- class="table table-striped table-sm" -->
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>payment method</th>
                        <th>Buyer</th>
                        <th>Address</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <!--<th>Action</th>-->
                        <th>Edit</th>
                        
                      </tr>
                    </thead>
                    <tbody>

                    <?php  

                      $firstelement=true;
                      foreach($allPendingOrders as $order){
                       
                      ?>    
                        <tr id="tr_<?php echo $order->order_id; ?>">
                        <th scope="row"><?php echo $order->order_id; ?></th>
                        <td><?php echo $order->payment_method; ?></td>
                        <td><?php echo $order->first_name." ".$order->last_name; ?></td>
                        <td><?php echo $order->shipping_address; ?></td>                        
                        
                        <td><?php echo $order->order_amount; ?></td>                        
                        
                        <td><?php 
                                if($order->status == 1)
                                {
                                     echo "<span style='color:green'>Delivered</span>";
                                }
                                elseif($order->status == 0)
                                {
                                    echo "<span style='color:red'>Pending<span>";
                                }
                                elseif($order->status == 2)
                                {
                                  echo "Cancelled";
                                }
                                elseif($order->status == 3)
                                {
                                  echo "Refund";
                                }
                               

                            ?> 
                        </td>
                        
                        <td><?php echo "<button type='button' class='btn btn-success orderEdit' value='order_".$order->order_id."' data-toggle='modal' data-target='#edit_order_modal'>Edit</button>"; ?></td>
                        
                      </tr>
                      <?php } ?>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>  
       <div> 

<!-- ---------------------- Modal -------------- -->
     <div class="modal fade" id="edit_order_modal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header pmd-modal-bordered">
               <h2 class="pmd-cart-title-text" id="form-title">Edit Product</h2>
              <button class="close" data-dismiss="modal" type="button">&times;</button>
             
            </div>
            <form class="form-horizontal" name="form_ordupdate" id="form_ordupdate" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group pmd-selectfield pmd-select-field-floating-label">
                  <label for="category" class="control-label">Order Status</label>
                  <select name='order_new_select' class="form-control" id="order_new_select" required>
                    <option value='3'>Refund</option> 
                    <option value='0'>Pending</option> 
                    <option value='1'>Delivered</option> 
                    <option value='2'>Cancelled</option> 
                  </select> 
                </div>
                

               
              </div>


              <div class="modal-footer">
                <input type="hidden" id="updateId" name="updateId" value="1">
                <!-- <input type="hidden" id="uploaded_image" name="uploaded_image"> -->
                <input type="hidden"  name="action" id="action" value="product">
                <!--<input type="hidden"  name="cat_type" id="cat_type" value="subcategory">-->
                <input type="submit"  name="updateProduct" id="updateProduct" class="btn btn-success" value="Update">
                <button data-dismiss="modal" class="btn btn-default">Cancel</button>
              </div>
            </form>
          </div>
        </div>
      </div>
<!-- ---------------------- /Modal -------------- -->
      </section>

      <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p>Your company &copy; 2017-2019</p>
            </div>
            <div class="col-sm-6 text-right">
              <p>Design by <a href="https://bootstrapious.com" class="external">Bootstrapious</a></p>
              <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
            </div>
          </div>
        </div>
      </footer>
    </div>

 <?php include('footer.php');?>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom/category_ajax.js"></script>
 </body>
</html>
