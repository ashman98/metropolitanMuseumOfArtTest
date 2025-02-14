<?php

namespace App\Interfaces\ExternalDataApi;

use App\Services\ExternalData\MuseumExternalData\ArtworksExternalData\SearchExternalArtWorksService;

interface SearchExternalArtworksInterface
{
    /**
     * @return array
     */
    public function search(): array;

    /**
     * @param array $params
     * @return SearchExternalArtWorksService
     */
    public function setParams(array $params): SearchExternalArtWorksService;
}
