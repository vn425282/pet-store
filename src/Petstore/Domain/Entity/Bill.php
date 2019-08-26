<?php

namespace Petstore\Domain\Entity;

class Bill
{
    /**
     * @var string
     */
    private $id;
    /**
     * @var string
     */
    private $dateCreated;
    /**
     * @var string
     */
    private $idCustomers;
    /**
     * @var string
     */
    private $isInsuranceDate;
    /**
     * @var string
     */
    private $dateNotificationToPickup;
    /**
     * @var int
    */
    private $deposit;
    /**
     * @var int
     */
    private $totalFee;

    public function __construct(
        string $id,
        string $dateCreated,
        string $idCustomers,
        string $idPet,
        string $isInsuranceDate,
        string $dateNotificationToPickup,
        int $deposit,
        int $totalFee
    ) {
        $this->id = $id;
        $this->owner = $dateCreated;
        $this->idCustomers = $idCustomers;
        $this->idPet = $idPet;
        $this->isInsuranceDate = $isInsuranceDate;
        $this->dateNotificationToPickup = $dateNotificationToPickup;
        $this->deposit = $deposit;
        $this->totalFee = $totalFee;
    }

    public function billId(): string
    {
        return $this->id;
    }

    public function changeDateNotificationToPickup()
    {
        $this->dateNotificationToPickup = $this->dateNotificationToPickup;
    }

}
