<?php

namespace App\Http\Requests\Order;

use App\Entities\DTO\Order\CreateOrderDTO;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'orderingPerson' => 'required|string|max:255',
            'serviceName' => 'required|string|max:255',
            'serviceLink' => 'required|string|max:255',
            'orderingAt' => 'required|string|date_format:h:i:s',
        ];
    }

    /**
     * @return CreateOrderDTO
     */
    public function getCreateOrderDTO(): CreateOrderDTO
    {
        return (new CreateOrderDTO())
            ->setOrderingPerson($this->input('orderingPerson'))
            ->setServiceName($this->input('serviceName'))
            ->setServiceLink($this->input('serviceLink'))
            ->setOrderingAt(Carbon::parse($this->input('orderingAt'))->toDateTimeString());
    }
}
