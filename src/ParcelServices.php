<?php

namespace belenka\FHB\Kika\ApiClient;


class ParcelServices
{

    /** @var RestApi */
    private $api;


    public function __construct(RestApi $api)
    {
        $this->api = $api;
    }

    public function read()
    {
        return $this->api->get("parcel-service");
    }
}
