<?php

namespace App\Services\Order;

use App\Entities\DTO\Order\CreateOrderDTO;
use App\Models\Order\Order;

class OrderService
{
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
}
