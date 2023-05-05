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
          'id' => $order->getShareLink(),
          'orderingPerson' => $order->getOrderingPerson(),
          'orderingAt' => Carbon::parse($order->getOrderedAt())->toIso8601String(),
          'serviceName' => $order->getServiceName(),
          'serviceLink' => $order->getServiceLink(),
          'status' => $order->getStatus()
        ];
    }
}
