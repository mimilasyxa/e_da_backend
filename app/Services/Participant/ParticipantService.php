<?php

namespace App\Services\Participant;

use App\Entities\DTO\Participant\CreateParticipantDTO;
use App\Models\Order\Order;
use App\Models\Participant\OrderParticipant;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ParticipantService
{
    public const NOT_FOUND = 'Заказ не найден!';
    public const INVALID_STATUS = 'У заказа несоответствующий статус!';

    public function __construct(
        public ParticipantImageService $participantImageService
    )
    {

    }

    /**
     * @param CreateParticipantDTO $participantDTO
     * @return bool
     * @throws \Exception
     */
    public function create(CreateParticipantDTO $participantDTO): bool
    {
        /** @var Order $order */
        $order = Order::query()
            ->where('share_link', $participantDTO->getShareId())
            ->first();

        if (!$order) {
            throw new NotFoundHttpException(self::NOT_FOUND);
        }

        if ($order->getStatus() != Order::STATUS_CREATED) {
            throw new \Exception(self::INVALID_STATUS);
        }

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
