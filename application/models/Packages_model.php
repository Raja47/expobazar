<?php
  class Packages_model extends CI_Model
  {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function allpackages()

    {
        $query = $this->db->query(
        "SELECT packages.id , 
                packages.package_name , 
                packages.priority_ranking ,
                packages.product_posting,
                packages.grading_tag ,
                packages.product_showcases ,
                pictures.pic_location,
                packages.customized_account,
                packages.photos_per_product,
                packages.customize_bumber_offer,
                packages.profile_slider_pictures,
                packages.inquiry_reply,
                packages.charges,
                packages.discount_in_percentage,
                packages.status
                FROM packages  
                LEFT JOIN `pictures` ON pictures.picture_of_id = packages.id     

                where  packages.status <> 2 and pictures.picture_type='package'
                " );
        return $query->result();
    }


    public function packages_status_update(){
        
        $action=$this->input->post('action');
        $id =$this->input->post('ele_id');
        
        if($action == 'approve'){
            $query = $this->db->query("update packages set status = 1 where id=$id" );    
        }
        elseif($action =='block'){
            $query = $this->db->query( "update packages set status = 0 where id=$id" );
        }
        $results['query']=$query;
        $results['check']="lets c";
        echo json_encode($results);
    
    }

    public function addPackageIntoDb(){

        if($this->input->post('addPkgSubmit')){
           $pkgName= $this->input->post('pkgName');
           $pkgPriorityRanking =$this->input->post('pkgPriorityRanking');
           $pkgNoOfPosts= $this->input->post('pkgNoOfPosts');
           $pkgNoOfShowcases=$this->input->post('pkgNoOfShowcases');
           $pkgGradingTag=$this->input->post('pkgGradingTag');
           $pkgNoOfPhotos= $this->input->post('pkgNoOfPhotos');
           $pkgInquiryReply= $this->input->post('pkgInquiryReply');
           $pkgCustomiseAccount= $this->input->post('pkgCustomiseAccount');
           $pkgCustomisedBumperOffer= $this->input->post('pkgCustomisedBumperOffer');
           $pkgProfileSlider= $this->input->post('pkgProfileSlider');
           $pkgCharges= $this->input->post('pkgCharges');
           $pkgDiscountPercentage= $this->input->post('pkgDiscountPercentage');


           $query_data=array(
                
             'package_name'=> "$pkgName" ,
             'priority_ranking'=>"$pkgPriorityRanking" ,
             'product_posting'=> "$pkgNoOfPosts" ,
             'Product_showcases'=>"$pkgNoOfShowcases",
             'grading_tag'=>"$pkgGradingTag",
             'customized_account'=>"$pkgCustomiseAccount",
             'photos_per_product'=>"$pkgNoOfPhotos",
             'customize_bumber_offer'=>"$pkgCustomisedBumperOffer",
             'profile_slider_pictures'=>"$pkgProfileSlider",
             'inquiry_reply'=>"$pkgInquiryReply",
             'charges'=>"$pkgCharges",
             'discount_in_percentage'=>"$pkgDiscountPercentage",
             'status'=>'1'

           );

           $package_data_insert=$this->db->insert('packages',$query_data);
           if($package_data_insert){
               $recent_insert_id=$this->db->insert_id();
             if(!empty($_FILES['pkgImage']['name'])){
                $url = "Uploads/images/packages/";
                $config['upload_path']= $url;
                //$config['max_size'] = '400';
                //$config['max_width']  = '1024';
                //$config['max_height']  = '768';
                $config['allowed_types']= 'gif|jpg|png';
                $config['file_name'] = $_FILES['pkgImage']['name'];
                $this->load->library('upload');
                $this->upload->initialize($config);
                if($this->upload->do_upload('pkgImage')){
                    $uploadData = $this->upload->data();
                    $picture = $url.$uploadData['file_name'];
                    $querypic_data=array(
                     'picture_of_id'=>"$recent_insert_id",
                     'pic_location'=>"$picture",
                     'picture_type'=>'package',
                     'status'=>'1'
                    );
                    $package_picture_insert=$this->db->insert('pictures',$querypic_data);
                }else
                {
                    $picture = $this->upload->display_errors();
                }
              }
            }     
            if($package_data_insert & $package_picture_insert){
                return true;
            } 
        }
    }  


    public function packageRequests(){

      $query=$this->db->query(" 
              select 
                    pr.`id`,
                    pr.`vendor_id`, 
                    pr.`package_requested_id`,
                    pr.`requested_at`,
                    pr.`accepted_at`,
                    vi.`company_name` ,
                    pkgr.`package_name` as 'requested_package',
                    pkgr.`charges`,
                    pkgr.`discount_in_percentage` ,
                    pkgr.charges-(pkgr.charges * pkgr.`discount_in_percentage`)/100 as 'package_net_price',
                    pkgc.`package_name` as 'current_package' 
                    from `package_requests` pr 
                    LEFT JOIN `vendor_information` vi 
                      ON vi.id = pr.vendor_id 
                    LEFT JOIN `packages` pkgr 
                      ON pkgr.id = pr.package_requested_id 
                    LEFT JOIN `packages` as pkgc 
                      ON pkgc.id = vi.package_id
        ");
         return $result=$query->result();
    }

    public function addPackageRequestIntoDb(){
        
        $user_id=$this->input->post('userId');
        $vendor_query=$this->db->query("select id from vendor_information where user_id=$user_id");
        $vendor_result=$vendor_query->result();

        $vendor_id=$vendor_result[0]->id;
        $pkg_id=$this->input->post('pkgId');

        $query=$this->db->query("insert into package_requests(`vendor_id`,`package_requested_id`,`status`) values($vendor_id,$pkg_id,1) ");
        
        return $query;
    }
    public function packages_request_status_update(){
        $action=$this->input->post('action');
        $id =$this->input->post('ele_id');
        
        if($action == 'approve'){
            $updateRequestQuery = $this->db->query("update package_requests set status=2 , accepted_at=now() where id=$id" );    
            //getting vendor id and pkg requested id from Pkg Request
            $queryPkgReq=$this->db->query("select * from package_requests where id=$id");
            $pkgReq=$queryPkgReq->result()[0];
            $vendor_id=$pkgReq->vendor_id;
            $pkg_requested=$pkgReq->package_requested_id;
            $updateVendorQuery=$this->db->query("update vendor_information set package_id=$pkg_requested where id=$vendor_id");
        }
        elseif($action =='block'){
            $query = $this->db->query( "update package_requests set status=3 where id=$id ");
        }

        $results['action']=$action;
        $results['id']= $id;
        $results['query']= $updateRequestQuery & $updateVendorQuery;
        
        echo json_encode($results);
        
    }  
    
    public function pkgInfo($id){
        $query= $this->db->query(" select * from packages where id=$id ");
        return $result=$query->result();
    }      
}   

?>