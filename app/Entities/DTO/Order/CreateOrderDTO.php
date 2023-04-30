<?php

namespace App\Entities\DTO\Order;

class CreateOrderDTO
{
    public string $serviceName;
    public string $serviceLink;
    public string $orderingPerson;
    public string $orderingAt;

    /**
     * @return string
     */
    public function getOrderingAt(): string
    {
        return $this->orderingAt;
    }

    /**
     * @param string $orderingAt
     * @return CreateOrderDTO
     */
    public function setOrderingAt(string $orderingAt): CreateOrderDTO
    {
        $this->orderingAt = $orderingAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getServiceName(): string
    {
        return $this->serviceName;
    }

    /**
     * @param string $serviceName
     * @return CreateOrderDTO
     */
    public function setServiceName(string $serviceName): CreateOrderDTO
    {
        $this->serviceName = $serviceName;
        return $this;
    }

    /**
     * @return string
     */
    public function getServiceLink(): string
    {
        return $this->serviceLink;
    }

    /**
     * @param string $serviceLink
     * @return CreateOrderDTO
     */
    public function setServiceLink(string $serviceLink): CreateOrderDTO
    {
        $this->serviceLink = $serviceLink;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderingPerson(): string
    {
        return $this->orderingPerson;
    }

    /**
     * @param string $orderingPerson
     * @return CreateOrderDTO
     */
    public function setOrderingPerson(string $orderingPerson): CreateOrderDTO
    {
        $this->orderingPerson = $orderingPerson;
        return $this;
    }

}
