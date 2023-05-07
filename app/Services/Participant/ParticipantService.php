<?php

namespace App\Services\Participant;

use App\Entities\DTO\Participant\CreateParticipantDTO;
use App\Models\Participant\OrderParticipant;

class ParticipantService
{
    public function __construct(
        public ParticipantImageService $participantImageService
    )
    {

    }

    /**
     * @param CreateParticipantDTO $participantDTO
     * @return bool
     */
    public function create(CreateParticipantDTO $participantDTO): bool
    {
        $participant = new OrderParticipant();

        $participant->setDescription($participantDTO->getDescription());
        $participant->setName($participantDTO->getName());
        $participant->setOrderId($participantDTO->getShareId());

        $result = $participant->save();

        if ($participantDTO->getPhotos()) {
            $this->participantImageService->uploadfiles(
                $participantDTO->getPhotos(),
                $participant->getId()
            );
        }

        return $result;
    }
}
