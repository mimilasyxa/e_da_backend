<?php

namespace App\Services\Participant;

use App\Models\Participant\ParticipantImage;
use App\Services\Image\ImageService;
use Illuminate\Http\UploadedFile;

class ParticipantImageService
{
    public function __construct(public ImageService $imageService)
    {
    }

    public function uploadFiles(array $photos, int $participantId): bool
    {
        foreach ($photos as $photo) {
            $orderImage = new ParticipantImage();
            $orderImage->setParticipantOrderId($participantId);
            $link = $this->imageService->upload($photo);
            $orderImage->setLink($link);
            $orderImage->save();
        }

        return true;
    }

}
