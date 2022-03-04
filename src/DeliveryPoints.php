<?php

namespace belenka\FHB\Kika\ApiClient;


class DeliveryPoints
{

    /** @var RestApi */
    private $api;


    public function __construct(RestApi $api)
    {
        $this->api = $api;
    }

    public function read($parcelService)
    {
        return $this->api->get("delivery-point/" . $parcelService);
    }
}
