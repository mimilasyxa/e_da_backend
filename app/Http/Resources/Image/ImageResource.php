<?php

namespace App\Http\Resources\Image;

use App\Models\Participant\ParticipantImage;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
{
    /** @var ParticipantImage */
    public $resource;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'link' => asset($this->resource->getLink())
        ];
    }
}
