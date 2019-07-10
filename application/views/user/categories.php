<?php
   include('userpanel_components/header.php');
   include('userpanel_components/navbar.php');
   
   ?>
<div id="wrapper">

   <div class="main-container">
      <div class="container">
         <div class="row">
            <!-- this (.mobile-filter-sidebar) part will be position fixed in mobile version -->
          <div class="col-lg-12 page-sidebar col-thin-left">
                        
                            
                          <!--   <div class="inner-box">
                                <h2 class="title-2">Popular Categories</h2>

                                <div class="inner-box-content">
                                    <ul class="cat-list arrow">
                                        <?php foreach($popularCategories as $cat): ?>
                                        
                                        <li>
                                         <a href="<?php echo base_url().'user/category/'.$cat->cat_id; ?>" > 
                                            <?php echo $cat->cat_name."  (".$cat->product_num.")" ; ?>  
                                         </a>
                                        </li>

                                    <?php endforeach; ?>
                                        
                                    </ul>
                                </div>
                            </div> -->
                            <div class="row row-featured row-featured-category">
                    <div class="col-xl-12  box-title no-border">
                        <div class="inner"><h2><span></span>
                            Browse By Category </h2>
                        </div>
                    </div>
                    <?php 
                     if($catOrsubcat == "cat"){ 
                        foreach($categories as $category):?>
                        <div class="col-xl-3 col-md-3 col-sm-3 col-xs-2 category-box">
                           <a href="<?php echo base_url(); ?>cat/<?php echo $category->slug; ?>" ><img src="<?php echo base_url()."".$category->pic_location;?>" class="img-responsive" alt="<?php echo $category->name; ?>">
                                 <h6><?php echo $category->name; ?></h6></a>
                        </div>
                        <?php 
                        endforeach;
                     }
                     else{
                        foreach($subcategories as $subcategory):?>
                        <div class="col-xl-3 col-md-3 col-sm-3 col-xs-2 category-box">
                           <a href="<?php echo base_url(); ?>cat/<?php echo $subcategory->catSlug."/".$subcategory->subCatSlug; ?>" ><img src="<?php echo base_url()."".$subcategory->pic_location;?>" class="img-responsive" alt="<?php echo $subcategory->name; ?>">
                                 <h6><?php echo $subcategory->name; ?></h6></a>
                        </div>
                        <?php 
                        endforeach;
                     }
                ?>    

                </div>
                      <br>      
                       
                    </div>
           
           
            <!--/.page-content-->
         </div>
      </div>
   </div>
   <!-- /.main-container -->
   <?php 
      include('userpanel_components/footer-navigation.php');
      
      ?>
   <!-- /.footer -->
</div>
<!-- /.wrapper -->


<?php
   include('userpanel_components/footer.php');
   
   
   ?>
   
</body>
</html>