<?php

namespace Petstore\Application\Command;

use Petstore\Domain\Entity\Pet;

class GetPetByStatusCommand
{
    /** @var int */
    private $petStatus;

    /**
     * GetPetByStatusCommand constructor.
     * @param Pet $pet
     */
    public function __construct(int $petStatus)
    {
        $this->petStatus = $petStatus;
    }

    /**
     * @return int
     */
    public function getPetStatus(): int
    {
        return $this->petStatus;
    }
}
