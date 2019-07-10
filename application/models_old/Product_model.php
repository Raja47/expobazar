<?php
  
class Product_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    
  public function insertCategory($picture)
  {   
  	$name=$this->input->post("title");
  	$catdata=array(
  		'name'=>$name,
  		'status'=>1
  );
  	$query_insertCat=$this->db->insert('product_category',$catdata);
  	if($query_insertCat==true){
  		$recent_id=$this->db->insert_id();
  		$catImgData=array(
    		'picture_of_id'=>$recent_id,
    		'picture_type' =>'category',
    		'pic_location' => $picture,
    		'status'	   => 1
		);
  		$result=$this->db->insert('pictures',$catImgData);
  	}
  	if($result==true){
  		$this->session->set_flashdata('success','Category Added Successfully');
	}else{
		$this->session->set_flashdata('error','Error interrupted Request , please Try Again!');
	}
  	redirect("admin/addCategory",'refresh');
 	}




	public function insertSubCategory($picture)
  {   
    	$category=$this->input->post("subCats_Category");
    	$name=$this->input->post("subCatName");
      $catdata=array(
    		'name'=>$name,
    		'product_category_id'=>$category,
    		'status'=>1
  		);
      $query_insertSubCat=$this->db->insert('product_subcategory',$catdata);
    	if($query_insertSubCat==true){
    		$recent_id=$this->db->insert_id();
    		$subcatImgData=array(
	    		'picture_of_id'=>$recent_id,
	    		'picture_type' =>'subcategory',
	    		'pic_location' => $picture,
	    		'status'	   => 1
			);
    		$result=$this->db->insert('pictures',$subcatImgData);
    	}
    	if($result==true){
    		$this->session->set_flashdata('success','SubCategory Added Successfully');
		}else{
			$this->session->set_flashdata('error','Error interrupted Request , please Try Again!');
		}
    	redirect("admin/addCategory",'refresh');
  }

  public function productsHavingCategory($urlCategory=null){
      if($urlCategory!=null){
        $query=$this->db->query("
          select products.*  from products  
          left join  `pictures` on pictures.picture_of_id=products.id 
          LEFT JOIN `product_subcategory` ON product_subcategory.id= products.subcategory_id
          where pictures.picture_type='Product' and `product_subcategory`.product_category_id=$urlCategory And pictures.order_no=1 "
        );
      }else{
        $query=$this->db->query("
          select products.*  from products  
          left join  `pictures` on pictures.picture_of_id=products.id 
          LEFT JOIN `product_subcategory` ON product_subcategory.id= products.subcategory_id
          where pictures.picture_type='Product' And pictures.order_no=1 "
        );
      }
      return $query->result();
  }
 	  
  public function allCategoriesWithProdNum(){
     
        $query=$this->db->query(
        "select count(*) as 'product_num' ,`product_category`.name as 'cat_name', `product_category`.id as 'cat_id' from products LEFT JOIN `product_subcategory` ON product_subcategory.id= products.subcategory_id LEFT JOIN `product_category` ON product_category.id= product_subcategory.product_category_id where products.status <> 0 AND `product_category`.status AND `product_subcategory`.status group by product_category.name "
        );    
        return $query->result();
    }
    public function allPopularCategoriesWithProdNum(){
     
        $query=$this->db->query(
        "select count(*) as 'product_num' ,`product_category`.name as 'cat_name', `product_category`.id as 'cat_id' from products LEFT JOIN `product_subcategory` ON product_subcategory.id= products.subcategory_id LEFT JOIN `product_category` ON product_category.id= product_subcategory.product_category_id where products.status <> 0 AND `product_category`.status AND `product_subcategory`.status group by product_category.name order by 'product_num' desc limit 0,6"
        );    
        return $query->result();
    }


    public function allSubCategoriesWithProdNum($category){
        $query=$this->db->query(
        "select count(*) as 'product_num', `product_subcategory`.name , `product_subcategory`.id as 'subcat_id' from products 
        LEFT JOIN `product_subcategory` 
          ON product_subcategory.id=products.subcategory_id 
        LEFT JOIN `product_category` 
          ON product_category.id= product_subcategory.product_category_id 
          where products.status <> 0 
              AND product_category.status <> 0 
              AND product_subcategory.status <> 0 
              AND product_subcategory.product_category_id=$category
          group by product_subcategory.name"
        );
        return $query->result();    
    }
    public function allCitiesWithProductNum(){
     
        $query=$this->db->query(
        "select count(*) as 'product_num' , cities.city_name, cities.id as 'city_id' from products LEFT JOIN `vendor_information` ON vendor_information.id= products.vender_id LEFT JOIN `cities` ON cities.id= vendor_information.city_id where products.status <> 0 AND cities.status <> 0 group by cities.city_name"
        );    
        return $query->result();  
    }


    public function allCategoriesWithSubCategories(){
        $query=$this->db->query(
        "select   
          `product_subcategory`.name as 'subcat_name',
          `product_subcategory`.id as 'subcat_id' ,
          `product_category`.name as 'cat_name',
          `product_category`.id as 'cat_id' 
        from product_subcategory  
          LEFT JOIN `product_category` ON
            product_category.id= product_subcategory.product_category_id
            where  product_category.status <> 0 AND product_subcategory.status <> 0 order by `product_category`.name "
        );
        return $query->result();    
    }
    public function allCategories($records){
      if($records=='active_records'){
        $query=$this->db->query(
          'select 
              product_category.name,
              product_category.id,
              product_category.status,
              pictures.pic_location from product_category 
              LEFT JOIN `pictures` 
              ON product_category.id=pictures.picture_of_id where product_category.status=1 AND pictures.picture_type="category" '
        );
      }
    
 		elseif($records=='all_records'){
 			$query=$this->db->query(
   			' select 
   					product_category.name,
   					product_category.id,
   					product_category.status,
   					pictures.pic_location from product_category 
   					LEFT JOIN `pictures` 
   				  ON product_category.id=pictures.picture_of_id where pictures.picture_type="category" '
   		);

 		}elseif($records=='bloced_records'){
 			$query=$this->db->query(
   			'select 
   					product_category.name,
   					product_category.id,
   					product_category.status,
   					pictures.pic_location from product_category 
   					LEFT JOIN `pictures` 
   					ON product_category.id=pictures.picture_of_id where product_category.status=0 AND pictures.picture_type="category" '
   		);
 		}	
 		$result=$query->result();
 		return $result;
 	}

  public function categoryById($cat){
    $query=$this->db->query("select *  from product_category where id=$cat");
    return $query->result();
  }

 	
  public function allSubCategories($records){
 		if($records=='active_records'){
   		$query=$this->db->query(
   			'select 
   					product_subcategory.name,
   					product_subcategory.id,
   					product_subcategory.status,
   					pictures.pic_location,
   					product_category.name as "catName" from product_subcategory 
   					LEFT JOIN `pictures` ON product_subcategory.id=pictures.picture_of_id 
   					LEFT JOIN `product_category` ON product_subcategory.product_category_id=product_category.id 
   					where product_subcategory.status=1 AND pictures.picture_type="subcategory" '
   		);
 		}
 		elseif($records=='all_records')
 		{
 			$query=$this->db->query(
 			'select 
 					product_subcategory.name,
 					product_subcategory.id,
 					product_subcategory.status,
 					pictures.pic_location,
 					product_category.name as "catName",product_category.id as "catId" from product_subcategory 
 					LEFT JOIN `pictures` ON product_subcategory.id=pictures.picture_of_id 
 					LEFT JOIN `product_category` ON product_subcategory.product_category_id=product_category.id 
 					where  pictures.picture_type="subcategory" '
 		);
 		}	
 		$result=$query->result();
 		return $result;
 	}
 	public function category_status_update(){
      
      $action=$this->input->post('action');
      $id =$this->input->post('id');
      if($action == 'approve'){
          $query = $this->db->query("update product_category set status = 1 where id=$id" );    
      }
      elseif($action =='block'){
          $query = $this->db->query( "update product_category set status = 0 where id=$id" );
      }
      $results['query']=$query;
      $results['id']=$id;
      $results['action']=$action;
      echo json_encode($results);
  
  }

  public function subcategory_status_update(){
      
      $action=$this->input->post('action');
      $id =$this->input->post('id');
      
      if($action == 'approve'){
          $query = $this->db->query("update product_subcategory set status = 1 where id=$id" );    
      }
      elseif($action =='block'){
          $query = $this->db->query( "update product_subcategory set status = 0 where id=$id" );
      }
      
      $results['query']=$query;
      $results['id']=$id;
      $results['action']=$action;
      echo json_encode($results);
  }

  public function category_delete(){
      
      $action=$this->input->post('action');
      $id =$this->input->post('id');      
      if($action == 'category'){
        $query = $this->db->query("delete from product_category where id=$id" );
        if($query == true){
          $cat_pic = $this->db->query("delete from pictures where picture_of_id =$id AND picture_type='".$action."'" );
        }
      }
      elseif($action == 'subcat'){

        $query = $this->db->query("delete from product_subcategory where id=$id" );
        if($query == true){
          $subcat_pic = $this->db->query("delete from pictures where picture_of_id =$id AND picture_type='subcategory'" );
        }
      }
      
      $results['query']=$query;
      echo json_encode($results);
  }
  public function single_category(){
      
      $action=$this->input->post('action');
      $id =$this->input->post('id');
      //echo json_encode($action);

      
      if($action == 'category'){
        $query = $this->db->query("Select * from product_category inner JOIN pictures on product_category.id = pictures.picture_of_id where product_category.id=$id");    
      }
      else if($action == 'subcategory'){
        $query = $this->db->query("Select * from product_subcategory inner JOIN pictures on product_subcategory.id = pictures.picture_of_id where product_subcategory.id=$id AND picture_type ='".$action."'"); 
        
      }
      $results=[];
      $results['query']=$query->result()[0];
      $query_for_select = $this->db->query("select * from product_category");
      $results['query_for_select']=$query_for_select->result();
      $results['action']=$action;
      echo json_encode($results);
      
  }

  
  public function update_category(){
      
      $action=$this->input->post('action');
      $id =$this->input->post('id');
      $name =$this->input->post('name');
      $cat_new_select_id =$this->input->post('catNewSelect');



      
      if($action == 'update'){
          $update_cat = $this->db->query("update product_category set name = '".$name."' where id=$id");    
      }
      else if($action == 'subcategory'){
        $update_subcat_name = $this->db->query("update product_subcategory set name = '".$name."' where id=$id");
        $update_subcat_cat = $this->db->query("update product_subcategory set product_category_id = '".$cat_new_select_id."' where id=$id");
      }
      $results['id']=$id;
      $results['action']=$action;
      $results['update_cat']= $update_cat??"";
      $results['update_subcat_name']=$update_subcat_name??"";
      $results['update_subcat_cat']=$update_subcat_cat??"";
      $results['cat_name']=$name;
      //$results['cat_name_for_subcat']=$cat_new_select_id;
      echo json_encode($results);
  }
  //** This function is used to update category as well sub category **/
  public function updateCategoryintoDb($picture){
      
      $cat_new_title=$this->input->post('cat_new_title');
      $id =$this->input->post('updateId');
      $action =$this->input->post('action');
      $cat_type =$this->input->post('cat_type');

      //** if true means category **//
      if($action == 'update' && $cat_type == false)
      {
          $query1 = $this->db->query("update pictures set pic_location = '".$picture."' where picture_of_id = $id AND picture_type='category'" );
          if ($query1 == true)
          {
            $query2 = $this->db->query("update product_category set name = '".$cat_new_title."' where id=$id");
          }  
          return $picture;      
      }
      //**else if true means subcategory **//
      else if($cat_type == 'subcategory')
      {
          $main_cat_data =$this->input->post('cat_new_select');
          $subcat_cat_id = explode('_', $main_cat_data)[0];
          $query3 = $this->db->query("update pictures set pic_location = '".$picture."' where picture_of_id = $id AND picture_type='".$cat_type."'");
          if($query3 == true)
          {
              $update_subcat_name = $this->db->query("update product_subcategory set name = '".$cat_new_title."' where id=$id");
              $update_subcat_cat = $this->db->query("update product_subcategory set product_category_id = '".$subcat_cat_id."' where id=$id");
          }
          return $picture;
      }
      $result=[];
      $result['picture'] = $picture;
      $result['action'] = $action;
      $result['cat_type'] = $cat_type;
      $result['query3'] = $query3??"";
      echo json_encode($result);
  }

  public function product_status_update()
  {
      $action=$this->input->post('action');
      $id =$this->input->post('id');
      
      if($action == 'approve')
      {
          $query = $this->db->query("update products set status = 1 where id=$id" );    
      }
      elseif($action =='block')
      {
          $query = $this->db->query( "update products set status = 0 where id=$id" );
      }
      $results['id']=$id;
      $results['action']=$action;
      $results['query']=$query;
      echo json_encode($results);
  }
  
  public function allProducts($catid=null,$subcatid=null){
    if(($subcatid==null  || $subcatid==0)&&($catid != null || $catid != 0))
    {
      $query=$this->db->query(" 
        select products.* , product_category.name as 'cat_name' , pictures.pic_location from products
              
        LEFT JOIN `product_subcategory` on `product_subcategory`.id=products.subcategory_id 
        LEFT JOIN `product_category` on `product_category`.id=product_subcategory.product_category_id
        LEFT JOIN `pictures` on `pictures`.picture_of_id=products.id 

        where product_category.id=$catid AND 
              pictures.picture_type='Product' AND
              pictures.order_no=1 AND
              products.status <> 0 AND
              product_category.status <> 0 AND
              product_subcategory.status <> 0    
         " );
        return $query->result();
    }
    elseif( $subcatid!= null && $subcatid!=0){
       $query=$this->db->query(" 
        select products.* , product_category.name as 'cat_name' , pictures.pic_location from products
              
        LEFT JOIN `product_subcategory` on `product_subcategory`.id=products.subcategory_id 
        LEFT JOIN `product_category` on `product_category`.id=product_subcategory.product_category_id
        LEFT JOIN `pictures` on `pictures`.picture_of_id=products.id 

        where product_subcategory.id=$subcatid AND 
              pictures.picture_type='Product' AND
              pictures.order_no=1 AND
              products.status <> 0 AND
              product_category.status <> 0 AND
              product_subcategory.status <> 0    
         " );
        return $query->result();
     }
     else{
    
       $query=$this->db->query(" 
        select products.* , product_category.name as 'cat_name' , pictures.pic_location from products
              
        LEFT JOIN `product_subcategory` on `product_subcategory`.id=products.subcategory_id 
        LEFT JOIN `product_category` on `product_category`.id=product_subcategory.product_category_id
        LEFT JOIN `pictures` on `pictures`.picture_of_id=products.id 

        where  
              pictures.picture_type='Product' AND
              pictures.order_no=1 AND
              products.status <> 0 AND
              product_category.status <> 0 AND
              product_subcategory.status <> 0    
         " );

        return $query->result();
     }
  }
  public function pendingProducts(){
    $query=$this->db->query(" 
        select products.* , product_category.name as 'cat_name' , pictures.pic_location , `vendor_information`.id as vendor_id , `vendor_information`.company_name as vendor_name,cities.city_name from products
        LEFT JOIN `vendor_information` on `vendor_information`.id=products.vender_id       
        LEFT JOIN `product_subcategory` on `product_subcategory`.id=products.subcategory_id 
        LEFT JOIN `product_category` on `product_category`.id=product_subcategory.product_category_id
        LEFT JOIN `pictures` on `pictures`.picture_of_id=products.id         
        LEFT JOIN `cities` on `cities`.id = vendor_information.city_id 

        where  
              pictures.picture_type='Product' AND
              pictures.order_no=1 AND
              products.status=0 ");
    return $query->result();

  }
  public function approvedProducts(){
    $query=$this->db->query(" 
        select products.* , product_category.name as 'cat_name' , pictures.pic_location , `vendor_information`.id as vendor_id , `vendor_information`.company_name as vendor_name , cities.city_name from products
        LEFT JOIN `vendor_information` on `vendor_information`.id=products.vender_id       
        LEFT JOIN `product_subcategory` on `product_subcategory`.id=products.subcategory_id 
        LEFT JOIN `product_category` on `product_category`.id=product_subcategory.product_category_id
        LEFT JOIN `pictures` on `pictures`.picture_of_id=products.id 

        LEFT JOIN `cities` on `cities`.id = vendor_information.city_id 

        where 
              pictures.picture_type='Product' AND
              pictures.order_no=1 AND
              products.status=1     
         ");
    return $query->result();
  }   

  public function carouselProducts(){
    $query=$this->db->query("
    select products.* , product_category.name as 'cat_name' , pictures.pic_location from products
        LEFT JOIN `product_subcategory` on `product_subcategory`.id=products.subcategory_id 
        LEFT JOIN `product_category` on `product_category`.id=product_subcategory.product_category_id
        LEFT JOIN `pictures` on `pictures`.picture_of_id=products.id 

        where  
              pictures.picture_type='Product' AND
              pictures.order_no=1 AND
              products.status <> 0 AND
              product_category.status <> 0 AND
              product_subcategory.status <> 0  order by `products`.created_at  limit 0,10    
         ");
      return $query->result();
  }

  public function vendorProducts($id){
        $query = $this->db->query("
            select products.*,pictures.pic_location,cities.city_name  from products 
            LEFT JOIN `vendor_information` on vendor_information.id=products.vender_id
            LEFT JOIN `users` on  users.id= vendor_information.user_id 
            LEFT JOIN `pictures` on  pictures.picture_of_id= products.id 
            LEFT JOIN `cities` on  cities.id= vendor_information.city_id 
            Where users.id=$id and pictures.picture_type='Product' and pictures.order_no=1 and products.status<>0            
        ");
        return $query->result();
  }
  public function countProductsPostedByVendor($id){
      $query = $this->db->query("
            select count(*) as 'product_num' from products 
            LEFT JOIN `vendor_information` on vendor_information.id=products.vender_id
            LEFT JOIN `users` on  users.id= vendor_information.user_id 
            Where users.id=$id             
        ");
        return $query->result();
  }

  public function vendorPendingProducts($id){
        $query = $this->db->query("
            select products.*,pictures.pic_location,cities.city_name  from products 
            LEFT JOIN `vendor_information` on vendor_information.id=products.vender_id
            LEFT JOIN `users` on  users.id= vendor_information.user_id 
            LEFT JOIN `pictures` on  pictures.picture_of_id= products.id 
            LEFT JOIN `cities` on  cities.id= vendor_information.city_id 
            Where users.id=$id and pictures.picture_type='Product' and pictures.order_no=1 and products.status=0            
        ");
        return $query->result();
  }
  public function wishlistProducts($userid){
        $query = $this->db->query("
            select user_wishlist.*,products.title,products.id as 'prd_id', products.sale_price ,pictures.pic_location,cities.city_name ,product_subcategory.name as 'subcat_name' from user_wishlist 
            LEFT JOIN `products` on products.id=user_wishlist.prd_id
            LEFT JOIN `vendor_information` on vendor_information.id=products.vender_id
            LEFT JOIN `product_subcategory` on product_subcategory.id = products.subcategory_id 
            LEFT JOIN `users` on  users.id= vendor_information.user_id 
            LEFT JOIN `pictures` on  pictures.picture_of_id= products.id 
            LEFT JOIN `cities` on  cities.id= vendor_information.city_id 
            Where user_wishlist.user_id=$userid and pictures.order_no=1 and products.status <> 0            
        ");
        return $query->result();
  }
  public function deletefrmWishList($prdid){
      $prdId=  (int)$prdid;
      $query=$this->db->query("delete from user_wishlist 
        where `id`=$prdId  " );
      return $query;
  }


  public function addProductsIntoDb(){
    
    if($this->input->post('prdSubmit')){

        $subcat=$this->input->post('prdSubCat');
        $title=$this->input->post('prdTitle');
        $brand=$this->input->post('prdBrand');
        $description=$this->input->post('prdDescription');
        $price=$this->input->post('prdPrice');
        $discount=$this->input->post('prdDiscount');
        $rawFeatures=$this->input->post('prdFeatures');
        $vendor_id=$this->input->post('added_by') ; 
        $product=array(
            'vender_id'=>$vendor_id,
            'subcategory_id'=>$subcat,
            'title'=>$title,
            'brand_name'=>$brand,
            'sale_price'=>$price,
            'discount_percentage'=>$discount,
            'description'=> $description,
            'features'=>$rawFeatures,
            'status'=>1
        );

        $result=$this->db->insert('products',$product);
        $prdId=$this->db->insert_id();
        $no = $this->input->post('picsNo');
        $count=0;
        $pictures=array();
        for($i=1;$i<=$no;$i++){
            
            $picture=$this->uploadImage("prdImage".$i,"Uploads/images/products");
            
            if($picture ){
               $pic=array(                
                'title'=>'ExpoBazar Product',
                'picture_of_id'=>$prdId,
                'picture_type'=>'Product',
                'order_no'=>$i,
                'pic_location'=>$picture,
                'status'=>'1' );
                $picresult=$this->db->insert('pictures',$pic);        
                if(!$picresult){
                  return  $this->db->error();
                }
            }
        }        

        if($result==true ){
          $this->session->set_flashdata('success',"Product added successfull ");
          redirect('admin/addProduct');
        }else{
          $this->sesson->set_flashdata('error','Sorry proudct can be added');
          redirect('admin/addProduct');
        }
      
    }
// -------------------My Product Fuctions ------------------  // 
  }
  public function allProductsAdmin($records){
     
    
      if($records=='all_records'){
        //$data = $this->input->post();
        //print_r($data);

      $query=$this->db->query(
        ' select 
            products.id,
            products.subcategory_id,
            products.title,
            products.brand_name,
            products.sale_price,
            products.discount_percentage,
            products.description,
            products.status,
            pictures.pic_location from products 
            LEFT JOIN `pictures` 
            ON products.id=pictures.picture_of_id where pictures.picture_type="Product" group by products.id  '
      );

      return $query->result();

      }
  }

  public function product_delete(){
      
      $action=$this->input->post('action');
      $id =$this->input->post('id');      
      if($action == 'product'){
        $query = $this->db->query("delete from products where id=$id" );
        if($query == true){
          $cat_pic = $this->db->query("delete from pictures where picture_of_id =$id AND picture_type= 'Product'" );
        }
      }
      $result['result']=$query;
      echo json_encode($result);
  }

  public function single_product(){
      
      $action=$this->input->post('action');
      $id =$this->input->post('id');
      $subcat_id = $this->input->post('subcat_id');
      //echo json_encode($id); 
      if($action == 'product'){
        $query = $this->db->query("
          Select products.*, products.title as 'product_title' ,pictures.id as 'picture_id' ,pictures.id as pic_id, pictures.pic_location from products 
          inner JOIN pictures on products.id = pictures.picture_of_id 
          where products.id=$id AND pictures.picture_type='Product'
        ");    
        $results=[];
        $results['query']=$query->result()[0];
        $results['pictures']=$query->result();
        $query_for_select = $this->db->query(
        "select   
            `product_subcategory`.name as 'subcat_name',
            `product_subcategory`.id as 'subcat_id' ,
            `product_category`.name as 'cat_name',
            `product_category`.id as 'cat_id' 
          from product_subcategory  
          LEFT JOIN `product_category` ON
            product_category.id= product_subcategory.product_category_id
          where  product_category.status <> 0 AND product_subcategory.status <> 0 order by `product_category`.name"
          );
          $results['query_for_select']=$query_for_select->result();
          $results['action']=$action;
          echo json_encode($results);   

      }
  }

  public function update_product(){
      
      $action=$this->input->post('action');
      $id =$this->input->post('updateId');
      $product_new_select =$this->input->post('product_new_select');
      $product_new_title =$this->input->post('product_new_title');
      $product_new_description =$this->input->post('product_new_description');
      $product_new_brand =$this->input->post('product_new_brand');
      $product_new_price =$this->input->post('product_new_price');
      $product_new_discount =$this->input->post('product_new_discount');
      $product_new_features =$this->input->post('product_new_features');
      $update_product=false;
      if($action == 'product'){
          $update_product = $this->db->query("
            update products 
            set subcategory_id = $product_new_select 
             , title = '".$product_new_title."' 
             , description = '".$product_new_description."' 
             , brand_name = '".$product_new_brand."' 
             , sale_price = $product_new_price 
             , discount_percentage = $product_new_discount 
             , features = '".$product_new_features."' 
             where id=$id");      
      }
      for($i=0;$i<=5;$i++){
          $image=$this->uploadImage('product_new_image_'.$i,'Uploads/images/products/'); 
          if($image){
              if($this->input->post('productImage'.$i)){
                $picture=$this->db->query("update pictures set pic_location='".$image."' where id=".$this->input->post('productImage'.$i));    
              }else{
                $picture_array=array(
                  'title'=>'Grocery Shop Product',
                  'picture_of_id'=>$id,
                  'picture_type'=>'Product',
                  'pic_location'=>$image,
                  'order_no'=>$i,
                  'status'=>1
                );               
                $picture=$this->db->insert('pictures',$picture_array);
              }    
          }
      }
      $results['id']=$id;
      $results['action']=$action;
      $results['update_product']=$update_product;
      echo json_encode($results);
 }
  
  public function addtowishlist($userId=3,$prdId=40){
     $resultcount=$this->db->query("select * from user_wishlist where `user_id`=$userId and `prd_id`=$prdId ");
      
      if($resultcount->num_rows()==0){
        $wlarray=array(
          'user_id'=>$userId,
          'prd_id'=>$prdId,
          'status'=>1
        );
        $result=$this->db->insert('user_wishlist',$wlarray);
        $results['result']=$result;
        echo json_encode($results);
      }
      elseif($resultcount->num_rows()>0){
        $results['result']='sorry already added into wishlist';
        echo json_encode($results);
      }
      else{
        $results['result']=false;
        echo json_encode($results);
      } 
  }


  public function productinfo($id){

    $query=$this->db->query(
      "select products.*,vendor_information.company_name,vendor_information.created_at,vendor_information.address,vendor_information.profile_picture,cities.city_name, concat(users.first_name,' ',users.last_name) as 'user_name' ,users.contact_num,users.email,product_category.name as 'cat_name',product_subcategory.name as 'subcat_name' from products 

      LEFT JOIN `vendor_information` ON vendor_information.id=products.vender_id LEFT JOIN `users` ON `users`.id=vendor_information.user_id LEFT JOIN `cities` ON `cities`.id=vendor_information.city_id LEFT JOIN `product_subcategory` ON `product_subcategory`.id=products.subcategory_id LEFT JOIN `product_category` ON `product_category`.id=product_subcategory.product_category_id where products.id=$id  "
    );
    $prdinfo=$query->result();
    
    $pquery=$this->db->query(" select pic_location, order_no from pictures where picture_of_id=$id and picture_type='Product' ");
    $prdpics=$pquery->result();
    
    return array($prdinfo,$prdpics);
  }

  public function productemailinfo($id){

    $query=$this->db->query(
      "select products.*,vendor_information.company_name,vendor_information.created_at,vendor_information.address,vendor_information.profile_picture,cities.city_name, concat(users.first_name,' ',users.last_name) as 'user_name' ,users.contact_num,users.email,product_category.name as 'cat_name',product_subcategory.name as 'subcat_name' from products 

      LEFT JOIN `vendor_information` ON vendor_information.id=products.vender_id LEFT JOIN `users` ON `users`.id=vendor_information.user_id LEFT JOIN `cities` ON `cities`.id=vendor_information.city_id LEFT JOIN `product_subcategory` ON `product_subcategory`.id=products.subcategory_id LEFT JOIN `product_category` ON `product_category`.id=product_subcategory.product_category_id where products.id=$id  "
    );
    $prdinfo=$query->result();
    
    
    return $prdinfo;
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
              $picture = $url."/".$uploadData['file_name'];
          }
          else{
              $picture =null;
          }
      }
      else
      {
          $picture= null;
      }
      return $picture;
  }
}	
?> 