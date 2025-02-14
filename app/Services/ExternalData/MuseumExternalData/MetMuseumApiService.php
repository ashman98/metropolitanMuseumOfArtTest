<?php

namespace App\Services\ExternalData\MuseumExternalData;

use App\Traits\ExternalData\ApiEndpoint;

abstract class MetMuseumApiService
{

    use ApiEndpoint;

    public function __construct($apiRoute)
    {
        $this->setEndpoint(config('metropolitenMuseum.url') . $apiRoute);
    }
}
