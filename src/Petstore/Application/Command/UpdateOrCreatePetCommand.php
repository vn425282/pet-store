<?php

namespace Petstore\Application\Command;

use Petstore\Domain\Entity\Pet;

class UpdateOrCreatePetCommand
{
    /** @var Pet */
    private $pet;

    /**
     * UpdateOrCreatePetCommand constructor.
     * @param Pet $pet
     */
    public function __construct(Pet $pet)
    {
        $this->pet = $pet;
    }

    /**
     * @return string
     */
    public function getPetId(): string
    {
        return $this->pet->petId();
    }

    /**
     * @return Pet
    */
    public function getPetInstance(): Pet
    {
        return $this->pet;
    }
}
