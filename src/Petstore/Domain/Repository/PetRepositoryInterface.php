<?php

namespace Petstore\Domain\Repository;

use Petstore\Domain\Entity\Pet;
use Petstore\Domain\Rules;

interface PetRepositoryInterface
{
    /**
     * @return Pet
    */
    public function createPet(Pet $pet): Pet;

    /**
     * @return array
    */
    public function getPetByStatus(int $status): array;

    /**
     * @return array
    */
    public function getOccupancyReportCommand(array $listMaxPetsInSpace): array;
}
