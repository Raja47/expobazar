

<?php 
 class Seo_model extends CI_Model
  {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function userSeoPages(){
       $query = $this->db->query('select id , page_name , controller_and_method from seo order by page_name desc');
       return $query->result();
    }

    public function pageSeo($pageId){
       $query = $this->db->query("select * from seo where id=$pageId");
       return $query->result()[0];
    }
    public function searchPageSeo($controller_and_method){
        $query = $this->db->query("select * from seo where controller_and_method = ".$this->db->escape($controller_and_method ));
        return $query->result();
    }
    public function seoSelectedPageChange(){
      $pageId=$this->input->post('pageId');
      $query = $this->db->query("select * from seo where id=$pageId");
       $result['pageSeo']=$query->result()[0];
       echo json_encode($result);
    }
    public function updatePageSeo(){

      $id=$this->input->post('seoPages');
      $currentSeo=$this->pageSeo($id);
      $title=$this->input->post('title');
      if($title==null){
        $title=$currentSeo->title;
      }
      $description=$this->input->post('description');
      if($decription==null){
        $description=$currentSeo->description;
      }
      $authorname=$this->input->post('authorname');
      if($authorname==null){
        $uthorname=$currentSeo->author_name;
      }
      
      $keyword=$this->input->post('keyword');
      $copyright=$this->input->post('copyright');
      $linktype=$this->input->post('linktype');
      $language=$this->input->post('language');      
      
      $og_title=$this->input->post('og_title');
      $og_description=$this->input->post('og_description');
      $og_siteurl=$this->input->post('og_siteurl');
      $og_sitename=$this->input->post('og_sitename');
      
      if(!empty($_FILES['og_imageurl']['name'])){     
        $og_imageurl=$this->uploadImage('og_imageurl','Uploads/images/seo/');
      }
      else{
        $og_imageurl=$currentSeo->og_imageurl;
      }  

      $twitter_title=$this->input->post('twitter_title');
      $twitter_description=$this->input->post('twitter_description');
      $twitter_summary=$this->input->post('twitter_summary');
      $twitter_siteurl=$this->input->post('twitter_siteurl');
      
      if(!empty($_FILES['twitter_imageurl']['name'])){     
        $twitter_imageurl=$this->uploadImage('twitter_imageurl','Uploads/images/seo/');
      }else{
        $twitter_imageurl=$currentSeo->twitter_imageurl;
      }  
     
      $data = array(
        'title'=>$title,
        'description'=>$description, 
        'keywords'=>$keyword,
        'author_name'=>$authorname,
        'copyright'=>$copyright,
        'linktype'=>$linktype,
        'lang'=>$language,
        
        'og_title'=>$og_title,
        'og_decription'=>$og_description,
        'og_siteurl'=>$og_siteurl,
        'og_imgaeurl'=>$og_imageurl,
        'og_sitename'=>$og_sitename,
        
        'twitter_title'=>$twitter_title,
        'twitter_description'=>$twitter_description,
        'twitter_summary'=>$twitter_summary,
        'twitter_siteurl'=>$twitter_siteurl,
        'twitter_imageurl'=>$twitter_imageurl
      );
        
        $result=$this->db->update('seo', $data,array('id'=>$id) );
        return $result; 
    }

    public function fetch_product_SEO($product_id){

       $query = $this->db->query("select * from seo_products where product_id=$product_id");
       return $query->result()[0];
    }
    

    public function updateProductSeo($id){
      $currentSeo=$this->fetch_product_SEO($id);
      //print_r($currentSeo);
      //die;
      $title=$this->input->post('title');
      if($title==null){
        $title=$currentSeo->title;
      }
      $description=$this->input->post('description');
      if($description==null){
        $description=$currentSeo->description;
      }
      $authorname=$this->input->post('authorname');
      if($authorname==null){
        $uthorname=$currentSeo->author_name;
      }
      
      $keyword=$this->input->post('keyword');
      $copyright=$this->input->post('copyright');
      $linktype=$this->input->post('linktype');
      $language=$this->input->post('language');      
      
      $og_title=$this->input->post('og_title');
      $og_description=$this->input->post('og_description');
      $og_siteurl=$this->input->post('og_siteurl');
      $og_sitename=$this->input->post('og_sitename');
      
      if(!empty($_FILES['og_imageurl']['name'])){     
        $og_imageurl=$this->uploadImage('og_imageurl','Uploads/images/seo/');
      }
      else{
        $og_imageurl=$currentSeo->og_imgaeurl;
      }  

      $twitter_title=$this->input->post('twitter_title');
      $twitter_description=$this->input->post('twitter_description');
      $twitter_summary=$this->input->post('twitter_summary');
      $twitter_siteurl=$this->input->post('twitter_siteurl');
      
      if(!empty($_FILES['twitter_imageurl']['name'])){     
        $twitter_imageurl=$this->uploadImage('twitter_imageurl','Uploads/images/seo/');
      }else{
        $twitter_imageurl=$currentSeo->twitter_imageurl;
      }  
     
      $data = array(
        'title'=>$title,
        'description'=>$description, 
        'keywords'=>$keyword,
        'author_name'=>$authorname,
        'copyright'=>$copyright,
        'linktype'=>$linktype,
        'lang'=>$language,
        
        'og_title'=>$og_title,
        'og_decription'=>$og_description,
        'og_siteurl'=>$og_siteurl,
        'og_imgaeurl'=>$og_imageurl,
        'og_sitename'=>$og_sitename,
        
        'twitter_title'=>$twitter_title,
        'twitter_description'=>$twitter_description,
        'twitter_summary'=>$twitter_summary,
        'twitter_siteurl'=>$twitter_siteurl,
        'twitter_imageurl'=>$twitter_imageurl
      );
        
        $result=$this->db->update('seo_products', $data,array('product_id'=>$id) );
        return $result;
    }

    public function uploadImage($fileName,$fileUrl){
      if(!empty($_FILES["$fileName"]['name'])){
          $url = "$fileUrl";
          $config['upload_path']= $url;
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

  }  
?>