<?php

namespace App\Services\ExternalData\MuseumExternalData\ArtworksExternalData;

use App\Interfaces\ExternalDataApi\GetExternalArtworksInterface;
use App\Services\ExternalData\MuseumExternalData\MetMuseumApiService;
use Illuminate\Support\Facades\Http;

class GetArtWorksExternalService extends MetMuseumApiService implements GetExternalArtworksInterface
{
    private array $art_works_ids = [];

    public function __construct($apiRoute)
    {
        parent::__construct($apiRoute);
    }

    /**
     * @param array $art_works_ids
     * @return $this
     */
    public function setArtWorksIds(array $art_works_ids): GetArtWorksExternalService
    {
        $this->art_works_ids = $art_works_ids;
        return $this;
    }

    /**
     * @return \Illuminate\Support\Collection
     * @throws \Illuminate\Http\Client\ConnectionException
     */
    public function getArtWorks(): \Illuminate\Support\Collection
    {
        $art_works = [];

        foreach ($this->art_works_ids as $art_works_id){
            $response = Http::withHeaders([
                'Accept' => 'application/json',
            ])->get($this->endpoint. '/' . $art_works_id);


            if (!$response->successful()) {
                continue;
            }

            $art_works[] = $response->json();
        }

        return collect($art_works);
    }
}
