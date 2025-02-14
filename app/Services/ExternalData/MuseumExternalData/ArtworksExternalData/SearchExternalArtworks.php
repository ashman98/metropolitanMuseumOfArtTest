<?php

namespace App\Services\ExternalData\MuseumExternalData\ArtworksExternalData;

use App\Services\ExternalData\MuseumExternalData\MetMuseumApiService;
use Illuminate\Support\Facades\Http;
use App\Interfaces\ExternalDataApi\SearchExternalArtworksInterface;

class SearchExternalArtworks extends MetMuseumApiService implements SearchExternalArtworksInterface
{
    private array $params = [];

    public function __construct($apiRoute)
    {
        parent::__construct($apiRoute);
    }

    public function search()
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get($this->endpoint, $this->params);


        if (!$response->successful()) {
            return [];
        }

        return collect($response->json()['objectIDs'])->take(10)->toArray();
    }

    public function setParams(array $params): SearchExternalArtworks
    {
        $this->params = $params;
        return $this;
    }
}
