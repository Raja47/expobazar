<?php
   include('userpanel_components/header.php');
   include('userpanel_components/navbar.php');
   
   ?>
<div id="wrapper">
 <!--   <div class="search-row-wrapper">
      <div class="container ">
         <form action="#" method="GET">
            <div class="row">
               <div class="col-md-4">
                  <select class="form-control selecter" name="searchSucategory" id="search-category">
                     <option selected="selected" value="">All Categories</option>
                     <?php 
                        $temp='none';
                        foreach($allCategoriesWithSubCategories as $catsubcat):
                            if($catsubcat->cat_name != $temp)
                            {
                        ?>
                     <option value="Vehicles" style="background-color:#E9E9E9;font-weight:bold;"
                        disabled="disabled">
                        <?php echo $catsubcat->cat_name; ?>
                     </option>
                     <?php 
                        }    
                        $temp=$catsubcat->cat_name;
                        ?>
                     <option value="<?php echo 'subcat_'.$catsubcat->subcat_id; ?>"><?php echo "- ".$catsubcat->subcat_name;?></option>
                     <?php endforeach;?>
                  </select>
               </div>
               <div class="col-md-4">
                  <select class="form-control selecter" name="location" id="id-location">
                     <option selected="selected" value="">All Locations</option>
                     <?php foreach($pakCities as $city):?>
                     <option value="<?php echo $city->id ?>" ><?php echo $city->city_name;?></option>
                     <?php endforeach;?>
                  </select>
               </div>
               <div class="col-md-4">
                  <button class="btn btn-block btn-primary  "><i class="fa fa-search"></i>
                  </button>
               </div>
            </div>
         </form>
      </div>
   </div> -->
   <!-- /.search-row -->
   <div class="main-container">
      <div class="container">
         <div class="row">
            <!-- this (.mobile-filter-sidebar) part will be position fixed in mobile version -->
            <div class="col-md-3 page-sidebar mobile-filter-sidebar depth-1">
               <aside>
                  <div class="inner-box">
                     <div class="categories-list list-filter">
                        <h5 class="list-title"><strong><a href="#">All Categories</a></strong></h5>


                  <div class="user-panel-sidebar">
                  

                     <?php 
                        $temp='none';
                        
                        foreach($allcategories as $category):
                         
                        ?>
                        <div class="collapse-box">
                          <a href="#<?php echo $category['id']; ?>"  aria-expanded="true"  data-toggle="collapse" >
                          <h5 class="collapse-title no-border"> 
                            <?php echo $category['name'];?> 
                            
                                <i class="fa fa-angle-down pull-right"></i>
                           
                          </h5>
                         </a>
                          <div class="panel-collapse collapse" id="<?php echo $category['id']; ?>">
                            <ul class="acc-list">   
                              <?php
                              foreach($category['subcategories'] as $subcategory):?>    
                                  <li>
                                    <a href="<?php echo base_url();?>cat/<?php echo $category['slug']; ?>/<?php echo $subcategory['slug']; ?>">
                                      <?php echo $subcategory['name']; ?>
                                    </a>
                                  </li>
                              <?php endforeach; ?>
                           </ul>
                              </div>
 
                        </div>


                     <?php endforeach; ?>
                      
                     

                  </div>
                     
                
                    
                     <div style="clear:both"></div>
                  </div>
                  <!--/.categories-list-->
               </aside>
            </div>
            <!--/.page-side-bar-->
            <div class="col-md-9 page-content col-thin-left">
               <div class="category-list">
                  <!--/.tab-box-->
                  <div class="listing-filter">
                     <div class="pull-left col-xs-6">
                        <div class="breadcrumb-list">
                           <a href="#" class="current"> <span>All Products</span></a>
                           
                        </div>
                     </div>
                     <div class="pull-right col-xs-6 text-right listing-view-action">
                        <span
                        class="grid-view active"><i class=" icon-th-large "></i></span>
                        <span
                        class="list-view"><i class="  icon-th"></i></span> <span
                        class="compact-view"><i class=" icon-th-list  "></i></span> </div>
                     <div style="clear:both"></div>
                  </div>
                  <!--/.listing-filter-->
                  <!-- Mobile Filter bar-->
                  <div class="mobile-filter-bar col-xl-12  ">
                     <ul class="list-unstyled list-inline no-margin no-padding">
                        <li class="filter-toggle">
                           <a class="">
                           <i class="  icon-th-list"></i>
                           Filters
                           </a>
                        </li>
                        <li>
                        </li>
                     </ul>
                  </div>
                  <div class="menu-overly-mask"></div>
                  <!-- Mobile Filter bar End-->
                  <!-- <div class="adds-wrapper">
                     <div class="tab-content">
                         <div class="tab-pane active" id="allAds">Loading...</div>
                     </div>
                     </div> -->
                  <div class="adds-wrapper hasGridView">

                     <?php
                     $total = count($products); 
                     if($total > 0 ){
                    
                    foreach($products as $product): ?>
                     <div class="item-list make-grid">
                        <div class="row">
                           <div class="col-md-3 no-padding photobox">
                              <div class="add-image">
                                 <a href="<?php echo base_url(); ?>prd/<?php echo $product->slug;  ?>">
                                    <img style="height:150px"
                                       class="thumbnail no-margin" src="<?php echo base_url().$product->pic_location; ?>"
                                       alt="img">
                                       <h1 class="pricetag"> Rs. 10</h1>
                                    
                                 </a>
                              </div>
                           </div>
                           <!--/.photobox-->
                           <div class="col-sm-6 add-desc-box">
                              <div class="ads-details">
                                 <h5 class="add-title"><a href="<?php echo base_url(); ?>prd/<?php echo $product->slug;  ?>">
                                    <?php echo $product->title; ?> </a>
                                 </h5>
                            
                              </div>
                           </div>
                           <!--/.add-desc-box-->
                           <div class="col-md-3 text-right  price-box">
                              
                              <div class="input-group" >
                                 <span class="input-group-btn">
                                 <button type="button" class="quantity-left-minus btn btn-number"  data-type="minus" data-qnt_field="<?php echo $product->id; ?>">
                                 <span class="fa fa-minus"></span>
                                 </button>
                                 </span>
                                 <input type="text" required id="<?php echo $product->id; ?>" name="quantity" class="form-control input-number quantity_input" value="1" min="1" max="100">
                                 <span class="input-group-btn">
                                 <button type="button" class="quantity-right-plus btn btn-number" data-type="plus" data-qnt_field="<?php echo $product->id; ?>">
                                 <span class="fa fa-plus"></span>
                                 </button>
                                 </span>
                              </div>
                              
                              <a class="add_cart btn btn-primary btn-block" data-productimage="<?php echo base_url().$product->pic_location; ?>"
                                 data-productid="<?php echo $product->id;?>" data-productname="<?php echo $product->title;?>" data-productprice="<?php echo $product->sale_price;?>" data-qnt_field="<?php echo $product->id; ?>"> <i class="fa fa-cart-plus"></i>
                              <span>Add To Cart <i class="fa fa-refresh fa-spin cartproccess" style="display: none;" ></i></span> 
                              </a>
                           </div>
                           <!--/.add-desc-box-->
                        </div>
                     </div>
                     <?php endforeach;

                     }
                     else{
                        ?>
                            <div class="col-md-12" style="padding: 100px">
                                <h5 class='text-center'>No Product Found</h5>
                            </div>
                            
                       
                        <?php
                     }
                     ?>             
                  </div>
               </div>
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
<script type="text/javascript">
   $(document).ready(function(){
       $(".wlbtnajax").on("click", function()
       {   
           var userid="<?php echo $this->session->userdata('id');?>";
   
           if(userid){
               var prdid=$(this).attr('id');
               $.ajax({
                   type: 'post',
                   dataType:'json',
                   url: "<?php echo base_url()."user/addToWishList";?>",  //BASE_URL a js variable already defined in header of the file
                   data:'userId='+userid+"&prdId="+prdid,        
                   success:function(data){
                   
                   if(data.result==true){
                       
                       swal("Product Add To WishList!", "You clicked the button!", "success");
                       //window.location.href = BASE_URL+"/admin/manageCategory/success";
                   }
                   else if(data.result==false){
                       swal("Error in Adding to Your WishList!", "Please Select Another", "error");
                       //window.location.href = BASE_URL+"/admin/manageCategory/danger";
                   }else{
                       swal("Product Already Added in Your WishList!", "Please Select Another", "warning");
                   }
                 },
                 error: function(xhr, status, error) {
                   alert("error in ajax call");
                 }
                 ,
               });
           }
           else{
               swal("Please Login First", "", "error");
           }
       });
   
   });
   
   
   
</script>   
</body>
</html>