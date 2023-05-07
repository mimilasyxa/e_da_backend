<?php

namespace App\Models\Participant;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property string $uid
 * @property string $order_id
 * @property string $name
 * @property string $description
 * @property Carbon $created_at
 * @property-read ParticipantImage[]|null $images
 */
class OrderParticipant extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($entity) {
            $entity->uid = Str::uuid();
        });
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUid(): string
    {
        return $this->uid;
    }

    /**
     * @param string $uid
     * @return void
     */
    public function setUid(string $uid): void
    {
        $this->uid = $uid;
    }

    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->order_id;
    }

    /**
     * @param string $order_id
     * @return void
     */
    public function setOrderId(string $order_id): void
    {
        $this->order_id = $order_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
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
     */
    public function setDescription(string $description): void

    {
        $this->description = $description;
    }

    /**
     * @return Carbon
     */
    public function getCreatedAt(): Carbon
    {
        return $this->created_at;
    }

    /**
     * @return HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(ParticipantImage::class, 'participant_order_id', 'id');
    }

}
