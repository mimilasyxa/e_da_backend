<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\Participant\ParticipantsCollection;
use App\Models\Order\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetOrderResource extends JsonResource
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
        $participants = $order->participants;

        return [
            'shareLink' => $order->getShareLink(),
            'orderingAt' => $order->getOrderedAt(),
            'orderingPerson' => Carbon::parse($order->getOrderingPerson())->toIso8601String(),
            'serviceName' => $order->getServiceName(),
            'serviceLink' => $order->getServiceLink(),
            /** @var ParticipantsCollection|null */
            'participants' => $participants
                ? ParticipantsCollection::collection($participants)
                : null
        ];
    }
}
