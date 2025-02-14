<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArtWorksResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'image' => $this->primaryImageSmall,  // Assuming the API returns 'departmentId'
            'title' => $this->title, // Assuming the API returns 'displayName'
        ];
    }
}
