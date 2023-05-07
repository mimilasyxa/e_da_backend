<?php

namespace App\Entities\DTO\Participant;

class CreateParticipantDTO
{
    private string $name;
    private string $description;
    private ?array $photos;
    private string $shareId;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return CreateParticipantDTO
     */
    public function setName(string $name): CreateParticipantDTO
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return CreateParticipantDTO
     */
    public function setDescription(string $description): CreateParticipantDTO
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getPhotos(): ?array
    {
        return $this->photos;
    }

    /**
     * @param array|null $photos
     * @return CreateParticipantDTO
     */
    public function setPhotos(?array $photos): CreateParticipantDTO
    {
        $this->photos = $photos;
        return $this;
    }

    /**
     * @return string
     */
    public function getShareId(): string
    {
        return $this->shareId;
    }

    /**
     * @param string $shareId
     * @return CreateParticipantDTO
     */
    public function setShareId(string $shareId): CreateParticipantDTO
    {
        $this->shareId = $shareId;
        return $this;
    }

}
