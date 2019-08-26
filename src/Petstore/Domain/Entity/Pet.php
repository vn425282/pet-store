<?php

namespace Petstore\Domain\Entity;

class Pet
{
    /**
     * @var string
     */
    private $id;
    /**
     * @var int
     */
    private $petType;
    /**
     * @var int
     */
    private $petStatus;
    /**
     * @var string
     */
    private $petName;
    /**
     * @var string
     */
    private $dateOfBirth;
    /**
     * @var string
     */
    private $chipIdentifier;
    /**
     * @var string
     */
    private $dateOfImplantedChip;
    /**
     * @var int
     */
    private $price;
    /**
     * @var string
     */
    private $description;
    /**
     * @var bool
     */
    private $isShowForCustomer;

    public function __construct(
        string $id,
        int $petType,
        int $petStatus,
        string $petName,
        string $dateOfBirth,
        string $chipIdentifier,
        string $dateOfImplantedChip,
        int $price,
        string $description,
        bool $isShowForCustomer
    ) {
        $this->id = $id;
        $this->petType = $petType;
        $this->petStatus = $petStatus;
        $this->petName = $petName;
        $this->dateOfBirth = $dateOfBirth;
        $this->chipIdentifier = $chipIdentifier;
        $this->dateOfImplantedChip = $dateOfImplantedChip;
        $this->price = $price;
        $this->description = $description;
        $this->isShowForCustomer = $isShowForCustomer;
    }

    public function petId(): string
    {
        return $this->id;
    }

    public function petStatus()
    {
        return $this->petStatus;
    }

    public function petType()
    {
        return $this->petType;
    }

    public function changeIsShowForCustomer(int $isShowForCustomer)
    {
        $this->isShowForCustomer = $isShowForCustomer;
    }

    public function changeStatus(int $newStatus)
    {
        $this->petStatus = $newStatus;
    }

    public function isAvalibleForSell(){
        if($this->isShowForCustomer && $this->chipIdentifier !== '') {
            return true;
        }
        return false;
    }
}
