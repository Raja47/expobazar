<?php
ob_start();
class Admin extends CI_Controller{

   public function __construct()
   {
            parent::__construct();

            $this->load->library('session');
            $this->load->helper(array('form','url'));
            $this->load->model('users_model');
            $this->load->model('pictures_model');
            $this->load->model('packages_model');
            $this->load->model('product_model');
            $this->load->model('order_model');
            $method = $this->router->fetch_method();
            $methods = array('addCategory','addpackageintodb','manageCategory',
              'manageSubCategory','categoryStatusUpdate','subCategoryStatusUpdate',
              'singleCategory','categoryDelete','updateCategory','users','siteusers','userStatusUpdate');
            if(in_array($method,$methods)){
              if(!$this->session->has_userdata('adminlogin')){
                $this->session->set_flashdata('error','Please Login First');
                redirect('admin/login');
              }
            }      
   
   }
  public function index()
  {
        $this->logincheck();
        $data=array();
        $data['title']=" Finanace, Electronics, Wheels, ServiceProviders in Pakistan|vlook4u";
        $data['description']=" Finanace, Electronics, Wheels, ServiceProviders in Pakistan|vlook4u";
        $data['keywords']="Pakistan other products in Pakistan.";
        $this->load->view('admin/dashboard');
  }
    

    public function login()
    {  
      $this->logoutcheck();
      $this->load->view('admin/login');
    }
    public function adminLoginAttempt(){
      $this->users_model->loginAsAdmin();
    }
    public function logoutAttempt(){
      $this->users_model->logoutAsAdmin();
    }

    public function register()
    {
      $this->logoutcheck();
      $this->load->view('admin/register');
    }
    



    ///*** User Related Controller Functions ***///
    ////***************************************////  
    
    public function siteusers()
    {
      $this->logincheck();
      $siteusers = $this->uri->segment(3);
      $data=array();
      $data['title']="Buy Finanace, Electronics, Wheels, ServiceProviders services in Pakistan";
      $data['description']="Buy Finanace, Electronics, Wheels, ServiceProviders Services in Pakistan|vlook4u";
      $data['keywords']="Pakistan other products in Pakistan.";
      $data['allUsers']=$this->users_model->allusers("buyer");
        $this->load->view('admin/buyer',$data);
    }
    // This is the for users who are registered as Buyer

    public function users()
    {
      
      $this->logincheck();
      $users = $this->uri->segment(3);
      if($users==null)
      {
        $data=array();
        $data['allUsers']=$this->users_model->allusers("vendor");
        $this->load->view('admin/vendor',$data);
      }
      elseif($users=='success')
      {
        $data=array();
        $data['msg']='User Record updated successfully';
        $data['allUsers']=$this->users_model->allusers("vendor");
        $this->load->view('admin/vendor',$data);
      }
      elseif($users=='danger')
      {
        $data=array();
        $data['allUsers']=$this->users_model->allusers("vendor");
        $this->load->view('admin/vendor',$data);
      }
      else echo "none";
    
    }
    public function userStatusUpdate(){
        $this->logincheck();
        $this->users_model->user_status_update();
    }








    ///*** Package related Controller functions ***///
    ////*******************************************///
    public function packages(){
        $this->logincheck();
        $data=array();
        $data['title'] ="Finanace, Electronics, Wheels, ServiceProviders in Pakistan|vlook4u";
        $data['description']=" Finanace, Electronics, Wheels, ServiceProviders in Pakistan|vlook4u";
        $data['keywords']="Pakistan,Laptops Laptops in Pakistan";
        $data['allPackages']=$this->packages_model->allpackages();
        $this->load->view('admin/packages',$data);
    }

    public function addpackage(){
      $this->logincheck();
      $data=array();
      $this->load->view('admin/addpackage',$data);
    }
    public function addpackageintodb(){
      $this->logincheck();
      $data=array();
      
      $result=$this->packages_model->addPackageIntoDb();
      
      if($result){
         redirect('admin/packages');
      }
    }
    public function packagerequests(){
      $this->logincheck();
      $data=array();
      $data['allRequests']=$this->packages_model->packageRequests();
      $this->load->view('admin/packagerequests',$data);
    }
    public function packageRequestStatusUpdate(){
      $this->logincheck();
      $this->packages_model->packages_request_status_update();
      
    }
    public function packageStatusUpdate(){
      $this->logincheck();
      $this->packages_model->packages_status_update();
      
    }

    

    ///*** Category Related  Controllers functions ***////
    ////**********************************************////
    public function addCategory(){
        $this->logincheck();
        $data=array();
        if($success=$this->session->flashdata('success')){
          $data['success']=$success;
        }
        elseif($serror=$this->session->flashdata('error')){
          $data['error']=$error;
        }
        $categories=$this->product_model->allCategories('active_records');
        $data['categories']=$categories;
        $this->load->view("admin/addcategory",$data);
    }
    public function addCategoryintoDb(){
      if($this->input->post("add_catSubmit")){
        
          $picture=$this->uploadImage("cat_image","Uploads/images/categories/");
          $this->product_model->insertCategory($picture);
      }
      elseif($this->input->post("addSubCatSubmit")){
           $picture=$this->uploadImage("subcat_image","Uploads/images/subcategories/");
        $this->product_model->insertSubCategory($picture);
      } 
    }  

    public function manageCategory(){
          $this->logincheck();
          $data=array();
          $data['allCategories']=$this->product_model->allCategories('all_records');
          $this->load->view('admin/managecategory',$data);
    }
    public function manageSubCategory(){
          $this->logincheck();
          $data=array();
          $data['allSubCategories']=$this->product_model->allSubCategories('all_records');
          $this->load->view('admin/managesubcategory',$data);
    }
    public function categoryStatusUpdate(){
          $this->logincheck();
          $this->product_model->category_status_update();
    }
    public function subCategoryStatusUpdate(){
      $this->logincheck();
      $this->product_model->subcategory_status_update();
    }
    public function categoryDelete(){
      $this->logincheck();
      $this->product_model->category_delete();
    }

    public function singleCategory(){
      //$action=$this->input->post('action');
      $this->logincheck();
      $this->product_model->single_category();      
    }

    public function updateCategory(){
      //$action=$this->input->post('action');
      $this->logincheck();
      $this->product_model->update_category();      
    }

    



    ///*** Seo admin related controller functions ***///
     ////*****************************************//// 
    public function seoAdmin(){
        $this->logincheck();
        $data=array();
        $this->load->model('seo_model');
        $data['userPages']=$this->seo_model->userSeoPages();
        $this->load->view('admin/seoAdmin',$data);
    }
    public function seoFormPost(){
      $this->load->model('seo_model');
       $queryRun = $this->seo_model->updatePageSeo(); 
       if($queryRun==true){
        $this->session->set_flashdata('success',"Dear Sir/Mam , Seo of the page successfully updated ");
        redirect('admin/seoAdmin/success');
       }else
       {
        $this->session->set_flashdata('error',"Dear Sir/Mam , Sorry! The seo record cant be updated");
        redirect('admin/seoAdmin/error');
       }
    } 
    public function seoSelectedPageChange(){
      $this->load->model('seo_model');
      $this->seo_model->seoSelectedPageChange();
    }

    public function viewAllProducts(){
        $this->logincheck();
        $data=array();
        $this->load->model('Product_model');
        $data['allProductsAdmin']=$this->Product_model->allProductsAdmin('all_records');
        $this->load->view('admin/seoProductsView',$data);
    }

    public function addProductSEO(){
      $this->logincheck();
      $this->load->model('seo_model');
       $id = $this->uri->segment(3);
       $data['current_product_seo'] = $this->seo_model->fetch_product_SEO($id);
       $this->load->view('admin/addProductSEO',$data);
    }

    public function seoFormUpdateProduct(){
      $this->load->model('seo_model');

       $queryRun = $this->seo_model->updateProductSeo($this->uri->segment(3)); 
       if($queryRun==true){
        $this->session->set_flashdata('success',"Dear Sir/Mam , Seo of the Product successfully updated ");
        redirect('admin/viewAllProducts/success');
       }else
       {
        $this->session->set_flashdata('error',"Dear Sir/Mam , Sorry! The seo record cant be updated");
        redirect('admin/viewAllProducts/error');
       }
    }


     ///*** Banner related controller functions ***///
     ////*****************************************//// 
      public function bannersettings(){
        $this->logincheck();
        if($success=$this->session->flashdata('success')){
          $data['success']=$success;
        }
        elseif($serror=$this->session->flashdata('error')){
          $data['error']=$error;
        }
        $data['allBanners']=$this->pictures_model->allBannerPics();
        $this->load->view('admin/bannersettings',$data);
      }
      

      public function addBannerIntoDb(){
        $this->logincheck();
        $result=$this->pictures_model->insertBanner();
      }
      public function bannerStatusUpdate(){
        $this->logincheck();
        $result=$this->pictures_model->bannerStatusUpdate();
      }

  
  ///*** extra link to form and its attributes while its is only for  extracting  form elements ***/////
    public function form(){
      $this->logincheck();
      $this->load->view("admin/form");
    }   

    ///*** Products related controller functions  ***/////
    public function pendingProducts(){
      $this->logincheck();
      $data=array();
      $data['title'] ="Finanace, Electronics, Wheels, ServiceProviders in   Pakistan|vlook4u";
      $data['pendingProducts']=$this->product_model->pendingProducts();
      $this->load->view('admin/pending-products',$data);

    }
    public function approvedProducts(){
      $this->logincheck();
        $data=array();
        $data['title'] ="Finanace, Electronics, Wheels, ServiceProviders in Pakistan|vlook4u";
        $data['approvedProducts']=$this->product_model->approvedProducts();
        $this->load->view('admin/approved-products',$data);

    }
    public function productStatusUpdate(){
        $this->logincheck();
        $this->product_model->product_status_update();
    }

    public function productDelete(){
      $this->logincheck();
      $this->product_model->product_delete();
    }
    public function singleProduct(){
      //$action=$this->input->post('action');
      $this->logincheck();
      $this->product_model->single_product();      
    }

    public function updateProduct(){
      //$action=$this->input->post('action');
      $this->logincheck();
      $this->product_model->update_product();      
    
    }
  ///*** These functions are going to be used in each Method to prevent acoid repeatation of same block of code in conrollrer functions ***/////
  
   public function updateCategoryintoDb(){
      
      
        //$data =$this->input->post('cat_new_title');

        
        
         $picture=$this->uploadImage("cat_new_image","Uploads/images/categories/");
          //echo $picture;
         $this->product_model->updateCategoryintoDb($picture);
         $result['picture']=$picture;

         echo json_encode($result);
      
    
    }  


  public function uploadImage($fileName,$fileUrl){
      if(!empty($_FILES["$fileName"]['name'])){
          $url = "$fileUrl";
          $config['upload_path']= $url;
          //$config['max_size'] = '400';
          //$config['max_width']  = '1024';
          //$config['max_height']  = '768';
          $config['allowed_types']= 'gif|jpg|png';
          $config['file_name'] = $_FILES["$fileName"]['name'];
          $this->load->library('upload');
          $this->upload->initialize($config);
          if($this->upload->do_upload("$fileName")){
              $uploadData = $this->upload->data();
              $picture = $url.$uploadData['file_name'];
          }else{
              $picture = $this->upload->display_errors()." <br/>".$config['upload_path'];
          }
      }
      else
      {
          $picture = 'empty file';
      }
      return $picture;
  }
  


  //**** Products related functions ****///
  //***********************************////

  public function addProduct(){
    $this->logincheck();
    //$this->checkvendor();
    $data=array();
    $id = $this->session->userdata('adminid');
    $data['id']=$id;
    $data['allCategoriesWithSubCategories']=$this->product_model->allCategoriesWithSubCategories();
    $this->load->view('admin/addproduct',$data);
    }

    
  public function addProductIntoDb(){
   $data=array();
     $this->product_model->addProductsIntoDb();
    
  }
  public function manageProduct(){
    $this->logincheck();
    $data=array();
    $data['allProductsAdmin']=$this->product_model->allProductsAdmin('all_records');
    $this->load->view('admin/manageproduct',$data);
  }

  //**** orders related functions ****///
  public function pendingOrders(){
    $this->logincheck();
    $data=array();
    $data['allPendingOrders']=$this->order_model->allPendingOrders();
    $this->load->view('admin/pending-orders',$data);
  }
  public function deliveredOrders(){
    $this->logincheck();
    $data=array();
    $data['allPendingOrders']=$this->order_model->allDeliveredOrders();
    $this->load->view('admin/pending-orders',$data);
  }
   public function cancelledOrders(){
    $this->logincheck();
    $data=array();
    $data['allPendingOrders']=$this->order_model->allCancelledOrders();
    $this->load->view('admin/pending-orders',$data);
  }
   public function refundOrders(){
    $this->logincheck();
    $data=array();
    $data['allPendingOrders']=$this->order_model->allRefundOrders();
    $this->load->view('admin/pending-orders',$data);
  }

  public function orderStatusUpdate(){
        
        $this->logincheck();
        $data=array();
        $this->order_model->order_status_update();
  }




  //*** login function *** ///
  public function logincheck(){
    if(!$this->session->userdata('adminlogin') && !$this->session->userdata('modifierlogin')){
              redirect('admin/login');
      }
  }
  public function logoutcheck(){
    if($this->session->userdata('adminlogin') || $this->session->userdata('modifierlogin')){
              redirect('admin/index','refresh');
      }
  }
  
  




}   


?>