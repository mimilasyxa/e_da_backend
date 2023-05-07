<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\CreateOrderRequest;
use App\Http\Requests\Order\GetOrderRequest;
use App\Http\Requests\Order\JoinOrderRequest;
use App\Http\Resources\Order\CreateOrderResource;
use App\Http\Resources\Order\GetOrderResource;
use App\Services\Order\OrderService;
use App\Services\Participant\ParticipantService;

class OrderController extends Controller
{
    /** Создание заказа
     *
     * @param CreateOrderRequest $orderRequest
     * @param OrderService $orderService
     * @return CreateOrderResource
     */
    public function create(CreateOrderRequest $orderRequest, OrderService $orderService): CreateOrderResource
    {
        return new CreateOrderResource($orderService->create(
            $orderRequest->getCreateOrderDTO()
        ));
    }

    /** Присоединение к заказу
     *
     * Создание заявки гладного
     * @param JoinOrderRequest $orderRequest
     * @param ParticipantService $participantService
     * @return void
     */
    public function join(JoinOrderRequest $orderRequest, ParticipantService $participantService): void
    {
        $participantService->create($orderRequest->getParticipantDTO());
    }

    /** Получение заказа
     *
     * @param GetOrderRequest $orderRequest
     * @param OrderService $orderService
     * @return GetOrderResource
     */
    public function get(GetOrderRequest $orderRequest, OrderService $orderService): GetOrderResource
    {
        return new GetOrderResource($orderService->get(
            $orderRequest->getId()
        ));
    }
}
