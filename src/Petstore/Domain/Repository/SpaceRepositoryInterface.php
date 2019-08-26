<?php

namespace Petstore\Domain\Repository;

use Petstore\Domain\Entity\SpacesForPet;

interface SpaceRepositoryInterface
{
    public function getSpaceByType(int $spaceType): SpacesForPet;
}
