<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Order_model extends CI_Model
  {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function orderById($orderid){
    	$query = $this->db->query(
        "select 
        	order_products.*,
	        products.title,
	        products.sale_price,
	        products.discount_percentage,
	        pictures.pic_location 
	    from order_products
        INNER JOIN `orders` ON orders.id = order_products.order_id 
        INNER JOIN `products` ON products.id = order_products.product_id 
        LEFT JOIN `pictures` ON pictures.picture_of_id = order_products.product_id and pictures.picture_type='Product'
                 where order_products.order_id=$orderid
        ");
        return $query->result();	
    }


    public function ordersByUserId($userid){
    
       $query = $this->db->query(
        "select count(*) as 'product_num',
                 order_products.order_id ,
                 orders.* 
                 from order_products 
                 INNER JOIN `orders` ON orders.id = order_products.order_id 
                 where orders.user_id=4 
                 group by order_products.order_id
        ");
        return $query->result();
    }

    public function allPendingOrders(){
    	$query = $this->db->query(
        "select count(*) as 'product_num',
                 order_products.order_id ,
                 orders.* ,users.first_name,users.last_name
                 from order_products 
                 INNER JOIN `orders` ON orders.id = order_products.order_id 
              	 INNER JOIN `users`  On users.id=orders.user_id
                 where orders.status=0 
                 group by order_products.order_id
                

        ");
        return $query->result();	
    }
    public function allDeliveredOrders(){
    	$query = $this->db->query(
        "select count(*) as 'product_num',
                 order_products.order_id ,
                 orders.* ,users.first_name,users.last_name
                 from order_products 
                 INNER JOIN `orders` ON orders.id = order_products.order_id 
              	 INNER JOIN `users`  On users.id=orders.user_id
                  where orders.status=1
                 group by order_products.order_id
                
        ");
        return $query->result();	
    }
    public function allCancelledOrders(){
    	$query = $this->db->query(
        "select count(*) as 'product_num',
                 order_products.order_id ,
                 orders.* ,users.first_name,users.last_name
                 from order_products 
                 INNER JOIN `orders` ON orders.id = order_products.order_id 
              	 INNER JOIN `users`  On users.id=orders.user_id
                  where orders.status=2
                 group by order_products.order_id
                

        ");
        return $query->result();	
    }
    public function allRefundOrders(){
    	$query = $this->db->query(
        "select count(*) as 'product_num',
                 order_products.order_id ,
                 orders.* ,users.first_name,users.last_name
                 from order_products 
                 INNER JOIN `orders` ON orders.id = order_products.order_id 
              	 INNER JOIN `users`  On users.id=orders.user_id
                 where orders.status=3
                 group by order_products.order_id
                
        ");
        return $query->result();	
    }
	public function order_status_update()
	{
		  $status=$this->input->post('order_new_select');
		  $id =$this->input->post('updateId');
	
			 
		  $query = $this->db->query( "update orders set status=$status where id=$id" );
		  
		  $results['id']=$id;
		  $results['action']=$status;
		  $results['query']=$query;
		  echo json_encode($results);
	}

  }
    


?>    