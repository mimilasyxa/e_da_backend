<?php

namespace App\Models\Participant;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $participant_order_id
 * @property string $link
 */
class ParticipantImage extends Model
{
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getParticipantOrderId(): int
    {
        return $this->participant_order_id;
    }

    /**
     * @param int $participant_order_id
     */
    public function setParticipantOrderId(int $participant_order_id): void
    {
        $this->participant_order_id = $participant_order_id;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink(string $link): void
    {
        $this->link = $link;
    }

}
