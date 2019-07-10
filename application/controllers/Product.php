<?php
ob_start();
require('connect-php-sdk/autoload.php');
class Product extends CI_Controller{
	private $checkoutClient;
	private $accessToken;
	private $locationId;
	private $defaultApiConfig;
	private $defaultApiClient;
	private $checkout;
	private $order;

	function __construct(){
		parent::__construct();
		$this->load->model('product_model');
		$this->config->load('square_api');
		$this->accessToken = $this->config->item('accessToken');
		$this->locationId = $this->config->item('locationId');
		// Create and configure a new API client object
		$this->defaultApiConfig = new \SquareConnect\Configuration();
		$this->defaultApiConfig->setAccessToken($this->accessToken);
		$this->defaultApiClient = new \SquareConnect\ApiClient($this->defaultApiConfig);
		$this->checkoutClient = new SquareConnect\Api\CheckoutApi($this->defaultApiClient);
		$this->checkout = new \SquareConnect\Model\CreateCheckoutRequest();
		$this->order = new \SquareConnect\Model\CreateOrderRequest();


	}

	function index(){
		$data['data']=$this->product_model->get_all_product();
		$this->load->view('product_view',$data);
	}

	

	function add_to_cart(){ 
		$data = array(
			'id' => $this->input->post('product_id'), 
			'image'=> $this->input->post('product_image'),
			'name' => $this->input->post('product_name'), 
			'price' => $this->input->post('product_price'), 
			'qty' => $this->input->post('quantity'), 
		);
		
		$this->cart->insert($data);
		echo $this->show_cart(); 
	}

	function show_cart(){ 
		$output = '';
		$no = 0;
		foreach ($this->cart->contents() as $items) {
			//$this->setupSquareCheckout(item);
			$no++;
			$output .='
				<tr>	
					<td><img src="'.$items['image'].'" style="width:60px"></td>
					<td>'.$items['name'].'</td>
					<td>'.number_format($items['price']).'</td>
					<td>'.$items['qty'].'</td>
					<td>'.number_format($items['subtotal']).'</td>
					<td><button type="button" id="'.$items['rowid'].'" class="romove_cart btn btn-danger btn-sm">Cancel</button></td>
				</tr>
			';
		}
		$output .= '
			<tr>
				<th colspan="4">Total</th>
				<th colspan="2">'.'Rp '.number_format($this->cart->total()).'</th>
			</tr>
		';
	
		$checkoutUrl = $this->initSquareCheckout(); 
		
		$output .= '
			<tr>
				<th colspan="4"></th>
				<th colspan="2">
				<a href="'.$checkoutUrl.'" class="btn pull-right purple-bg">
				Proceed Checkout
		</a>
				</th>
			</tr>
		';
		
		
		return $output;
	}

	function cart_total()
	{
		echo $this->cart->total_items();
	}

	function load_cart(){ 
		echo $this->show_cart();
	}



	function delete_cart(){ 
		$data = array(
			'rowid' => $this->input->post('row_id'), 
			'qty' => 0, 
		);
		$this->cart->update($data);
		echo $this->show_cart();
	}

	function initSquareCheckout(){	
		//Puts our line item object in an array called lineItems.
		$lineItems = array();
		foreach ($this->cart->contents() as $items) {
			$item = $this->setupLineItem($items);
			array_push($lineItems, $item);
		}

		
		echo $url = $this->goForCheckout($lineItems);

		return $url;

	}

	function setupLineItem($item){
		if($item !== null){
			//Create a Money object to represent the price of the line item.
			$price = new \SquareConnect\Model\Money;
		
			$price->setAmount((int) $item['price'] * 100);
			$price->setCurrency('USD');

			//Create the line item and set details
			$book = new \SquareConnect\Model\CreateOrderRequestLineItem;
			$book->setName($item['name']);
			$book->setQuantity((string) $item['qty']);
			$book->setBasePriceMoney($price);

			return $book;
		}
	}

	function goForCheckout($lineItems){
		// Create an Order object using line items from above
		$this->order->setIdempotencyKey(uniqid()); //uniqid() generates a random string.

		//sets the lineItems array in the order object
		$this->order->setLineItems($lineItems);


		///Create Checkout request object.
		

		$this->checkout->setIdempotencyKey(uniqid()); //uniqid() generates a random string.
		$this->checkout->setOrder($this->order); //this is the order we created in the previous step.
		$this->checkout->setRedirectUrl('http://localhost/grocery-shop/product/successMsg'); //Replace with the URL where you want to redirect your customers after transaction.

		try {
		    $result = $this->checkoutClient->createCheckout(
		    	$this->locationId,
		      $this->checkout
		    );
		    //Save the checkout ID for verifying transactions
		    $checkoutId = $result->getCheckout()->getId();
		    //Get the checkout URL that opens the checkout page.
		    return $result->getCheckout()->getCheckoutPageUrl();		    
		    //pro('Complete your transaction: ' . $checkoutUrl);
		} catch (Exception $e) {
		    echo 'Exception when calling CheckoutApi->createCheckout: ', $e->getMessage(), PHP_EOL;
		}
	}

	function successMsg(){
		echo "Payment successfull";
	}
}