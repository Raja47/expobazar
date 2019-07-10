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
          <header> 
            <h1 class="h3 display">Forms </h1>
          </header>
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Add category Form</h4>
                </div>
                <div class="card-body">
                  <p>Add the Product Categories.</p>
               
                  <?php if ($this->session->flashdata('errors')) : ?>
                  <?php echo $this->session->flashdata('errors'); ?>
                  <?php endif; ?> 
                              


                  <form action="<?php echo base_url()?>admin/addCategoryintoDb" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Title</label>
                      <input type="text" required name="title"placeholder="Name of Category" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Category Image</label>
                      <input type="file" required id='cat_image' name='cat_image' class="form-control"  accept="image/*" />
                    </div>
                    <div class="form-group">       
                      <input type="submit" name="add_catSubmit" value="Add Category" class="btn btn-primary">
                    </div>
                  </form>
               


                </div>
              </div>
            </div>




            <div class="col-lg-6">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Add Subcategory Form</h4>
                </div>
                <div class="card-body">
                  <p>Add the Product subcategories.</p>
                  <form action="<?php echo base_url()?>admin/addCategoryintoDb" method="POST" enctype='multipart/form-data' >
                    <div class="form-group">
                      <label>category</label>
                      <select name='subCats_Category' id='category' placeholder="Name of the Category" class="form-control">
                        <?php 
                          foreach($categories as $category)
                          {
                        ?>
                            <option value="<?php echo $category->id; ?>" ><?php echo $category->name; ?></option>
                        <?php 
                          } 
                        ?>   
                      </select> 
                    </div>
                    <div class="form-group">
                      <label>Title</label>
                      <input type="text" required name='subCatName' placeholder="Name of the Category" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Subcategory Image</label>
                      <input type="file" required id='subcat_image' name='subcat_image' class="form-control"  accept="image/*" />
                    </div>
                    <div class="form-group">       
                      <input type="submit" value="Add Subcategory"  name="addSubCatSubmit"class="btn btn-primary">
                    </div>
                  </form>
                </div>
              </div>
            </div>
  
        </div>
        <div class="row">
        </div>
        
  
       <div> 
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
 <script src="<?php echo base_url();?>assets/js/custom/category_ajax.js"></script> 
 </body>
</html>