<?php

namespace belenka\FHB\Kika\ApiClient;


class StockReceipts
{

	/** @var RestApi */
	private $api;


	public function __construct(RestApi $api)
	{
		$this->api = $api;
	}


	public function create(array $data)
	{
		return $this->api->post('stock-receipt', $data);
	}


	public function update($id, array $data)
	{
		return $this->api->put("stock-receipt?id=$id", $data);
	}


	public function read($id)
	{
		return $this->api->get("stock-receipt?id=$id");
	}

    public function delete($id)
	{
		return $this->api->delete("stock-receipt?id=$id");
	}
	
}
