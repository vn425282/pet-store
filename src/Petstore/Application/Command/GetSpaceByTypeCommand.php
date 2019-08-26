<?php

namespace Petstore\Application\Command;

use Petstore\Domain\Entity\Pet;

class GetSpaceByTypeCommand
{
    /** @var int */
    private $typeSpace;

    /**
     * GetPetByStatusCommand constructor.
     * @param Pet $pet
     */
    public function __construct(int $typeSpace)
    {
        $this->typeSpace = $typeSpace;
    }

    /**
     * @return int
     */
    public function getSpaceType(): int
    {
        return $this->typeSpace;
    }
}
