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
                <h4>Manage Categories</h4>
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
                        <th>Status</th>
                        <th>Action</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php  foreach($allCategories as $category){ ?>
                        
                      <tr id="tr_<?php echo $category->id; ?>">
                        <th scope="row"><?php echo $category->id; ?></th>
                        <td><?php echo $category->name; ?></td>
                        <td><img src="<?php echo base_url().$category->pic_location; ?>" width='70' height='60'></td>                        
                        <td ><?php 
                                if($category->status == 1)
                                  {
                                       echo "Active";
                                  }
                                  elseif($category->status == 0)
                                  {
                                      echo "Blocked";
                                  }
                                 

                            ?> 
                        </td>
                        
                        <td id="<?php echo $category->id; ?>">
                          <?php
                                 if($category->status == 1)
                                  {
                                      echo "<button type='button' class='btn btn-danger catBtn' value='block_".$category->id."'>Block</button>";
                                  }
                                  elseif($category->status == 0)
                                  {
                                        echo "<button type='button' class='btn btn-success catBtn' value='approve_".$category->id."'>Approve</button>";
                                        
                                       
                                 }
                                  
                          ?>
                        </td>
                        <td><?php echo "<button type='button' class='btn btn-success catEdit' value='category_".$category->id."' data-toggle='modal' data-target='#editcatmodal'>Edit</button>"; ?></td>
                        <td><?php echo "<button type='button' class='btn btn-danger catDelete' value='category_".$category->id."'>Delete</button>"; ?></td>   
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
      <div class="modal fade" id="editcatmodal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header pmd-modal-bordered">
                <h2 class="pmd-cart-title-text" id="form-title">Edit Product Category</h2>
              <button class="close" data-dismiss="modal" type="button">&times;</button>
            
            </div>
            <form class="form-horizontal" name="form_update" id="form_update" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group pmd-textfield pmd-text-field-floating-label">
                  <label for="Title" class="control-label">Title</label>
                  <input type="text" name='cat_new_title' class="form-control"  id="cat_new_title">
                </div>
                <label for="Image" class="control-label">Category Image</label>
                <input type="file" class="form-control" name="cat_new_image" id="cat_new_image" accept="image/*" >
                <span>
                    <img id="cat_image" width="250px" height="200px">
                </span>
              </div>
              <div class="modal-footer">
                <input type="hidden" id="updateId" name="updateId">
                <input type="hidden" id="uploaded_image" name="uploaded_image">
                <input type="hidden"  name="action" id="action" value="update">
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
              <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :) -->
            </div>
          </div>
        </div>
      </footer>
    </div>

 <?php include('footer.php');?>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom/category_ajax.js"></script>
 </body>
</html>
