<?php

namespace App\Models\Order;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property string $uid
 * @property string $share_link
 * @property string $service_name
 * @property string $service_link
 * @property string $ordering_person
 * @property string|null $paying_credentials
 * @property string $status
 * @property string $comment
 * @property string $ordered_at
 */
class Order extends Model
{
    use HasFactory;

    const STATUS_CREATED = 'Created';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($entity) {
            $entity->uid = Str::uuid();
            $entity->share_link = Str::uuid();
        });
    }

    /**
     * @return string
     */
    public function getShareLink(): string
    {
        return $this->share_link;
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
     * @return string
     */
    public function getServiceName(): string
    {
        return $this->service_name;
    }

    /**
     * @param string $service_name
     */
    public function setServiceName(string $service_name): void
    {
        $this->service_name = $service_name;
    }

    /**
     * @return string
     */
    public function getServiceLink(): string
    {
        return $this->service_link;
    }

    /**
     * @param string $service_link
     */
    public function setServiceLink(string $service_link): void
    {
        $this->service_link = $service_link;
    }

    /**
     * @return string
     */
    public function getOrderingPerson(): string
    {
        return $this->ordering_person;
    }

    /**
     * @param string $ordering_person
     */
    public function setOrderingPerson(string $ordering_person): void
    {
        $this->ordering_person = $ordering_person;
    }

    /**
     * @return string|null
     */
    public function getPayingCredentials(): ?string
    {
        return $this->paying_credentials;
    }

    /**
     * @param string|null $paying_credentials
     */
    public function setPayingCredentials(?string $paying_credentials): void
    {
        $this->paying_credentials = $paying_credentials;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return string
     */
    public function getOrderedAt(): string
    {
        return $this->ordered_at;
    }

    /**
     * @param string $ordered_at
     */
    public function setOrderedAt(string $ordered_at): void
    {
        $this->ordered_at = $ordered_at;
    }

}
