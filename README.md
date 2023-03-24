API library for FHB Group fulfillment API (Kika)
------------------------------------------------


Full API docs available at: https://kikaapi3.docs.apiary.io/#

Production API URL: `https://api.fhb.sk/v3`

Development API URL: `https://api-dev.fhb.sk/v3`

*Library for API v3*

Usage:
------
```php
<?php

const API_ID  = '5275fe3ca57307bf8cecfb7b08a447c0';
const SECRET = 'ErYFgUCXWJeINyc89066ed90kcwr28ceta8s1t4a';
const ENDPOINT = 'https://api-dev.fhb.sk/v3';

$api = new belenka\FHB\Kika\ApiClient\RestApi(API_ID, SECRET);
$api->setEndpoint(ENDPOINT);
```
Products
---------
```php

$products = new belenka\FHB\Kika\ApiClient\Products($api);
$uniqueId = '123456';

$data = array(
	'id' => $uniqueId,
	'name' => 'Shampoo',
	'ean' => '8580000001234',
	'photoUrl' => 'http://example.com/image.png',
	'notifyLink' => '"http://example.com/api/product/123/notify',
	'customs_information'=>[
	    'hs_code'=>'00112233',
	    'country_of_origin' => 'SK',
	    'purchase_price' => 23.50
	]
);

try {

	//create
	$result = $products->create($data);
	echo '<pre>';
	print_r($result);
	echo '</pre>';

	//update
	$data['name'] = 'Šampón updated';
	$result = $products->update($uniqueId, $data);
	echo '<pre>';
	print_r($result);
	echo '</pre>';

	//read
	$result = $products->read($uniqueId);
	echo '<pre>';
	print_r($result);
	echo '</pre>';

	//readAll
	$result = $products->readAll();
	echo '<pre>';
	print_r($result);
	echo '</pre>';


} catch (Kika\ApiClient\RestApiException $e) {
	die($e->getMessage());
}

```

Orders
------

```php

$orders = new belenka\FHB\Kika\ApiClient\Orders($api);

$uniqueId = '123456';

$data = array(
	'id' => $uniqueId,
	'variable_symbol =>'12345',
	'parcel_service'=> 'dpd',
	'delivery_point'=>'1234',
	'cod'=>22.50,
	'value'=> 22.50,
	'recipient'=>[
		'address'=>[
			'name'=>'john doe',
			'street'=>'Main street 1',
			'city'=>'New City',
			'zip'=>'12345',
			'province'=>'South',
			'country'=>'SK'
		],
		'contact'=[
			'email'=>'info@example.com',
			'phone'=>'421901234567'
		]
	],
	'items'=>[
		[
			'id'=>1234,
			'quantity'=> 2
		]
	],
	'notification'=>[
		'confirmed'=>'http://localhost',
		'sent'=>'http://localhost',
		'delivered'=>'http://localhost',
		'returned'=>'http://localhost',
		'ticket_created'=>'http://localhost',
		'ticket_updated'=>'http://localhost',
		'ticket_closed'=>'http://localhost',
	],
	'invoice'=>'http://localhost/file.pdf',
	'note' => 'no comment',
	'note_delivery' => 'no comment',
	'invoice_detail' => [
		'number'=>'INV0001',
		'total'=>22.50,
		'currency'=>'EUR',
		'date_of_issue'=>'2023-01-02',
		'products'=>[
			[
				'code'=> 123,
				'description' =>'socks white 38',
				'hs_code'=>112233,
				'value'=>12.50,
				'quantity'=>1,
				'country_of_origin'=>'SK'
			]
		],
		'fees'=>[
			[
				'type'=>'discount|shipping|other',
				'description'=>'Shipping Fee',
				'value'=>1.3
			]
		]
	]
	
);


try {

	//create
	$result = $orders->create($data);
	echo '<pre>';
	print_r($result);
	echo '</pre>';

	//update
	$data['name'] = 'Martin Novák updated';
	$result = $orders->update($uniqueId, $data);
	echo '<pre>';
	print_r($result);
	echo '</pre>';

	//read
	$result = $orders->read($uniqueId);
	echo '<pre>';
	print_r($result);
	echo '</pre>';

	//anonymization
	$result = $orders->anonymization($uniqueId);
	echo '<pre>';
	print_r($result);
	echo '</pre>';

	//delete
	$result = $orders->delete($uniqueId);
	echo '<pre>';
	print_r($result);
	echo '</pre>';


} catch (RestApiException $e) {
	die($e->getMessage());
}


```
