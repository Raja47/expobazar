<?php
ob_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller{

   public function __construct()
   {        
      parent::__construct();
      $this->load->library('session'); 
      $this->load->helper(array('form','url'));
      $this->load->model('users_model');
      $this->load->model('product_model');
      $this->load->model('seo_model');  
      $this->load->model('cities_model');    
      $this->load->model('pictures_model');
      $this->load->model('packages_model');
      $this->load->model('order_model');
   }

  


  public function index(){

     $data=array();
     $data['categories']=$this->product_model->allCategorieslimit("active_records");
     $data['activeBanners']=$this->pictures_model->activeBanners();
     $data['popularCategories']=$this->product_model->allPopularCategoriesWithProdNum();
     $data['carouselProducts']=$this->product_model->carouselProducts();
     
     $data['role']=$this->session->userdata('role')?$data['role']=$this->session->userdata('role'):null;
     $data['seo']=$this->seo_model->searchPageSeo('user/index');//controller/method
     $this->load->view('user/index',$data);
  }
  
  // previously it is categories routes
  public function cat(){
    $data=array();
    $sub_cat= $this->uri->segment(2);
    
    if($sub_cat){
        $catSlug= $sub_cat ? $sub_cat : null;
        $data["catOrsubcat"]="subcat";  
        $data['subcategories']=$this->product_model->subCategories($catSlug);
        $data['role']=$this->session->userdata('role')?$data['role']=$this->session->userdata('role'):null;
        $data['seo']=$this->seo_model->searchPageSeo('user/index');
        $this->load->view('user/categories',$data);  
    }
    else{
        $data["catOrsubcat"]="cat";
        $data['categories']=$this->product_model->allCategories("active_records");
        $data['role']=$this->session->userdata('role')?$data['role']=$this->session->userdata('role'):null;
        $data['seo']=$this->seo_model->searchPageSeo('user/index');   //controller/method
        $this->load->view('user/categories',$data);
    }
  }
  
  public function aboutus()
  {  $data=array();
    $data['seo']=$this->seo_model->searchPageSeo('user/aboutus');
    $this->load->view('user/aboutus',$data);
  }
  public function contactus()
  {  
    $data=array();
    $data['seo']=$this->seo_model->searchPageSeo('user/contactus');
    $this->load->view('user/contact',$data);
  }
  
  public function faq()
  {  
    $data=array();
    $data['seo']=$this->seo_model->searchPageSeo('user/faq');
    $this->load->view('user/faq',$data);
  }
  
  public function category(){
     
     $urlcati=$this->uri->segment(2);
     $urlsubcati=$this->uri->segment(3);
     $urlcat = $urlcati ? $urlcati : null;
     $urlsubcat=$urlsubcati ? $urlsubcati : null;
     $data=array();

     $data['allCategoriesWithSubCategories']=$this->product_model->allCategoriesWithSubCategories();

      $tree = [];
      foreach($data['allCategoriesWithSubCategories'] as $catsubcat):
          $tree[$catsubcat->cat_name]["id"] = $catsubcat->cat_id;
          $tree[$catsubcat->cat_name]["name"] = $catsubcat->cat_name;
          $tree[$catsubcat->cat_name]["slug"] = $catsubcat->cat_slug; 
            $tree[$catsubcat->cat_name]["subcategories"][] = [
                "id" => $catsubcat->subcat_id,
                "name" => $catsubcat->subcat_name,
                "slug" => $catsubcat->subcat_slug  
            ];
      endforeach;
      $data['allcategories']= $tree;

     $data['allCitiesWithProductNum']=$this->product_model->allCitiesWithProductNum();
     $data['allCategoriesWithProductNum']=$this->product_model->allCategoriesWithProdNum();
     $data['pakCities']= $this->cities_model->allPakistaniCities();
     $data['products']=$this->product_model->allProducts($urlcat,$urlsubcat);
     $data['seo']=$this->seo_model->searchPageSeo('user/category');
     $this->load->view('user/category',$data);
  
  }

  public function products(){
     
    $urlcati=$this->uri->segment(2);
    $urlsubcati=$this->uri->segment(3);
    $urlcat = $urlcati ? $urlcati : null;
    $urlsubcat=$urlsubcati ? $urlsubcati : null;
    $data=array();

    $data['allCategoriesWithSubCategories']=$this->product_model->allCategoriesWithSubCategories();

     $tree = [];
     foreach($data['allCategoriesWithSubCategories'] as $catsubcat):
         $tree[$catsubcat->cat_name]["id"] = $catsubcat->cat_id;
         $tree[$catsubcat->cat_name]["name"] = $catsubcat->cat_name;
         $tree[$catsubcat->cat_name]["slug"] = $catsubcat->cat_slug;
              
         $tree[$catsubcat->cat_name]["subcategories"][] = [
               "id" => $catsubcat->subcat_id,
               "name" => $catsubcat->subcat_name,
               "slug" => $catsubcat->subcat_slug,
            ];
     endforeach;

     $data['allcategories']= $tree;
    $data['allCitiesWithProductNum']=$this->product_model->allCitiesWithProductNum();
    $data['allCategoriesWithProductNum']=$this->product_model->allCategoriesWithProdNum();
    $data['pakCities']= $this->cities_model->allPakistaniCities();
    $data['products']=$this->product_model->products($urlcat,$urlsubcat);
    $data['seo']=$this->seo_model->searchPageSeo('user/category');
    $this->load->view('user/category',$data);
 
 }





  public function subCategorySubLocation(){
     
     $urlCategory = $this->uri->segment(3);  
     $data=array();
     $data['pakCities']= $this->cities_model->allPakistaniCities();
     $data['allCategoriesWithSubCategories']=$this->product_model->allCategoriesWithSubCategories();
     $data['category']=$this->product_model->categoryById($urlCategory);
     $data['allSubCategoriesWithProdNum']=$this->product_model->allSubCategoriesWithProdNum($urlCategory);
     $data['allCitiesWithProductNum']=$this->product_model->allCitiesWithProductNum();
     $this->load->view('user/sub-category-sub-location',$data);
  
  }

  public function accountHome(){
    
    $this->logincheck();
    $data = array();
    $data['role']=$this->session->userdata('role');
    $id=$this->session->userdata('id');
    if($success=$this->session->flashdata('success')){
          $data['success']=$success;
    }
    elseif($serror=$this->session->flashdata('error')){
        $data['error']=$error;
    }

    $data['userinfo']=$this->users_model->userinfo($id); 
    $this->load->view('user/account-home',$data);
  
  }

  function mycart(){

    $this->load->view('user/mycart');
  }
  public function updateUser(){
    $id=$this->session->userdata('id');
    $this->users_model->updateUser($id);
  }

  public function accountMyPrds(){
    
    $this->logincheck();
    $this->checkvendor();
    $vendorId=$this->session->userdata('id');
    $data =array();
    $data['role']=$this->session->userdata('role');
    $data['myPrds']=$this->product_model->vendorProducts($vendorId);
    $this->load->view('user/account-myproducts',$data);

  }
  public function currentPackage(){
    
    $this->logincheck();
    $this->checkvendor();
    $this->load->model('packages_model');
    $vendorId=$this->session->userdata('id');
    $data =array();
    $data['currentPkgId']=$this->users_model->pkgByUserId($vendorId)[0]->id;
    $data['pkgs']=$this->packages_model->allpackages();
    if($success=$this->session->flashdata('success')){
          $data['success']=$success;
    }
    elseif($error=$this->session->flashdata('error')){
          $data['error']=$error;
    }
    $this->load->view('user/mypackages',$data);

  }
  public function myPackagesRequestingModal(){
    
    $packageId=$this->input->post('pkgId');
    $pkg=$this->packages_model->pkgInfo($packageId);
   
        $result['pkgInfo']=$pkg[0];
        $result['userId']=$this->session->userdata('id');  
     
    echo json_encode($result);
  }
  public function packageRequest(){
     
     $result=$this->packages_model->addPackageRequestIntoDb();
     if($result){
      $this->session->set_flashdata('success','Package Request sent , you will contacted soon ! Thanks.');
      redirect('user/currentPackage');
     }else{
      $this->session->set_flashdata('error','Package Cant be requested currently !');
      redirect('user/currentPackage');
     }     

     
  }
  public function accountFavouriteAds(){
    
    $this->logincheck();
    $this->checkvendor();
    $data =array();
    $data['role']=$this->session->userdata('role');
    $this->load->view('user/account-favourite-ads');
    
  }
  
  public function userWishList(){

    $this->logincheck();
    $data =array();
    $id=$this->session->userdata('id');
    $data['wishlistProducts']=$this->product_model->wishlistProducts($id);  
    $this->load->view('user/account-saved-search',$data);
   
   }

   public function sendProductEmail(){
      $data=array();
      $prdid=$this->input->post('mailerproduct');  
      $prdinfo=$this->product_model->productemailinfo($prdid);
   

    $config = Array(
      'protocol' => 'smtp',
      'smtp_host' => 'mail.expobazar.pk',
      'smtp_port' => 587,
      'smtp_user' => 'info@expobazar.pk', // change it to yours
      'smtp_pass' => '12345infoexpobazar', // change it to yours
      'mailtype' => 'html',
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE
        );
    	 
        //formdata
        $mailername=$this->input->post('mailername');
    	  $maileremail=$this->input->post('maileremail');
    	  $mailermsg=$this->input->post('mailermsg');
        $mailernum=$this->input->post('mailernum');
	   
        $vendoremail = $prdinfo[0]->email;

        //our formatted email message 
       
      
       	$message = 
        '
          <head>
            <style type="text/css">
              html { background-color:#E1E1E1; margin:0; padding:0; }
              body, #bodyTable, #bodyCell, #bodyCell{height:100% !important; margin:0; padding:0; width:100% !important;font-family:Helvetica, Arial, "Lucida Grande", sans-serif;}
              table{border-collapse:collapse;}
              table[id=bodyTable] {width:100%!important;margin:auto;max-width:500px!important;color:#7A7A7A;font-weight:normal;}
              img, a img{border:0; outline:none; text-decoration:none;height:auto; line-height:100%;}
              a {text-decoration:none !important;border-bottom: 1px solid;}
              h1, h2, h3, h4, h5, h6{color:#5F5F5F; font-weight:normal; font-family:Helvetica; font-size:20px; line-height:125%; text-align:Left; letter-spacing:normal;margin-top:0;margin-right:0;margin-bottom:10px;margin-left:0;padding-top:0;padding-bottom:0;padding-left:0;padding-right:0;}
              .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} 
              .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height:100%;}
              table, td{mso-table-lspace:0pt; mso-table-rspace:0pt;} 
              #outlook a{padding:0;} 
              img{-ms-interpolation-mode: bicubic;display:block;outline:none; text-decoration:none;} resized images. */
              body, table, td, p, a, li, blockquote{-ms-text-size-adjust:100%; -webkit-text-size-adjust:100%; font-weight:normal!important;} 
              .ExternalClass td[class="ecxflexibleContainerBox"] h3 {padding-top: 10px !important;} 
              h1{display:block;font-size:26px;font-style:normal;font-weight:normal;line-height:100%;}
              h2{display:block;font-size:20px;font-style:normal;font-weight:normal;line-height:120%;}
              h3{display:block;font-size:17px;font-style:normal;font-weight:normal;line-height:110%;}
              h4{display:block;font-size:18px;font-style:italic;font-weight:normal;line-height:100%;}
              .flexibleImage{height:auto;}
              .linkRemoveBorder{border-bottom:0 !important;}
              table[class=flexibleContainerCellDivider] {padding-bottom:0 !important;padding-top:0 !important;}
              body, #bodyTable{background-color:#E1E1E1;}
              #emailHeader{background-color:#E1E1E1;}
              #emailBody{background-color:#FFFFFF;}
              #emailFooter{background-color:#E1E1E1;}
              .nestedContainer{background-color:#F8F8F8; border:1px solid #CCCCCC;}
              .emailButton{background-color:#205478; border-collapse:separate;}
              .buttonContent{color:#FFFFFF; font-family:Helvetica; font-size:18px; font-weight:bold; line-height:100%; padding:15px; text-align:center;}
              .buttonContent a{color:#FFFFFF; display:block; text-decoration:none!important; border:0!important;}
              .emailCalendar{background-color:#FFFFFF; border:1px solid #CCCCCC;}
              .emailCalendarMonth{background-color:#205478; color:#FFFFFF; font-family:Helvetica, Arial, sans-serif; font-size:16px; font-weight:bold; padding-top:10px; padding-bottom:10px; text-align:center;}
              .emailCalendarDay{color:#205478; font-family:Helvetica, Arial, sans-serif; font-size:60px; font-weight:bold; line-height:100%; padding-top:20px; padding-bottom:20px; text-align:center;}
              .imageContentText {margin-top: 10px;line-height:0;}
              .imageContentText a {line-height:0;}
              #invisibleIntroduction {display:none !important;}
              span[class=ios-color-hack] a {color:#275100!important;text-decoration:none!important;} 
              span[class=ios-color-hack2] a {color:#205478!important;text-decoration:none!important;}
              span[class=ios-color-hack3] a {color:#8B8B8B!important;text-decoration:none!important;}
              .a[href^="tel"], a[href^="sms"] {text-decoration:none!important;color:#606060!important;pointer-events:none!important;cursor:default!important;}
              .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {text-decoration:none!important;color:#606060!important;pointer-events:auto!important;cursor:default!important;}
              @media only screen and (max-width: 480px){
                body{width:100% !important; min-width:100% !important;} 
                table[id="emailHeader"],
                table[id="emailBody"],
                table[id="emailFooter"],
                table[class="flexibleContainer"],
                td[class="flexibleContainerCell"] {width:100% !important;}
                td[class="flexibleContainerBox"], td[class="flexibleContainerBox"] table {display: block;width: 100%;text-align: left;}
                td[class="imageContent"] img {height:auto !important; width:100% !important; max-width:100% !important; }
                img[class="flexibleImage"]{height:auto !important; width:100% !important;max-width:100% !important;}
                img[class="flexibleImageSmall"]{height:auto !important; width:auto !important;}
                table[class="flexibleContainerBoxNext"]{padding-top: 10px !important;}
                table[class="emailButton"]{width:100% !important;}
                td[class="buttonContent"]{padding:0 !important;}
                td[class="buttonContent"] a{padding:15px !important;}

              }
            </style>
          </head>

          <body bgcolor="#E1E1E1" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
            <center style="background-color:#E1E1E1;">
              <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="table-layout: fixed;max-width:100% !important;width: 100% !important;min-width:100% !important;>
                <tr>
                  <td align="center" valign="top" id="bodyCell">

                    <table bgcolor="#FFFFFF"  border="0" cellpadding="0" cellspacing="0" width="500" id="emailBody" style="margin-top:100px">
                      <tr>
                        <td align="center" valign="top">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="color:#FFFFFF;" bgcolor="#3498db">
                            <tr>
                              <td align="center" valign="top">
                                <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
                                  <tr>
                                    <td align="center" valign="top" width="500" class="flexibleContainerCell">
                                      <table border="0" cellpadding="30" cellspacing="0" width="100%">
                                        <tr>
                                          <td align="center" valign="top" class="textContent">
                                            <h1 style="color:#FFFFFF;line-height:100%;font-family:Helvetica,Arial,sans-serif;font-size:35px;font-weight:normal;margin-bottom:5px;text-align:center;"></h1>
                                            <h2 style="text-align:center;font-weight:normal;font-family:Helvetica,Arial,sans-serif;font-size:23px;margin-bottom:10px;color:#205478;line-height:135%;">Buyers information</h2>
                                            <div style="text-align:center;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#FFFFFF;line-height:135%;">
                                              Buyer: '.$mailername.'
                                              <br/>
                                              Buyer Email: '.$maileremail.'
                                              <br/>
                                              Number: '.$mailernum.'
                                            .</div>
                                          </td>
                                        </tr>
                                      </table>
                                    </td>
                                  </tr>
                                </table>
                                
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    
                      <tr>
                        <td align="center" valign="top">
                          <!-- CENTERING TABLE // -->
                          <table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#F8F8F8">
                            <tr>
                              <td align="center" valign="top">
                                <!-- FLEXIBLE CONTAINER // -->
                                <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
                                  <tr>
                                    <td align="center" valign="top" width="500" class="flexibleContainerCell">
                                      <table border="0" cellpadding="30" cellspacing="0" width="100%">
                                        <tr>
                                          <td align="center" valign="top">

                                            <!-- CONTENT TABLE // -->
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                              <tr>
                                                <td valign="top" class="textContent">
                                                  <!--
                                                    The "mc:edit" is a feature for MailChimp which allows
                                                    you to edit certain row. It makes it easy for you to quickly edit row sections.
                                                    http://kb.mailchimp.com/templates/code/create-editable-content-areas-with-mailchimps-template-language
                                                  -->
                                                  <h3 mc:edit="header" style="color:#5F5F5F;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;">Product Information</h3>
                                                  <div mc:edit="body" style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#5F5F5F;line-height:135%;">
                                            Product: '.$prdinfo[0]->title.'
                                            <br/>
                                            Vendor: '.$prdinfo[0]->company_name.'
                                            <br/>
                                            Category: '.$prdinfo[0]->cat_name.'<br/>
                                            Price: '.$prdinfo[0]->sale_price.' 
                                            <br/> 
                                            City: '.$prdinfo[0]->city_name.'
                                            <br/>
                                            product url:<a href="'.base_url().'user/prdDetails/'.$prdinfo[0]->id.'" >click me to for product details</a>
                                            
                                                </div>
                                                </td>
                                              </tr>
                                            </table>
                                            <!-- // CONTENT TABLE -->

                                          </td>
                                        </tr>
                                      </table>
                                    </td>
                                  </tr>
                                </table>
                                <!-- // FLEXIBLE CONTAINER -->
                              </td>
                            </tr>
                          </table>
                          <!-- // CENTERING TABLE -->
                        </td>
                      </tr>
                  
                      <tr>
                        <td align="center" valign="top">
                          <!-- CENTERING TABLE // -->
                          <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                              <td align="center" valign="top">
                                <!-- FLEXIBLE CONTAINER // -->
                                <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
                                  <tr>
                                    <td align="center" valign="top" width="500" class="flexibleContainerCell">
                                      <table class="flexibleContainerCellDivider" border="0" cellpadding="30" cellspacing="0" width="100%">
                                        <tr>
                                          <td align="center" valign="top" style="padding-top:0px;padding-bottom:0px;">

                                            <!-- CONTENT TABLE // -->
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                              <tr>
                                                <td align="center" valign="top" style="border-top:1px solid #C8C8C8;"></td>
                                              </tr>
                                            </table>
                                            <!-- // CONTENT TABLE -->

                                          </td>
                                        </tr>
                                      </table>
                                    </td>
                                  </tr>
                                </table>
                                <!-- // FLEXIBLE CONTAINER -->
                              </td>
                            </tr>
                          </table>
                          <!-- // CENTERING TABLE -->
                        </td>
                      </tr>
                    
                    </table>
                    <table bgcolor="#E1E1E1" border="0" cellpadding="0" cellspacing="0" width="500" id="emailFooter">
                      <tr>
                        <td align="center" valign="top">
                          
                          <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                              <td align="center" valign="top">
                                
                                <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
                                  <tr>
                                    <td align="center" valign="top" width="500" class="flexibleContainerCell">
                                      <table border="0" cellpadding="30" cellspacing="0" width="100%">
                                        <tr>
                                          <td valign="top" bgcolor="#E1E1E1">

                                            <div style="font-family:Helvetica,Arial,sans-serif;font-size:13px;color:#828282;text-align:center;line-height:120%;">
                                              <div>Copyright &#169; 2018 <a href="www.expobazar.com" target="_blank" style="text-decoration:none;color:#828282;"><span style="color:#828282;">expobazar</span></a>. All&nbsp;rights&nbsp;reserved.</div>
                                              
                                            </div>

                                          </td>
                                        </tr>
                                      </table>
                                    </td>
                                  </tr>
                                </table>
                                
                              </td>
                            </tr>
                          </table>
                          
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </center>
          </body>
        '
          ;
      
      // Ashok  Configurations //
    $this->load->library('email', $config);
    $this->email->set_newline("\r\n");
    $this->email->from($maileremail); // change it to yours
    $this->email->to($vendoremail);// change it to yours
    $this->email->subject('Product Request for from ExpoBazar.com');
    $this->email->message($message);
    $sent=$this->email->send();
    if($sent==true){
	$this->session->set_flashdata('msg',array('message'=>'Email sent our vendor will contact you soon','class'=>'alert alert-success'));
	redirect("user/prdDetails/40");
	}else{
			show_error( $this->email->print_debugger());
	}   
}
  
  public function addToWishList(){

    $userId=$this->input->post('userId');
    $prdId=$this->input->post('prdId');
    $this->product_model->addtowishlist($userId,$prdId);
  
  }
   public function deletefrmWishList(){
    
    $this->logincheck();
    $data =array();
    $prdId=$this->input->post('prdId');
    $result=$this->product_model->deletefrmWishList($prdId);
    $results['result']=$result;
    echo json_encode($results);
    
    
  }
  
  public function accountArchivedAds(){
    
    $this->logincheck();
    $this->checkvendor();
    $data =array();
    $data['role']=$this->session->userdata('role');
    $this->load->view('user/account-archived-ads');

  }
  public function accountPendingApprovalAds(){
    
    $this->logincheck();
    $this->checkvendor();
    $vendorId=$this->session->userdata('id');
    $data =array();
    $data['role']=$this->session->userdata('role');
    $data['myPrds']=$this->product_model->vendorPendingProducts($vendorId);
    $this->load->view('user/account-pending-approval-ads',$data);
  }
  
  public function orders(){
    $this->logincheck();
    $data = array();
    $data['role'] = $this->session->userdata('role');
     $userid= $this->session->userdata('id');
    $data['orders'] = $this->order_model->ordersByUserId($userid
    );
    $this->load->view('user/orders', $data );
    
  }

  public function order(){

    $this->logincheck();
    $data = array();
    $orderId = $this->uri->segment(3);
    $data['role'] = $this->session->userdata('role');
    $data['products'] = $this->order_model->orderById($orderId);
    $this->load->view('user/order-details', $data );

  }
  
  public function billing(){
    $this->logincheck();
    $data =array();
    $data['pakCities']= $this->cities_model->allPakistaniCities();
   
    $this->load->view('user/billing-shipping',$data);
  }

  public function accountClose(){
    $this->logincheck();
    $data =array();
    $this->load->view('user/account-close');
  }

  public function postAds(){
    $this->logincheck();
    $this->checkvendor();
    $data=array();
    $id = $this->session->userdata('id');
    
    $data['packageinfo']=$this->users_model->pkgByUserId($id);    
    $pkgProductNum = $this->users_model->pkgByUserId($id)[0]->product_posting;
    //.. Package that allow num of  products to be posted.
    
    $countProductsPostedByVendor = $this->product_model->countProductsPostedByVendor($id);
    $vendorProductNum = $countProductsPostedByVendor[0]->product_num;
    //.. counting the products that vendor have posted.
    
    if($vendorProductNum < $pkgProductNum ){
      $data['postsAllowed']=true; 
    }else{
      $data['postsAllowed']=false;
    }//..checking the remaing products are there to allow posting of products.


    $data['allCategoriesWithSubCategories']=$this->product_model->allCategoriesWithSubCategories();
    $this->load->view('user/post-ads',$data);
  }

  public function addProductsIntoDb(){
   $data=array();
    
    print_r( $this->product_model->addProductsIntoDb());
    
  }

  public function forgotPassword(){
    $this->load->view('user/forgot-password');
  }


  
  
  public function checkvendor(){
    if(!($this->session->userdata('role')=='vendor')){
      if($this->session->userdata('role')=='buyer'){
        redirect('user/accountHome');
      }   
    }
  }
  
  public function checkbuyer(){
    if(!($this->session->userdata('role')=='buyer')){
      if($this->session->userdata('role')=='vendor'){
        redirect('user/accountHome');
      }   
    }

  }


  public function prdDetails(){
    
    $data=array();  
    $prdid=$this->uri->segment(3);
    $prdarray = $this->product_model->productinfo($prdid);
    $data['prdinfo']=$prdarray[0];
    $data['prdpics']=$prdarray[1];
    $this->load->view('user/prd-details',$data);
  
  }
  public function prd(){
    $catOrprd="";
    $prdSlug="";
    $catOrprd=$this->uri->segment(1);
    if($catOrprd=="cat"){
      $prdSlug=$this->uri->segment(4);
    }elseif($catOrprd=="prd"){
      $prdSlug=$this->uri->segment(2);
    }
    $data=array();
    $prdarray = $this->product_model->productinfo($prdSlug);
    $data['prdinfo']=$prdarray[0];
    $data['prdpics']=$prdarray[1];
    
    $this->load->view('user/prd-details',$data);
  
  }

  public function login()
  {  
    $this->logoutcheck();
    $data=array();
    if($success=$this->session->flashdata('success')){
          $data['success']=$success;
    }
    elseif($error=$this->session->flashdata('error')){
          $data['error']=$error;
    }
    $this->load->view('user/login',$data);
  }

  public function loginUser(){
    $this->users_model->loginUser();
  }

  public function logincheck(){
    if(!$this->session->userdata('userlogin')){
        redirect('user/index');
    }
  }
  
  
  
  public function logout(){
      $this->users_model->logoutuser();
  }

  public function logoutcheck(){
    if($this->session->userdata('userlogin')){
        redirect('user/index','refresh');
    }
  }

  public function signup(){
      $data=array();
      $data['categories']=$this->product_model->allCategories("active_records");
      $data['pakCities']= $this->cities_model->allPakistaniCities();
      $this->load->view('user/signup',$data);
  }

  public function signupbackend(){
      
      $data=array();    
      $result=$this->users_model->signupBackend($data);    
  
  }
  

   

}    