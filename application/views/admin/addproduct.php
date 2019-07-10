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
        if($this->session->flashdata('error')!=null){
        ?>    
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong></strong> <?php echo $this->session->flashdata('error');?>
          </div>
        <?php   
        }
        ?>
        <?php
        if($this->session->flashdata('success')!=null)
        {
        ?>    
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong></strong> <?php echo $this->session->flashdata('success');?>
          </div>
        <?php   
        }
        ?>


        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Forms </h1>
          </header>
          <div class="row">
            <div class="col-lg-9">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Product Form</h4>
                </div>
                <div class="card-body">
                  <p>Add the Product</p>
            <?php if ($this->session->flashdata('errors')) : ?>
            <?php echo $this->session->flashdata('errors'); ?>
          <?php endif; ?> 
                                
                                <form class="form-horizontal" method='post' action="<?php echo base_url();?>admin/addProductIntoDb" enctype='multipart/form-data'>

                                    <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">Category</label>
                                        <div class="col-sm-8">
                                            <select name="prdSubCat" id="category-group" class="form-control">
                                                <option selected="selected" value="">All Categories</option>
                                                <?php 
                                                $temp='none';
                                                foreach($allCategoriesWithSubCategories as $catsubcat):
                                                    if($catsubcat->cat_name != $temp)
                                                    {
                                                ?>
                                                    <option  style="background-color:#E9E9E9;font-weight:bold;"
                                                        disabled="disabled">
                                                    <?php echo $catsubcat->cat_name; ?>
                                                    </option>
                                                
                                                    <?php 
                                                     }    
                                                     $temp=$catsubcat->cat_name;
                                                    ?>
                                                    <option value="<?php echo $catsubcat->subcat_id; ?>"><?php echo "- ".$catsubcat->subcat_name;?></option>
                                                    <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">Product title</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="Adtitle" name='prdTitle' placeholder="Ad title">
                                            <small id="" class="form-text text-muted">
                                                A great title needs at least 60 characters
                                            </small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">Product Brand</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="AdBrand" name='prdBrand' placeholder="Product">
                                            <small id="" class="form-text text-muted">
                                                Any brand name of your product
                                            </small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">Describe Product</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="prdDescription" rows="3">Description of your Product</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">Price</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">pkr</span>
                                                <input type="text" class="form-control" name='prdPrice' aria-label="Price">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">Discount(if any*)</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">Percentage</span>
                                                <input type="text" name='prdDiscount' class="form-control" aria-label="Price">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">Product Features</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name='prdFeatures' placeholder="Features">
                                            <small id="" class="form-text text-muted">
                                                Put comma after each feature
                                            </small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="textarea">Picture</label>
                                        <div class="col-lg-8">
                                          <?php for($i=1;$i<=5;$i++){ ?>  
                                            <div class="mb10">
                                                <input name="prdImage<?php echo $i; ?>" type="file" accept="image/*" class="file" >
                                            </div>
                                          <?php  } ?>  
                                            <input type='hidden' value="5"    name='picsNo' >                       
                                            <input type='hidden' value="<?php echo $id; ?>"    name='added_by' >
                                            
                                        </div>
                                    </div>

                                    <!-- Button  -->
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-8"><input type='submit' name='prdSubmit' class="btn btn-success btn-lg"></div>
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