<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\Participant\ParticipantsCollection;
use App\Models\Order\Order;
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
            'serviceName' => $order->getServiceLink(),
            'serviceLink' => $order->getServiceLink(),
            'participants' => $participants
                ? ParticipantsCollection::collection($participants)
                : null
        ];
    }
}
