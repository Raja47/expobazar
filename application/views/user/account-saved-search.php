<?php

 include('userpanel_components/header.php');
 include('userpanel_components/navbar.php');

?>

<div id="wrapper">

        
    <div class="main-container">
        <div class="container">
            <div class="row">
                <?php include('userpanel_components/account-asside.php'); ?>
                <div class="col-md-9 page-content">
                    <div class="inner-box">
                        <h2 class="title-2"><i class="icon-star-circled"></i> My Wish List </h2>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="adds-wrapper">
                                    <?php foreach($wishlistProducts as $prd): ?>

                                    <div class="item-list">
                                        <div class="row">
                                        <div class="col-md-2 no-padding photobox">
                                            <div class="add-image"><span class="photo-count"><i
                                                    class="fa fa-camera"></i> 2 </span> <a href="<?php echo base_url().'user/prdDetails/'.$prd->prd_id?>">
                                                <img
                                                    class="thumbnail no-margin" src="<?php echo base_url().$prd->pic_location;?>"
                                                    alt="img"></a></div>
                                        </div>
                                        <!--/.photobox-->
                                        <div class="col-sm-8 add-desc-box">
                                            <div class="ads-details">
                                                <h5 class="add-title"><a href="<?php echo base_url().'user/prdDetails/'.$prd->prd_id?>"><?php echo $prd->title; ?> </a></h5>
        <span class="info-row"> <span class="add-type business-ads tooltipHere"
                                      data-toggle="tooltip"
                                      data-placement="right"
                                      title="Business Ads"><i class="fa fa-heart"></i></span> <span
                                                        class="date"><i class=" icon-clock"> </i> <?php echo $prd->created_at; ?> </span> - <span
                                                        class="category"><?php echo $prd->subcat_name; ?></span>- <span
                                                        class="item-location"><i class="fa fa-map-marker"></i> <?php echo $prd->city_name; ?> </span> </span>
                                            </div>
                                        </div>
                                        <!--/.add-desc-box-->

                                        <div class="col-sm-2 text-right text-center-xs price-box">
                                            <h4 class="item-price"> PKR <?php echo $prd->sale_price; ?></h4>
                                <p>
                                                <a class="add-type wishlisitem business-ads tooltipHere"
                                      data-toggle="tooltip"
                                      data-placement="right"
                                      title="Delete" id="<?php echo $prd->id; ?>"><i class="fa fa-times"></i></a>
                                  </p>
                                        </div>
                                            </div>
                                    </div>
                                    <!--/.item-list-->

                                    <?php endforeach; ?>

                                </div>
                            </div>
                        </div>

                        <!--/.row-box End-->

                    </div>
                </div>
                <!--/.page-content-->
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
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
				<h4 class="modal-title"><i class=" icon-mail-2"></i> Contact advertiser </h4>

				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
						class="sr-only">Close</span></button>
			</div>
			<div class="modal-body">
				<form role="form">
					<div class="form-group">
						<label for="recipient-name" class="control-label">Name:</label>
						<input class="form-control required" id="recipient-name" placeholder="Your name"
							   data-placement="top" data-trigger="manual"
							   data-content="Must be at least 3 characters long, and must only contain letters."
							   type="text">
					</div>
					<div class="form-group">
						<label for="sender-email" class="control-label">E-mail:</label>
						<input id="sender-email" type="text"
							   data-content="Must be a valid e-mail address (user@gmail.com)" data-trigger="manual"
							   data-placement="top" placeholder="email@you.com" class="form-control email">
					</div>
					<div class="form-group">
						<label for="recipient-Phone-Number" class="control-label">Phone Number:</label>
						<input type="text" maxlength="60" class="form-control" id="recipient-Phone-Number">
					</div>
					<div class="form-group">
						<label for="message-text" class="control-label">Message <span class="text-count">(300) </span>:</label>
						<textarea class="form-control" id="message-text" placeholder="Your message here.."
								  data-placement="top" data-trigger="manual"></textarea>
					</div>
					<div class="form-group">
						<p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not
							valid. </p>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-success pull-right">Send message!</button>
			</div>
		</div>
	</div>
</div>

<!-- /.modal -->

<!-- Modal contactAdvertiser -->



<!-- /.modal -->
<!-- Modal Change City -->




<script type="text/javascript">
    $(function () {
        $('#addManageTable').footable().bind('footable_filtering', function (e) {
            var selected = $('.filter-status').find(':selected').text();
            if (selected && selected.length > 0) {
                e.filter += (e.filter && e.filter.length > 0) ? ' ' + selected : selected;
                e.clear = !e.filter;
            }
        });

        $('.clear-filter').click(function (e) {
            e.preventDefault();
            $('.filter-status').val('');
            $('table.demo').trigger('footable_clear_filter');
        });

    });
</script>
<!-- include custom script for ads table [select all checkbox]  -->
<script>

    function checkAll(bx) {
        var chkinput = document.getElementsByTagName('input');
        for (var i = 0; i < chkinput.length; i++) {
            if (chkinput[i].type == 'checkbox') {
                chkinput[i].checked = bx.checked;
            }
        }
    }

</script>

<?php

 include('userpanel_components/footer.php');
 

?>
<script>


$(document).ready(function(){
    $(".wishlisitem").on("click", function()
    {   
        
        var prdid = $(this).attr('id');
        $.ajax({
            type: 'post' ,
            dataType:'json' ,
            url: BASE_URL+"user/deletefrmWishList",  //BASE_URL a js variable already defined in header of the file
            data:"prdId="+prdid,        
            success:function(data){  
        
                          
            if(data.result==true){
                swal("Product Deleted from WishList!", "You clicked the button!", "success");
                window.location.href = BASE_URL+"/user/userWishlist/success";
            }
            else if(data.result==false){
                 swal("Error in Deleting from Your WishList!", "Please Select Another", "error");
                 window.location.href = BASE_URL+"/user/wishlist/danger";
             }
             
             //else{
                // swal("Product Already Added in Your WishList!", "Please Select Another", "warning");
             //}
          },
          error: function(xhr, status, error) {
            alert("error in ajax ");
          }
          ,
        });
    });

});
</script>

