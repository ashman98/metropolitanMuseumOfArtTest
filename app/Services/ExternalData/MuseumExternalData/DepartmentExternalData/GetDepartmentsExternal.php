<?php

namespace App\Services\ExternalData\MuseumExternalData\DepartmentExternalData;

use App\Http\Resources\DepartmentResource;
use App\Interfaces\ExternalDataApi\GetDepartmentExternalInterface;
use App\Services\ExternalData\MuseumExternalData\MetMuseumApiService;
use Illuminate\Support\Facades\Http;

class GetDepartmentsExternal extends MetMuseumApiService implements GetDepartmentExternalInterface
{
    public function __construct(string $apiRoute)
    {
        parent::__construct($apiRoute);
    }


    /**
     * @return \Illuminate\Support\Collection|null
     */
    public function getDepartmentsExternalData(): \Illuminate\Support\Collection|null
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get($this->endpoint);

        if (!$response->successful()) {
            return null;
        }

        return  collect($response->json()['departments']);
    }

}
