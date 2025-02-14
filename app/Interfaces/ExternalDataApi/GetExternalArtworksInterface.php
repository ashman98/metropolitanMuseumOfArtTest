<?php

namespace App\Interfaces\ExternalDataApi;

use App\Services\ExternalData\MuseumExternalData\ArtworksExternalData\GetArtWorksExternalService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface GetExternalArtworksInterface
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function getArtWorks(): \Illuminate\Support\Collection;

    /**
     * @param array $art_works_ids
     * @return GetArtWorksExternalService
     */
    public function setArtWorksIds(array $art_works_ids): GetArtWorksExternalService;
}
