<?php

namespace App\Http\Controllers\MetMuseum;

use App\Http\Controllers\Controller;
use App\Http\Requests\MetMuseum\ArtworksSearchRequest;
use App\Models\Department;
use App\Services\ExternalData\MuseumExternalData\ArtworksExternalData\GetArtWorksExternalService;
use App\Services\ExternalData\MuseumExternalData\ArtworksExternalData\SearchExternalArtWorksService;
use Inertia\Inertia;


class MetMuseumController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $departments = Department::all();

        return Inertia::render('Welcome', [
            'departments' => $departments,
        ]);
    }

    /**
     * @param ArtworksSearchRequest $request
     * @return \Inertia\Response
     */
    public function search(ArtworksSearchRequest $request): \Inertia\Response
    {
        $title = $request->input('title');
        $department_id = $request->input('department_id');
        $query = $request->input('query');

        $searchExternalArtworksService = new SearchExternalArtWorksService('search');
        $art_works_ids = $searchExternalArtworksService->setParams([
            'departmentId' => $department_id,
            'title' => $title,
            'q' => $query
        ])->search();

        $getArtworksExternal = new GetArtWorksExternalService('objects');
        $art_works = $getArtworksExternal->setArtWorksIds($art_works_ids)->getArtWorks();

        return Inertia::render('Departments/SearchResults', [
            'art_works' => $art_works,
        ]);
    }
}
