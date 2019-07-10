  <?php 
  include('header.php');
  include('navbar.php');
  //$data = allCategories($records);
    //    print_r($data); 
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
                <h4>Manage Subcategories</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="myTable" >
                  <!-- class="table table-striped table-sm" -->
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>picture</th>
                        <th>Category Type</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php  foreach($allSubCategories as $subcategory){ ?>
                        
                      <tr  id="tr_<?php echo $subcategory->id; ?>">
                        <th scope="row"><?php echo $subcategory->id; ?></th>
                        <td><?php echo $subcategory->name; ?></td>
                        <td><img src="<?php echo base_url().$subcategory->pic_location; ?>" width='60' height='60'></td>
                        <td><?php echo $subcategory->catName; ?></td>                        
                        <td><?php 
                                if($subcategory->status == 1)
                                  {
                                       echo "Active";
                                  }
                                  elseif($subcategory->status == 0)
                                  {
                                      echo "Disabled";
                                  }
                            ?> 
                        </td>
                        
                        <td>
                          <?php
                                 if($subcategory->status == 1)
                                  {
                                      echo "<button type='button' class='btn btn-danger subCatBtn' value='block_".$subcategory->id."_buyer'>Block</button>";
                                  }
                                  elseif($subcategory->status == 0)
                                  {
                                        echo "<button type='button' class='btn btn-success subCatBtn' value='approve_".$subcategory->id."_buyer'>Approve</button>";  
                                 }
                                  
                          ?>
                        </td>   
                      <td><?php echo "<button type='button' class='btn btn-success subCatEdit' value='subcategory_".$subcategory->id."_".$subcategory->catId."' data-toggle='modal' data-target='#edit_sub_cat_modal'>Edit</button>"; ?></td>
                        <td><?php echo "<button type='button' class='btn btn-danger subCatDelete' value='subcat_".$subcategory->id."'>Delete</button>"; ?></td>   
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
      <div class="modal fade" id="edit_sub_cat_modal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            
            <div class="modal-header pmd-modal-bordered">
              <h2 class="pmd-cart-title-text" id="form-title">Edit Product Sub Category</h2>
              <button class="close" data-dismiss="modal" type="button">&times;</button>
              
            </div>
            <form class="form-horizontal" name="subcat_form" id="subcat_form" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group pmd-selectfield pmd-select-field-floating-label">
                  <label for="category" class="control-label">Category</label>
                  <select name='cat_new_select' class="form-control" id="cat_new_select">
                    <option id='op_id'>abc</option>
                  </select> 
                </div>
                <div class="form-group pmd-textfield pmd-text-field-floating-label">
                  <label for="Title" class="control-label">Title</label>
                  <input type="text" name='cat_new_title' class="form-control" name="title" id="cat_new_title" >
                </div>
                <label for="Image" class="control-label">Sub Category Image</label>
                <input type="file" class="form-control" name="cat_new_image" id="cat_new_image" accept="image/*" >
                <span>
                    <img id="cat_image" width="250px" height="200px">
                </span>
              </div>
              <div class="modal-footer">
                <input type="hidden" id="updateId" name="updateId">
                <input type="hidden" id="uploaded_image" name="uploaded_image">
                <input type="hidden"  name="action" id="action" value="update">
                <input type="hidden"  name="cat_type" id="cat_type" value="subcategory">
                <input type="submit"  name="updateCat" id="updateCat" class="btn btn-success" value="Update">
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