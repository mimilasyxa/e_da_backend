<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\CreateOrderRequest;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @param CreateOrderRequest $orderRequest
     * @param OrderService $orderService
     * @return string
     */
    public function create(CreateOrderRequest $orderRequest, OrderService $orderService): string
    {
        return $orderService->create(
            $orderRequest->getCreateOrderDTO()
        );
    }
}
