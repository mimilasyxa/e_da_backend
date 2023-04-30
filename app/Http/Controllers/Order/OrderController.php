<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\CreateOrderRequest;
use App\Http\Resources\Order\CreateOrderResource;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
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
}
