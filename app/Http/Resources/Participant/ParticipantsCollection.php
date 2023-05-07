<?php

namespace App\Http\Resources\Participant;

use App\Http\Resources\Image\ImageResource;
use App\Models\Participant\OrderParticipant;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ParticipantsCollection extends JsonResource
{
    /** @var OrderParticipant */
    public $resource;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $participant = $this->resource;
        $images = $participant->images;

        return [
            'id' => $participant->getId(),
            'name' => $participant->getName(),
            'description' => $participant->getDescription(),
            'images' => $images
                ? $this->getImages($images)
                : null
        ];
    }

    public function getImages(Collection $images): array
    {
        $result = [];

        foreach ($images as $image) {
            $result[] = new ImageResource($image);
        }

        return $result;
    }
}
