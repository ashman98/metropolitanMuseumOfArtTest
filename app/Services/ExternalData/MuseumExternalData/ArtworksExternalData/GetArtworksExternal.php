<?php

namespace App\Services\ExternalData\MuseumExternalData\ArtworksExternalData;

use App\Http\Requests\MetMuseum\ArtworksSearchRequest;
use App\Http\Resources\ArtWorksResource;
use App\Interfaces\ExternalDataApi\GetExternalArtworksInterface;
use App\Services\ExternalData\MuseumExternalData\MetMuseumApiService;
use Illuminate\Support\Facades\Http;

class GetArtworksExternal extends MetMuseumApiService implements GetExternalArtworksInterface
{
    private array $object_ids = [];

    public function __construct($apiRoute)
    {
        parent::__construct($apiRoute);
    }

    public function getSearchResultObjects()
    {
        $artWorks = [];

        foreach ($this->object_ids as $object_id){
            $response = Http::withHeaders([
                'Accept' => 'application/json',
            ])->get($this->endpoint. '/' . $object_id);


            if (!$response->successful()) {
                continue;
            }

            $artWorks[] = $response->json();
        }

        return collect($artWorks);
    }

    public function setObjectIds(array $object_ids): GetArtworksExternal
    {
        $this->object_ids = $object_ids;
        return $this;
    }
}
