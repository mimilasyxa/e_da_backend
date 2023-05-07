<?php

namespace App\Http\Requests\Order;

use App\Entities\DTO\Participant\CreateParticipantDTO;
use Illuminate\Foundation\Http\FormRequest;

class JoinOrderRequest extends FormRequest
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
            'shareId' => 'string|required|exists:orders,share_link',
            'name' => 'string|required|max:255',
            'description' => 'string|required|max:800',
            'photos' => 'nullable|array',
            'photos.*' => 'nullable|image|max:1024'
        ];
    }

    /**
     * @return CreateParticipantDTO
     */
    public function getParticipantDTO(): CreateParticipantDTO
    {
        $photos = $this->file('photos');

        return (new CreateParticipantDTO())
            ->setName($this->input('name'))
            ->setDescription($this->input('description'))
            ->setPhotos($photos
                ? $this->getPhotos($this->file('photos'))
                : null)
            ->setShareId($this->input('shareId'));
    }

    /**
     * @param array|null $photos
     * @return array
     */
    public function getPhotos(?array $photos): array
    {
        $photosArray = [];

        foreach($photos as $photo) {
            $photosArray[] = $photo;
        }

        return $photosArray;
    }
}
