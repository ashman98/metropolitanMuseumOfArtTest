<?php

namespace App\Services\ExternalData\MuseumExternalData\ArtworksExternalData;

use App\Services\ExternalData\MuseumExternalData\MetMuseumApiService;
use Illuminate\Support\Facades\Http;
use App\Interfaces\ExternalDataApi\SearchExternalArtworksInterface;

class SearchExternalArtWorksService extends MetMuseumApiService implements SearchExternalArtworksInterface
{
    private array $params = [];

    public function __construct($apiRoute)
    {
        parent::__construct($apiRoute);
    }

    /**
     * @param array $params
     * @return $this
     */
    public function setParams(array $params): SearchExternalArtWorksService
    {
        $this->params = $params;
        return $this;
    }

    /**
     * @return array
     * @throws \Illuminate\Http\Client\ConnectionException
     */
    public function search(): array
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get($this->endpoint, $this->params);


        if (!$response->successful()) {
            return [];
        }

        return collect($response->json()['objectIDs'])->take(10)->toArray();
    }
}
