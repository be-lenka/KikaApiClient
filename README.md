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
	'name' => 'Martin Novák',
	'street' => 'Hronská 35',
	'city' => 'Zvolen',
	'psc' => '96001',
	'country' => 'sk',
	'email' => 'email@example.com',
	'phone' => '00421900123456',
	'variableSymbol' => '588988552',
	'cod' => '54.98',
	'note' => 'poznamka',
	'invoiceLink' => 'http://example.com/order/inv123.pdf',
	'_embedded' => array(
		'items' =>  array(
			array(
				'id' => '123456',
				'qty' => 3,
			),
			array(
				'id' => '1234567',
				'qty' => 4,
			),
		),

		'notifyLinks' => array(
			array(
				'confirmed' => 'http://example.com/api/order/123/confirm',
				'sent' => 'http://example.com/api/order/123/sent',
				'delivered' => 'http://example.com/api/order/123/delivered',
				'returned' => 'http://example.com/api/order/123/returned',
			),
		)
	),
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
