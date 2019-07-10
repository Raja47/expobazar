<?php
    include('userpanel_components/header.php');
    include('userpanel_components/navbar.php');
?>
<div id="wrapper">
    <div class="main-container">

        <div class="container">
            
            <div class="row">
                
                
                <?php include('userpanel_components/account-asside.php'); ?>    
                <div class="col-md-8 page-content">
                    
                    <?php
                              if(isset($success)){
                            ?>    
                                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Dear User!</strong> <?php echo $success;?>
                                  </div>
                             <?php   }
                              ?><?php
                                if(isset($error)){ ?>    
                                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong></strong> <?php echo $error;?>
                                </div>
                            <?php   } ?>
                    <div class="inner-box category-content">
                        <h2 class="title-2"><i class="icon-user-add"></i>My Package Plans</h2>

                    <?php 
                    foreach($pkgs as $pkg): ?>
                    <div class="faq-content">

                    <div aria-multiselectable="true" role="tablist" id="accordion" class="panel-group faq-panel">
                        <div class="card">
                        <div class="card">
                            <div id="heading" role="tab" class="card-header">
                                <h4 class="card-title">
                                    <a aria-controls="collapseTwo" style="display: inline-block" aria-expanded="false" href="#collapse<?php echo $pkg->id;?>" data-parent="#accordion" data-toggle="collapse" class="collapsed pull-left">
                                        <?php echo $pkg->package_name; ?>
                                    </a>
                                    <?php 
                                    if( $pkg->id != $currentPkgId){
                                    ?>
                                    <a href="#" data-toggle="modal" class="btn btn-secondary pull-right pkgRequestBtn" id="<?php echo $pkg->id; ?>"  ><i class="icon-mail-2"></i> Request for modal </a>
                                
                                    <?php
                                     }
                                    else {   
                                    ?>
                                     <a href="#" style="pointer-events: none; cursor: default;" class="btn btn-secondary btn-success pull-right"> Current Package </a>
                                    <?php } ?> 
                                </h4>
                            </div>
                            <div aria-labelledby="headingTwo" role="tabpanel" class="panel-collapse collapse" id="collapse<?php echo $pkg->id;?>">
                                <div class="card-body">
                                    <ul class="list-circle">

                                   
                                    <li>Priority Ranking :<?php echo $pkg->priority_ranking; ?></li>
                                    <li>Product Posting :<?php echo $pkg->product_posting; ?></li>
                                    <li>Grading Tag :<?php echo $pkg->grading_tag; ?></li>
                                    <li>Product Showcases :<?php echo $pkg->product_showcases; ?></li>
                                    <li>Customized Account :<?php 
                                        if($pkg->customized_account==0){
                                            echo "No";
                                        }elseif($pkg->customized_account==1){
                                            echo "yes";
                                        }
                                        ?>
                                    </li>
                                    <li>Photos Per Product :<?php echo $pkg->photos_per_product;?></li>
                                    <li>Customize Bumber Offer :<?php 
                                        if($pkg->customize_bumber_offer==0){
                                            echo "No";
                                        }elseif($pkg->customize_bumber_offer==1){
                                            echo "yes";
                                        }
                                        ?>
                                    </li>
                                    <li>Profile Slider Pictures :<?php echo $pkg->profile_slider_pictures;?></li>
                                    <li>Inquiry Reply :<?php
                                        if($pkg->inquiry_reply==0){
                                            echo "No";
                                        }elseif($pkg->inquiry_reply==1){
                                            echo "yes";
                                        }
                                     
                                     ?></li>
                                    <li>Charges :<?php echo $pkg->charges ?></li> 
                                    
                                    <ul>   
                                </div>
                            </div>
                        </div>
                    </div>

                <br>
                </div>
              </div>

                <?php endforeach; ?>
                </div>
                <!-- /.page-content -->    
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.main-container -->

    
    <!--/.footer-->

</div>
<!-- /.wrapper -->







<!-- Modal Change City -->

<!-- Modal contactAdvertiser -->

<div class="modal fade" id="changepackage" tabindex="-1" role="dialog"> 

<div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><i class=" icon-mail-2"></i> Contact Vendor </h4>

                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="post" action="<?php echo base_url(); ?>user/packageRequest" >
                            

                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Package:</label>
                                <input class="form-control required"  disabled id="package"  data-placement="top" data-trigger="manual" value="" data-content="Must be at least 3 characters long, and must only contain letters." type="text" name="pkgName" >
                                <input  value="" type="hidden" name="pkgId">
                                <input  value="<?php ?>" type="hidden" name="userId">        
                            <div>                       
                            

                            
                            <div class="form-group">
                                <label for="recipient-Phone-Number" class="control-label">Price</label>
                                <input type="text" value="" disabled name="pkgPrice" class="form-control" id="recipient-Phone-Number">
                            <div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Discount: <span class="text-count">* </span>:</label>
                                <input type="text" value=""  disabled name="pkgDiscount" class="form-control" id="recipient-Phone-Number">
                            <div>
                            <div class="form-group">
                                <p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not valid. </p>
                            <div>
                            
                            <div class="form-group">
                                <label for="message-text" class="control-label">Net Price: <span class="text-count">*</span>:</label>
                                <input type="text" value="" disabled name="pkgNetPrice" class="form-control" id="recipient-Phone-Number">
                            <div>
                           
                            <div class="form-group">
                                <p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not valid. </p>
                            <div>
                                
                    <div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <input type="submit" name="pkgSubmit" class="btn btn-success pull-right value=" Send Request "> 
                    <div>
                    </form>
                <div>
<div>


</div>
 <!-- /.modal -->



 <?php include('userpanel_components/footer.php'); ?>
 

 <script>
    $(document).ready(function(){
    $(".pkgRequestBtn").on("click", function()
        {   

        var packageId= $(this).attr('id');

        $.ajax({
            type: 'post',
            dataType:'json',
            url: BASE_URL+"user/myPackagesRequestingModal",  //BASE_URL a js variable already defined in header of the file
            data:{
                pkgId:packageId
            },        
          success:function(data){  
            var userId=data.userId;
            var pkg=data.pkgInfo;

             $("input[type='hidden'][name='pkgId']").val(pkg.id);
              $("input[type='hidden'][name='userId']").val(userId);


            $("input[type='text'][name='pkgName']").val(pkg.package_name);
            $("input[type='text'][name='pkgPrice']").val(pkg.charges);
            $("input[type='text'][name='pkgDiscount']").val((pkg.discount_in_percentage * pkg.charges)/100);  
            $("input[type='text'][name='pkgNetPrice']").val( (pkg.charges)-(pkg.discount_in_percentage * pkg.charges)/100);
            $('#changepackage').modal('show');
            

          },
          error:function(xhr, status, error) {
            alert("error in ajax call");
          }
          ,
        });
     

     });


  });  

</script>
