<?php

namespace App\Http\Resources\Order;

use App\Models\Order\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CreateOrderResource extends JsonResource
{
    /** @var Order */
    public $resource;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $order = $this->resource;

        return [
            'id' => $order->getUid(),
            'shareId' => $order->getShareLink(),
            'orderingPerson' => $order->getOrderingPerson(),
            'orderingAt' => $order->getOrderedAt(),
            'serviceName' => $order->getServiceName(),
            'serviceLink' => $order->getServiceLink(),
            'status' => $order->getStatus()
        ];
    }
}
