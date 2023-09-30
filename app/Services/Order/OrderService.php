<?php

namespace App\Services\Order;

use App\Entities\DTO\Order\CreateOrderDTO;
use App\Models\Order\Order;
use App\Services\Participant\ParticipantService;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OrderService
{
    const NOT_FOUND = 'Заказ не найден!';
    public function __construct(public ParticipantService $participantService)
    {
    }

    /**
     * @param CreateOrderDTO $orderDTO
     * @return Order
     */
    public function create(CreateOrderDTO $orderDTO): Order
    {
        $order = new Order();

        $order->setServiceLink($orderDTO->getServiceLink());
        $order->setServiceName($orderDTO->getServiceName());
        $order->setOrderingPerson($orderDTO->getOrderingPerson());
        $order->setOrderedAt($orderDTO->getOrderingAt());
        $order->setStatus(Order::STATUS_CREATED);

        $order->save();

        return $order;
    }

    /**
     * @param string $id
     * @return Order
     */
    public function get(string $id): Order
    {
        /** @var Order $order */
        $order = Order::query()
            // Если нашли по UID то это заказывальщик, если по share_link то это один из участников заказа
            ->selectRaw("*, CASE when uid = '${id}' then 0 when share_link = '${id}' then 1 end as person")
            ->with('participants.images')
            ->where('uid', $id)
            ->orWhere('share_link', $id)
            ->first();

        if (!$order) {
            throw new NotFoundHttpException(self::NOT_FOUND);
        }

        return $order;
    }

    /**
     * @param int $orderUid
     * @return void
     */
    public function proceed(int $orderUid): void
    {
        /** @var Order $order */
        $order = Order::query()
            ->where('uid', $orderUid)
            ->first();

        if (!$order) {
            throw new NotFoundHttpException(self::NOT_FOUND);
        }

        $order->setStatus(Order::STATUS_ORDERED);

        $order->save();
    }
}
