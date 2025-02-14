<?php

namespace App\Interfaces\ExternalDataApi;

use App\Services\ExternalData\MuseumExternalData\ArtworksExternalData\GetArtworksExternal;

interface GetExternalArtworksInterface
{
    public function getSearchResultObjects();

    public function setObjectIds(array $object_ids): GetArtworksExternal;
}
