<?php

namespace App\Traits\ExternalData;

trait ApiEndpoint
{
    /** @var string */
    protected string $endpoint = '';

    /**
     * @param string $endpoint
     */
    protected function setEndpoint(string $endpoint): void
    {
        $this->endpoint = $endpoint;
    }
}
