<?php

 include('userpanel_components/header.php');
 include('userpanel_components/navbar.php');

?>

<div id="wrapper">

    
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <?php  foreach($prdinfo as $prd): ?>
                    <nav aria-label="breadcrumb" role="navigation" class="pull-left">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="icon-home fa"></i></a></li>
                            <li class="breadcrumb-item"><a href="category.php">All Products</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $prd->cat_name; ?></li>
                        </ol>
                    </nav>


                    <div class="pull-right backtolist"><a href="#" onclick="window.history.back();"> <i
                            class="fa fa-angle-double-left"></i> Back to Results</a></div>

                 <?php
            if($this->session->flashdata('msg'))
            {
              $message  = $this->session->flashdata('msg');
            ?>
             <div class="<?php echo $message['class'];?>" role="alert">
                <?php echo $message['message'];?>
             </div>
         
         <?php
            }
            ?>   

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-9 page-content col-thin-right">
                    <div class="inner inner-box ads-details-wrapper">
                        <h2> <?php echo $prd->title; ?>
                            <!-- <small class="label label-default adlistingtype"><?php //echo $prd->company_name; ?></small> -->
                        </h2>
                        <span class="info-row"> <span class="date"><i class=" icon-clock"> </i> <?php echo $prd->created_at; ?> </span> - <span
                                class="category"><?php echo $prd->cat_name; ?> </span>- <span class="item-location"><i
                                class="fa fa-map-marker"></i> <?php echo $prd->city_name; ?></span> </span>

                        <div class="ads-image">
                            <h1 class="pricetag"> <?php echo "Rs. ".$prd->sale_price; ?></h1>
                            <ul class="bxslider">
                                <?php foreach($prdpics as $pic): ?>
                                <li><img src="<?php echo base_url().$pic->pic_location; ?>" alt="img"/>
                                </li>
                                <?php endforeach;?>
                           
                            </ul>
                            <div id="bx-pager">
                                 <?php foreach($prdpics as $pic): ?>
                                <a class="thumb-item-link" data-slide-index="<?php echo $pic->order_no; ?>" href=""><img
                                        src="<?php echo base_url().$pic->pic_location; ?>" alt="img"/></a>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <!--ads-image-->


                        <div class="Ads-Details">
                            <h5 class="list-title"><strong>Product Details</strong></h5>

                            <div class="row">
                                <div class="ads-details-info col-md-8">
                                    <p><?php echo $prd->description; ?></p>
                                    <h4><?php echo 'Features'; ?></h4>
                                    <ul class="list-circle">
                                        <?php $farray=explode(',',$prd->features); 
                                        $size=count($farray);
                                        for($i=0;$i<$size;$i++){
                                        ?>
                                        <li><?php echo $farray[$i]; ?></li>
                                        <?php } ?>
                                    </ul>
                                    
                                </div>
                                <div class="col-md-4">
                                    <aside class="panel panel-body panel-details">
                                        <ul>
                                            <li>
                                                <p class=" no-margin "><strong>Price:</strong> PKR  <?php echo $prd->sale_price; ?></p>
                                            </li>
                                            <li>
                                                <p class="no-margin"><strong>Type:</strong><?php echo $prd->subcat_name; ?></p>
                                            </li>
                                           <!--  <li>
                                                <p class="no-margin"><strong>Location:</strong> <?php echo $prd->city_name; ?></p>
                                            </li>
                                            <li>
                                                <p class=" no-margin "><strong>Condition:</strong> New</p>
                                            </li> -->
                                            <li>
                                                <p class="no-margin"><strong>Brand:</strong> <?php echo $prd->brand_name?></p>
                                            </li>
                                        </ul>
                                    </aside>
                                    <div class="ads-action">
                                        <ul class="list-border">
                                           <!--  <li><a href="#"> <i class=" fa fa-user"></i> More Product by User </a></li>
                                            <li><a href="#"> <i class=" fa fa-heart"></i> Save Product </a></li> -->
                                            <li><a href="#"> <i class="fa fa-share-alt"></i> Share Product </a></li>
                                           <!--  <li><a href="#reportAdvertiser" data-toggle="modal"> <i
                                                    class="fa icon-info-circled-alt"></i> Report abuse </a></li> -->
                                        </ul>
                                    </div>
                                </div>
                                 <!-- <div class="col-sm-12">
<div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo $prd->city_name; ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.webdesign-muenchen-pb.de"></a></div><style>.mapouter{text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:100%;}</style></div>

                        </div> -->
                            </div>

             <!--                <div class="content-footer text-left"><a class="btn  btn-default" data-toggle="modal"
                                                                     href="#contactAdvertiser"><i
                                    class=" icon-mail-2"></i> Send a message </a> <a class="btn  btn-info"><i
                                    class=" icon-phone-1"></i> <?php echo $prd->contact_num ;?> </a></div> -->
                        </div>


                       
                    </div>
                    <!--/.ads-details-wrapper-->

                </div>
                <!--/.page-content-->

                <div class="col-md-3  page-sidebar-right">
                    <aside>
                        <div class="card sidebar-card  bg-contact-seller">
                            <div class="card-header">Shop Now</div>
                            <div class="card-content user-info">
                                <div class="card-body text-center">
                                    <div class="seller-info">
                            <div class="row">
                               
                                <div class="col-md-12">
                    
                                     <div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn btn-number"  data-type="minus" data-qnt_field="<?php echo $prd->id; ?>">
                                          <span class="fa fa-minus"></span>
                                        </button>
                                    </span>
                                    <input type="text" required id="<?php echo $prd->id; ?>" name="quantity" class="form-control input-number quantity_input" value="1" min="1" max="100">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn btn-number" data-type="plus" data-qnt_field="<?php echo $prd->id; ?>">
                                            <span class="fa fa-plus"></span>
                                        </button>
                                    </span>
                                </div>
                                </div>


                            </div>
                            <br/>


                            <button class="add_cart btn btn-primary btn-block" 
                            data-productimage="<?php echo base_url().$pic->pic_location; ?>"
                            data-productid="<?php echo $prd->id;?>" data-productname="<?php echo $prd->title;?>" data-productprice="<?php echo $prd->sale_price;?>" data-qnt_field="<?php echo $prd->id; ?>">Add To Cart <i class="fa fa-refresh fa-spin cartproccess" style="display: none;" ></i></button>

                        
                                        
                                    </div>
                             <!--        <?php if($this->session->userdata('id')){?>
                                    <div class="user-ads-action"><a href="#contactAdvertiser" data-toggle="modal" class="btn btn-secondary btn-block"><i
                                            class=" icon-mail-2"></i> Send a message </a>
                                        <a
                                                class="btn pri-bg btn-block color-white"><i class=" icon-phone-1"></i> <?php echo $prd->contact_num ;?></a>
                                    </div>
                                    <?php }
                                    else{
                                        
                                    ?>
                                    <div class="user-ads-action">
                                        <a href="<?php echo base_url()."user/login";?>" class="btn pri-bg btn-block color-white"><i class="icon-user fa" ></i>Login To Contact </a>
                                    </div>
                                    <?php
                                    }
                                    ?> -->
                                </div>
                            </div>
                        </div>
                   
                        <div class="card sidebar-panel">
                            <div class="card-header">Safety Tips for Buyers</div>
                            <div class="card-content">
                                <div class="card-body text-left">
                                    <ul class="list-check">
                                        <li>Meet seller at a public place</li>
                                        <li>Check the item before you buy</li>
                                        <li>Pay only after collecting the item</li>
                                    </ul>
                                    <p><a class="float-right" href="#"> Know more <i
                                            class="fa fa-angle-double-right"></i> </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--/.categories-list-->
                    </aside>
                </div>
                <!--/.page-side-bar-->
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

<!-- Modal Change City -->

<div class="modal fade modalHasList" id="selectRegion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel"><i class=" icon-map"></i> Select your region </h4>

				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
						class="sr-only">Close</span></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12">

						<p>Popular cities in <strong>New York</strong>
						</p>

						<div style="clear:both"></div>
						<div class="col-sm-6 no-padding">
							<select class="form-control selecter  " id="region-state" name="region-state">
								<option value="">All States/Provinces</option>
								<option value="Alabama">Alabama</option>
								<option value="Alaska">Alaska</option>
								<option value="Arizona">Arizona</option>
								<option value="Arkansas">Arkansas</option>
								<option value="California">California</option>
								<option value="Colorado">Colorado</option>
								<option value="Connecticut">Connecticut</option>
								<option value="Delaware">Delaware</option>
								<option value="District of Columbia">District of Columbia</option>
								<option value="Florida">Florida</option>
								<option value="Georgia">Georgia</option>
								<option value="Hawaii">Hawaii</option>
								<option value="Idaho">Idaho</option>
								<option value="Illinois">Illinois</option>
								<option value="Indiana">Indiana</option>
								<option value="Iowa">Iowa</option>
								<option value="Kansas">Kansas</option>
								<option value="Kentucky">Kentucky</option>
								<option value="Louisiana">Louisiana</option>
								<option value="Maine">Maine</option>
								<option value="Maryland">Maryland</option>
								<option value="Massachusetts">Massachusetts</option>
								<option value="Michigan">Michigan</option>
								<option value="Minnesota">Minnesota</option>
								<option value="Mississippi">Mississippi</option>
								<option value="Missouri">Missouri</option>
								<option value="Montana">Montana</option>
								<option value="Nebraska">Nebraska</option>
								<option value="Nevada">Nevada</option>
								<option value="New Hampshire">New Hampshire</option>
								<option value="New Jersey">New Jersey</option>
								<option value="New Mexico">New Mexico</option>
								<option selected value="New York">New York</option>
								<option value="North Carolina">North Carolina</option>
								<option value="North Dakota">North Dakota</option>
								<option value="Ohio">Ohio</option>
								<option value="Oklahoma">Oklahoma</option>
								<option value="Oregon">Oregon</option>
								<option value="Pennsylvania">Pennsylvania</option>
								<option value="Rhode Island">Rhode Island</option>
								<option value="South Carolina">South Carolina</option>
								<option value="South Dakota">South Dakota</option>
								<option value="Tennessee">Tennessee</option>
								<option value="Texas">Texas</option>
								<option value="Utah">Utah</option>
								<option value="Vermont">Vermont</option>
								<option value="Virgin Islands">Virgin Islands</option>
								<option value="Virginia">Virginia</option>
								<option value="Washington">Washington</option>
								<option value="West Virginia">West Virginia</option>
								<option value="Wisconsin">Wisconsin</option>
								<option value="Wyoming">Wyoming</option>
							</select>
						</div>
						<div style="clear:both"></div>

						<hr class="hr-thin">
					</div>
					<div class="col-md-4">
						<ul class="list-link list-unstyled">
							<li><a href="#" title="">All Cities</a></li>
							<li><a href="#" title="Albany">Albany</a></li>
							<li><a href="#" title="Altamont">Altamont</a></li>
							<li><a href="#" title="Amagansett">Amagansett</a></li>
							<li><a href="#" title="Amawalk">Amawalk</a></li>
							<li><a href="#" title="Bellport">Bellport</a></li>
							<li><a href="#" title="Centereach">Centereach</a></li>
							<li><a href="#" title="Chappaqua">Chappaqua</a></li>
							<li><a href="#" title="East Elmhurst">East Elmhurst</a></li>
							<li><a href="#" title="East Greenbush">East Greenbush</a></li>
							<li><a href="#" title="East Meadow">East Meadow</a></li>

						</ul>
					</div>
					<div class="col-md-4">
						<ul class="list-link list-unstyled">
							<li><a href="#" title="Elmont">Elmont</a></li>
							<li><a href="#" title="Elmsford">Elmsford</a></li>
							<li><a href="#" title="Farmingville">Farmingville</a></li>
							<li><a href="#" title="Floral Park">Floral Park</a></li>
							<li><a href="#" title="Flushing">Flushing</a></li>
							<li><a href="#" title="Fonda">Fonda</a></li>
							<li><a href="#" title="Freeport">Freeport</a></li>
							<li><a href="#" title="Fresh Meadows">Fresh Meadows</a></li>
							<li><a href="#" title="Fultonville">Fultonville</a></li>
							<li><a href="#" title="Gansevoort">Gansevoort</a></li>
							<li><a href="#" title="Garden City">Garden City</a></li>


						</ul>
					</div>
					<div class="col-md-4">
						<ul class="list-link list-unstyled">
							<li><a href="#" title="Oceanside">Oceanside</a></li>
							<li><a href="#" title="Orangeburg">Orangeburg</a></li>
							<li><a href="#" title="Orient">Orient</a></li>
							<li><a href="#" title="Ozone Park">Ozone Park</a></li>
							<li><a href="#" title="Palatine Bridge">Palatine Bridge</a></li>
							<li><a href="#" title="Patterson">Patterson</a></li>
							<li><a href="#" title="Pearl River">Pearl River</a></li>
							<li><a href="#" title="Peekskill">Peekskill</a></li>
							<li><a href="#" title="Pelham">Pelham</a></li>
							<li><a href="#" title="Penn Yan">Penn Yan</a></li>
							<li><a href="#" title="Peru">Peru</a></li>

						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Modal contactAdvertiser -->

<div class="modal fade" id="contactAdvertiser" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><i class=" icon-mail-2"></i> Contact Vendor </h4>

				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
						class="sr-only">Close</span></button>
			</div>
			<div class="modal-body">
				<form role="form" method='post' action="<?php echo base_url();?>user/sendProductEmail" >
					<div class="form-group">
						<label for="recipient-name" class="control-label">Name:</label>
						<input class="form-control required" required  name="mailername" placeholder="Your name"
							   data-placement="top" data-trigger="manual"
							   data-content="Must be at least 3 characters long, and must only contain letters."
							   type="text">
					</div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Product:</label>
                        <input class="form-control required"  disabled id="product" placeholder="<?php echo $prd->title; ?>" data-placement="top" data-trigger="manual" value="<?php echo $prd->title ?>" data-content="Must be at least 3 characters long, and must only contain letters." type="text" name='mailerprd' >
                        <input  value="<?php echo $prd->id; ?>" type="hidden" name='mailerproduct'>        
                    </div>                       
					<div class="form-group">
                        
						<label for="sender-email" class="control-label">E-mail:</label>
						<input id="sender-email" type="email"
							   data-content="Must be a valid e-mail address (user@gmail.com)" name='maileremail' required data-trigger="manual"
							   data-placement="top" placeholder="email@you.com" 
                               class="form-control email">  
					</div>
					<div class="form-group">
						<label for="recipient-Phone-Number" class="control-label">Phone Number:</label>
						<input type="text" maxlength="60" name='mailernum' class="form-control" id="recipient-Phone-Number">
					</div>
					<div class="form-group">
						<label for="message-text" class="control-label">Message <span class="text-count">(300) </span>:</label>
						<textarea class="form-control" required name='mailermsg' id="message-text" placeholder="Your message here.."
								  data-placement="top" data-trigger="manual"></textarea>
					</div>
					<div class="form-group">
						<p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not
							valid. </p>
					</div>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<input type="submit" name='mailersubmit'class="btn btn-primary pull-right value='Send message !'"> 
			</div>
            </form>
		</div>
	</div>
</div>
 <?php endforeach;?>
<!-- /.modal -->

<!-- Modal contactAdvertiser -->

<div class="modal fade" id="reportAdvertiser" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><i class="fa icon-info-circled-alt"></i> There's something wrong with this ads?
				</h4>

				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
						class="sr-only">Close</span></button>
			</div>
			<div class="modal-body">
				<form role="form">
					<div class="form-group">
						<label for="report-reason" class="control-label">Reason:</label>
						<select name="report-reason" id="report-reason" class="form-control">
							<option value="">Select a reason</option>
							<option value="soldUnavailable">Item unavailable</option>
							<option value="fraud">Fraud</option>
							<option value="duplicate">Duplicate</option>
							<option value="spam">Spam</option>
							<option value="wrongCategory">Wrong category</option>
							<option value="other">Other</option>
						</select>
					</div>
					<div class="form-group">
						<label for="recipient-email" class="control-label">Your E-mail:</label>
						<input type="text" name="email" maxlength="60" class="form-control" id="recipient-email">
					</div>
					<div class="form-group">
						<label for="message-text2" class="control-label">Message <span class="text-count">(300) </span>:</label>
						<textarea class="form-control" id="message-text2"></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-primary">Send Report</button>
			</div>
		</div>
	</div>
</div>

<!-- /.modal -->
<!-- Modal Change City -->




<?php

 include('userpanel_components/footer.php');
 

?>