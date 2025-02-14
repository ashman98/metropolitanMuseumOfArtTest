<?php

namespace App\Http\Controllers\MetMuseum;

use App\Http\Controllers\Controller;
use App\Http\Requests\MetMuseum\ArtworksSearchRequest;
use App\Interfaces\ExternalDataApi\SearchExternalArtworksInterface;
use App\Services\ExternalData\MuseumExternalData\ArtworksExternalData\GetArtworksExternal;
use App\Services\ExternalData\MuseumExternalData\ArtworksExternalData\SearchExternalArtworks;
use Inertia\Inertia;
use Illuminate\Http\Request;


class MetMuseumController extends Controller
{
    public function __construct()
    {
    }

    /**
     * @param ArtworksSearchRequest $request
     * @return \Inertia\Response
     */
    public function search(ArtworksSearchRequest $request)
    {
        $title = $request->input('title');
        $department_id = $request->input('department_id');
        $query = $request->input('query');

        $searchExternalArtworksService = new SearchExternalArtworks('search');
        $object_ids = $searchExternalArtworksService->setParams([
            'departmentId' => $department_id,
            'title' => $title,
            'q' => $query
        ])->search();

        $getArtworksExternal = new GetArtworksExternal('objects');
        $art_works = $getArtworksExternal->setObjectIds($object_ids)->getSearchResultObjects();

        return Inertia::render('Departments/SearchResults', [
            'art_works' => $art_works,
//            'query' => $query
        ]);
    }
}
