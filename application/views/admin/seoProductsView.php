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
                        <th>Title</th>
                        <th>Brand</th>
                        <th>picture</th>
                        <th>price</th>
                        <!--<th>Status</th>
                        <th>Action</th>-->
                        <th>Edit</th>
                        <!--<th>Delete</th>-->
                      </tr>
                    </thead>
                    <tbody>

                    <?php  

                      $firstelement=true;
                      foreach($allProductsAdmin as $product){
                       
                      ?>    
                        <tr id="tr_<?php echo $product->id; ?>">
                        <th scope="row"><?php echo $product->id; ?></th>
                        <td><?php echo $product->title; ?></td>
                        <td><?php echo $product->brand_name; ?></td>
                        <td><img src="<?php echo base_url().$product->pic_location; ?>" width='70' height='60'></td>
                        <td><?php echo $product->sale_price; ?></td>                        
                        
                       <!-- <td><?php 
                                /*if($product->status == 1)
                                  {
                                       echo "Active";
                                  }
                                  elseif($product->status == 0)
                                  {
                                      echo "Blocked";
                                  }*/
                                 

                            ?> 
                        </td>-->
                        
                        <!--<td id="<?php //echo $category->id; ?>">
                          <?php
                                 /*if($category->status == 1)
                                  {
                                      echo "<button type='button' class='btn btn-danger catBtn' value='block_".$category->id."'>Block</button>";
                                  }
                                  elseif($category->status == 0)
                                  {
                                        echo "<button type='button' class='btn btn-success catBtn' value='approve_".$category->id."'>Approve</button>";
                                        
                                       
                                 }*/
                                  
                          ?>
                        </td>!-->
                        <td><a class="btn btn-success" href="<?php echo base_url("admin/addProductSEO/$product->id") ?>" role="button">SEO Product</a></td>
                      <!--  <td><?php// echo "<button type='button' class='btn btn-danger productDelete' value='product_".$product->id."'>Delete</button>"; ?></td>  -->  
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
  <!--    <div class="modal fade" id="edit_product_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header pmd-modal-bordered">
              <button class="close" data-dismiss="modal" type="button">&times;</button>
              <h2 class="pmd-cart-title-text" id="form-title">Edit Product</h2>
            </div>
            <form class="form-horizontal" name="form_prdupdate" id="form_prdupdate" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group pmd-selectfield pmd-select-field-floating-label">
                  <label for="category" class="control-label">Category</label>
                  <select name='product_new_select' class="form-control" id="product_new_select">
                    <option id='op_id'></option>
                  </select> 
                </div>
                <div class="form-group pmd-textfield pmd-text-field-floating-label">
                  <label for="Product " class="control-label">Product Title</label>
                  <input type="text" name='product_new_title' class="form-control"  id="product_new_title">
                </div>
                <div class="form-group pmd-textfield pmd-text-field-floating-label">
                  <label for="Product Brand" class="control-label">Product Brand</label>
                  <input type="text" name='product_new_brand' class="form-control"  id="product_new_brand">
                </div>
                <div class="form-group pmd-textfield pmd-text-field-floating-label">
                  <label for="Describe Product" class="control-label">Describe Product</label>
                  <textarea name='product_new_description' class="form-control"  id="product_new_description">Product Description</textarea> 
                </div>
                <div class="form-group pmd-textfield pmd-text-field-floating-label">
                  <label for="Price" class="control-label">Price</label>
                  <input type="text" name='product_new_price' class="form-control"  id="product_new_price">
                </div>
                <div class="form-group pmd-textfield pmd-text-field-floating-label">
                  <label for="Discount" class="control-label">Discount (if Any*)</label>
                  <input type="text" name='product_new_discount' class="form-control"  id="product_new_discount">
                </div>
                <div class="form-group pmd-textfield pmd-text-field-floating-label">
                  <label for="Product Features" class="control-label">Product Features</label>
                  <input type="text" name='product_new_features' class="form-control"  id="product_new_features">
                </div>
                <div class="form-group pmd-selectfield pmd-select-field-floating-label">
                  <label for="category" class="control-label">Status</label>
                  <select name='product_new_status' class="form-control" id="product_new_status">
                  </select> 
                </div>

                <label for="Pictures" class="control-label">Pictures</label>
                <input type="file" class="form-control" name="product_new_image_1" id="product_new_image_1" accept="image/*" >
                <input type="hidden" pic_id="" name="productImage1" id="productImage1"  >
                <span>
                    <img id="product_image_1" width="80px" height="50px">
                </span>
                <input type="file" class="form-control" name="product_new_image_2" id="product_new_image_2" accept="image/*" >
                <input type="hidden" pic_id="" name="productImage2" id="productImage2"  >
                
                <span>
                    <img id="product_image_2" width="80px" height="50px">
                </span>
                <input type="file" class="form-control" name="product_new_image_3" id="product_new_image_3" accept="image/*" >
                <input type="hidden" pic_id="" name="productImage3" id="productImage3"  >
                
                <span>
                    <img id="product_image_3" width="80px" height="50px">
                </span>
                <input type="file" class="form-control" name="product_new_image_4" id="product_new_image_4" accept="image/*" >
                <input type="hidden" pic_id="" name="productImage4" id="productImage4"  >
                
                <span>
                    <img id="product_image_4" width="80px" height="50px">
                </span>
                <input type="file" class="form-control" name="product_new_image_5" id="product_new_image_5" accept="image/*" >
                <input type="hidden"  pic_id="" name="productImage5" id="productImage5"  >
                <span>
                    <img id="product_image_5" width="80px" height="50px">
                </span>
              </div>
              <div class="pmd-modal-action">
                <input type="hidden" id="updateId" name="updateId" > -->
                <!-- <input type="hidden" id="uploaded_image" name="uploaded_image"> 
                <input type="hidden"  name="action" id="action" value="product">-->
                <!--<input type="hidden"  name="cat_type" id="cat_type" value="subcategory">-->
               <!-- <input type="submit"  name="updateProduct" id="updateProduct" class="btn btn-success" value="Update">
                <button data-dismiss="modal" class="btn btn-default">Cancel</button>
              </div>
            </form>
          </div>
        </div>
      </div> -->
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
