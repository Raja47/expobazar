

<!-- Le javascript
================================================== -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>

 <script src="<?php echo base_url();?>assets/js/popper.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/owl.carousel.js" ></script>


<script type="text/javascript" src="<?php echo base_url();?>assets/js/vendors.min.js"></script>


<!-- include custom script for site  -->
<script type="text/javascript"  src="<?php echo base_url();?>assets/js/script.js"></script>
<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/popper.min.js"></script>
-->
<!-- include jquery autocomplete plugin  -->

<script type="text/javascript" src="<?php echo base_url();?>assets/js/autocomplete/jquery.mockjax.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/autocomplete/jquery.autocomplete.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/autocomplete/usastates.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.bxslider.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/sweetalert.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<!-- <script type="text/javascript" src="<?php //echo base_url();?>assets/js/autocomplete/autocomplete-demo.js"></script> -->



    <style>
    #owl-demo .item img{
        display: block;
        width: 100%;
        height: auto;
    }
    </style>


    <script>
    $(document).ready(function() {

      var owl = $("#owl-demo");

      owl.owlCarousel({
        navigation : true,
         navigation : true,
        navigationText: ['<nav class="slider-nav has-white-bg nav-narrow-svg"><a class="prev"><span class="nav-icon-wrap"></span></a></nav>','<nav class="slider-nav has-white-bg nav-narrow-svg"><a class="next"><span class="nav-icon-wrap"></span></a></nav>'],
        singleItem : true,
        transitionStyle : "fade",
        autoPlay:true,
        lazyLoad:true,
        pagination: false,


      });

      //Select Transtion Type
      $("#transitionType").change(function(){
        var newValue = $(this).val();

        //TransitionTypes is owlCarousel inner method.
        owl.data("owlCarousel").transitionTypes(newValue);

        //After change type go to next slide
        owl.trigger("owl.next");
      });
    });
    $('.bxslider').bxSlider({
        pagerCustom: '#bx-pager',
        auto: true,
             autoControls: false,
             infiniteLoop: true,
             autoDirection: 'next',
             responsive: true,
             preloadImages: 'all',
             minSlides: 2,
             autoDelay: 0
    });

$(document).ready(function(){

var quantitiy=0;
   $('.quantity-right-plus').click(function(e){
        
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($(this).data('qnt_field'));
        
        // If is not undefined
            var $qnty = parseInt($('#'+quantity).val());
           
            $('#'+quantity).val($qnty + 1);

          
            // Increment
        
    });

     $('.quantity-left-minus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name


        var quantity = parseInt($(this).data('qnt_field'));
        
        // If is not undefined
          var $qnty = parseInt($('#'+quantity).val());
            // Increment
            if($qnty >0){
               $('#'+quantity).val($qnty - 1);
            }
    });
    
});

jQuery(document).ready(function($){
  //if you change this breakpoint in the style.css file (or _layout.scss if you use SASS), don't forget to update this value as well
  var $L = 1200,
    $menu_navigation = $('#main-nav'),
    $cart_trigger = $('#cd-cart-trigger'),
    $hamburger_icon = $('#cd-hamburger-menu'),
    $lateral_cart = $('#cd-cart'),
    $shadow_layer = $('#cd-shadow-layer');


  //open lateral menu on mobile
  $hamburger_icon.on('click', function(event){
    event.preventDefault();

    //close cart panel (if it's open)
    $lateral_cart.removeClass('speed-in');
    toggle_panel_visibility($menu_navigation, $shadow_layer, $('body'));
  });

  //open cart
  $cart_trigger.on('click', function(event){
    event.preventDefault();
    //close lateral menu (if it's open)
    $menu_navigation.removeClass('speed-in');
    toggle_panel_visibility($lateral_cart, $shadow_layer, $('body'));
  });

  //close lateral cart or lateral menu
  $shadow_layer.on('click', function(){
    $shadow_layer.removeClass('is-visible');
    // firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
    if( $lateral_cart.hasClass('speed-in') ) {
      $lateral_cart.removeClass('speed-in').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
        $('body').removeClass('overflow-hidden');
      });
      $menu_navigation.removeClass('speed-in');
    } else {
      $menu_navigation.removeClass('speed-in').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
        $('body').removeClass('overflow-hidden');
      });
      $lateral_cart.removeClass('speed-in');
    }
  });

  //move #main-navigation inside header on laptop
  //insert #main-navigation after header on mobile
  move_navigation( $menu_navigation, $L);

  $(window).on('resize', function(){
    move_navigation( $menu_navigation, $L);
    
    if( $(window).width() >= $L && $menu_navigation.hasClass('speed-in')) {
      $menu_navigation.removeClass('speed-in');
      $shadow_layer.removeClass('is-visible');
      $('body').removeClass('overflow-hidden');
    }

  });


   $('.add_cart').click(function(){

     
      var product_image = $(this).data("productimage");
      var product_id    = $(this).data("productid");
      var product_name  = $(this).data("productname");
      var product_price = $(this).data("productprice");
      var quantity_feild = $(this).data("qnt_field");
      var quantity = $('#'+quantity_feild).val();

      var userid="<?php echo $this->session->userdata('id');?>";

      if(userid){

      $('.cartproccess').show();

      if(quantity > 0)
      {
        $.ajax({
        url : "<?php echo site_url('product/add_to_cart');?>",
        method : "POST",
        data : {product_image:product_image,product_id: product_id, product_name: product_name, product_price: product_price, quantity: quantity},
        success: function(data){
          // $menu_navigation.removeClass('speed-in');
          // toggle_panel_visibility($lateral_cart, $shadow_layer, $('body'));
          $('.detail_cart').html(data);
        
          $('.cart_count').load("<?php echo site_url('product/cart_total');?>");

           Swal.fire({
              type: 'success',
              showConfirmButton: true,
              confirmButtonColor: '#401572',
              background:'#f8f9fa',
              text: 'Product Added Successfully',
              footer: '<a href="<?php echo base_url();?>user/mycart"><span class="fa fa-shopping-cart"></span> My Cart <span class="badge badge-secondary cart_count"></span></a> &nbsp;&nbsp;| &nbsp;&nbsp;<a href="">Proceed Checkout</a>' ,
             
            });

           

          $('.cartproccess').hide();
          
        }
        });

      }
      
      else{
       
        Swal.fire({
              type: 'error',
              showCancelButton: true,
              showConfirmButton: false,
              cancelButtonColor: '#d33',
              background:'#f8f9fa',
              text: 'Please Select quantity'
              
             
            });
      $('.cartproccess').hide();

      }
        }
        else{
            Swal.fire({
              type: 'error',
              showCancelButton: true,
              showConfirmButton: false,
              cancelButtonColor: '#d33',
              background:'#f8f9fa',
              text: 'Please Login First',
              footer: '<a href="<?php echo base_url();?>user/login">Login</a> &nbsp;&nbsp;| &nbsp;&nbsp;<a href="<?php echo base_url();?>user/signup">Register</a>' ,
             
            });
        }

      


    });

    
    $('.detail_cart').load("<?php echo site_url('product/load_cart');?>");
    $('.cart_count').load("<?php echo site_url('product/cart_total');?>");
    
    $(document).on('click','.romove_cart',function(){
      var row_id=$(this).attr("id"); 
      $.ajax({
        url : "<?php echo site_url('product/delete_cart');?>",
        method : "POST",
        data : {row_id : row_id},
        success :function(data){
          $('.detail_cart').html(data);
          $('.cart_count').load("<?php echo site_url('product/cart_total');?>");
        }
      });
    });


});

function toggle_panel_visibility ($lateral_panel, $background_layer, $body) {
  if( $lateral_panel.hasClass('speed-in') ) {
    // firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
    $lateral_panel.removeClass('speed-in').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
      $body.removeClass('overflow-hidden');
    });
    $background_layer.removeClass('is-visible');

  } else {
    $lateral_panel.addClass('speed-in').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
      $body.addClass('overflow-hidden');
    });
    $background_layer.addClass('is-visible');
  }
}

function move_navigation( $navigation, $MQ) {
  if ( $(window).width() >= $MQ ) {
    $navigation.detach();
    $navigation.appendTo('header');
  } else {
    $navigation.detach();
    $navigation.insertAfter('header');
  }
}
    


   


</script>
<!-- Placed at the end of the document so the pages load faster -->


 <!--  -->


