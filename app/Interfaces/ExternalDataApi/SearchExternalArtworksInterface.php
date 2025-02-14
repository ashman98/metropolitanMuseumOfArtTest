<?php

namespace App\Interfaces\ExternalDataApi;

use App\Services\ExternalData\MuseumExternalData\ArtworksExternalData\SearchExternalArtworks;

interface SearchExternalArtworksInterface
{
    public function search();

    public function setParams(array $params): SearchExternalArtworks;
}
