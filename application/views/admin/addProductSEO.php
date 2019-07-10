
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
            <li class="breadcrumb-item active">vendor's Table </li>
          </ul>
        </div>
      </div>
      <section>
        <div class="container-fluid">
          <!-- Page Header-->
          <div class="card">
            <div class="card-header">
              <h4>SEO Products Updates </h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form_main">
                    <h3 class="heading1 text-center"><b><i class="fa fa-cog" aria-hidden="true"></i> SEO Setting Wizard </b></h3>
                  </div>
                </div>
              </div>
                        

              <?php echo form_open_multipart("admin/seoFormUpdateProduct/$current_product_seo->product_id" ) ;?>

              <!--<div class="row">
                <div class="col-md-12">
                  <select name="seoPages" id="seoPages">
                    <option value='default'>select the page for SEO</option>
                  <?php 
                   // foreach($userPages as $page): ?>
                      <option value="<?php //echo $page->id; ?>"> <?php// echo $page->page_name; ?></option>
                  <?php 
                   // endforeach; 
                  ?>
                  </select>
                </div>
              </div>  -->
              <div class="row">
                <div class="col-md-4">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <div class="row">
                        <div class="col-md-12"><h4>Meta tags</h4></div>
                      </div>
                    </div>
                    <div class="panel-body">
                      <div class="form">
                        <span id='remainingC1'>Remaining Characters : 55</span>
                        <div id="myProgress1">
                          <div id="myBar1"></div>
                        </div>
                        <textarea  type="text" placeholder="Title" name="title" required onkeyup="input(this,'remainingC1','myProgress1','myBar1');" id="title1" class="txt_3"><?php echo $current_product_seo->title; ?></textarea>
                        <textarea placeholder="Please input your Meta Description" required name="description" type="text" class="txt_3"> <?php echo $current_product_seo->description; ?> </textarea>
                        <input type="text"  placeholder="Meta Keyword"  required name="keyword" class="txt" value="<?php echo $current_product_seo->keywords; ?>">
                        <input type="text"  placeholder="Author name"  name="authorname" class="txt" value="<?php echo $current_product_seo->author_name; ?>">
                        <input type="text"  placeholder="Copyright"  name="copyright" class="txt" value="<?php echo $current_product_seo->copyright; ?>">

                        <?php //echo $current_product_seo->linktype; ?>
                        <select name="linktype">
                            <option value="robot">Robots</option>
                            <option value="noodp">noodp</option>
                            <option value="all">all</option>
                            <option value="noIndex,nofollow">noIndex , nofollow</option>
                            <option value="Index,follow">Index , follow</option>
                            <option value="Index,nofollow">Index , nofollow</option>
                            <option value="noindex,follow">noIndex , follow</option>
                        </select>
                        <?php //echo $current_product_seo->lang; ?>
                        <select  name="language"  >
                            <option value"">Select Prefered Language</option>
                            <option value="En">English</option>
                            <option value="Sp">Spanish</option>
                            <option value="Ur" >Urdu</option>

                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <div class="row">
                        <div class="col-md-12"><h4>Open Graph Meta Tags</h4></div>
                      </div>
                    </div>
                    <div class="panel-body">
                      <div class="form">
                        <span id='remainingC2'>Remaining Characters : 55</span>
                        <div id="myProgress2">
                            <div id="myBar2"></div>
                        </div>
                        <textarea  type="text"  placeholder="Title"  name="og_title" class="txt_3" onkeyup="input(this,'remainingC2','myProgress2','myBar2');" id="title2"><?php echo $current_product_seo->og_title; ?></textarea>

                        <textarea type="text"  placeholder="Description"  name="og_description" class="txt_3"><?php echo $current_product_seo->og_decription; ?></textarea>
                         
                         <input type="text"  placeholder="Site URL" name="og_siteurl" class="txt" value="<?php echo $current_product_seo->og_siteurl; ?>">
                        <input type="file" placeholder="Image URL" name="og_imageurl" class="txt" <?php echo $current_product_seo->og_imgaeurl; ?>>
                        <input type="text" placeholder="Site Name"  name="og_sitename" value="<?php echo $current_product_seo->og_sitename; ?>" class="txt">      
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <div class="row">
                        <div class="col-md-12"><h4>Twitter Meta Tags</h4></div>       
                      </div>
                    </div>
                    <div class="panel-body">
                      <div class="form">
                        <span id='remainingC3'>Remaining Characters : 55</span>
                        <div id="myProgress3">
                          <div id="myBar3"></div>
                        </div>
                        <textarea type="text"  placeholder="Title" name="twitter_title" class="txt_3" onkeyup="input(this,'remainingC3','myProgress3','myBar3');" id="title3"><?php echo $current_product_seo->twitter_title; ?></textarea>

                        <textarea type="text" placeholder="Description" name="twitter_description"   class="txt_3"><?php echo $current_product_seo->twitter_title; ?></textarea>
                         <input type="text" placeholder="Sumary"  name="twitter_summary" class="txt" value="<?php echo $current_product_seo->twitter_summary; ?>">
                         <input type="text"  placeholder="Site" name="twitter_summary" value="<?php echo $current_product_seo->twitter_siteurl; ?>" class="txt">
                        <input type="file" placeholder="image"  name="twitter_imageurl"  class="txt" value="<?php echo $current_product_seo->twitter_imageurl; ?>">
                      </div>
                    </div>
                  </div>
                  <br><br>
                    <input type="submit" required="" name="submit" value="Add Tags to Product"  class="button" >
                  </div>
              </div>
            </div><?php echo form_close(); ?>
          </div>
        </div>
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
 
   <?php 
   include('footer.php');

   ?>
   <script>


  var maxLength = 55;
  function input(myid,remC,myPro,bar)
  {
      var id = myid.getAttribute('id');
      var value = $('#'+id).val();
        
        if (value.length > 55) 
        {
         value = value.substring(0, 55);
         $('#'+id).val(value);
        
        }
        else{


        // remaining Charachter short code
        var titlefieldlength = $("#"+id).val().length;
        var remaininglength = maxLength-titlefieldlength;
        // progress bar short code
        var outerdivwidth=$('#'+myPro).css('width');
        var parsingtointeger=parseInt(outerdivwidth);
        var fixedsize=55;
        var percharacter=parsingtointeger/fixedsize;
        var progresswidth=percharacter*titlefieldlength;
        $("#"+remC).html("Remaining characters : " +remaininglength);
        // increment in bar width width on keyup
        $("#"+bar).width(progresswidth+"px");  
    }

    }




</script>
   <!-- <script type="text/javascript" src="<?php //echo base_url(); ?>assets/js/seo_ajax.js"></script> -->
   <script type="text/javascript">
      $(document).ready(function(){ 

        $('#seoPages').change(function(){
          var pageId= $(this).val();
          
          $.ajax({
              type: 'post',
              dataType:'json',
              url: BASE_URL+"admin/seoSelectedPageChange",  //BASE_URL a js variable already defined in header of the file
              data:{
                  pageId:pageId
              },        
            success:function(data){  
           
              seo = data.pageSeo;
              
              $("textarea[name='title']").val(seo.title);
              $("textarea[name='description']").val(seo.description);
              $("input[type='text'][name='authorname']").val(seo.author_name);
              $("input[type='text'][name='keyword']").val(seo.keywords);
              $("input[type='text'][name='copyright']").val(seo.copyright);
              $("select[name='linktype']").val(seo.linktype);
              $("select[name='language']").val(seo.lang);
              $("textarea[name='og_title']").val(seo.og_title);
              $("textarea[name='og_description']").val(seo.og_decription);
              $("input[type='text'][name='og_siteurl']").val(seo.og_siteurl);
              $("input[type='text'][name='og_sitename']").val(seo.og_sitename);
              $("input[type='file'][name='og_imageurl']").val(seo.og_imageurl);
              $("textarea[name='twitter_title']").val(seo.twitter_title);
              $("textarea[name='twitter_description']").val(seo.twitter_description);
              $("input[type='text'][name='twitter_summary']").val(seo.twitter_summary);
              $("input[type='text'][name='twitter_siteurl']").val(seo.twitter_siteurl);
              $("input[type='file'][name='twitter_imageurl']").val(seo.twitter_imageurl);
              $("input[type='text'][name='twitter_siteurl']").val(seo.twitter_siteurl);

            },
            error:function(xhr, status, error) {
              alert("error in ajax call");
            }
            ,
          });
          


        });

      });

      
   </script>

</body>
</html>   