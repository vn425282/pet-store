<?php

namespace Petstore\Infrastructure\Persistence;

use Petstore\Services\SpaceServiceHelper;
use Petstore\Domain\Entity\SpacesForPet;
use Petstore\Domain\Repository\SpaceRepositoryInterface;

class SpaceRepository implements SpaceRepositoryInterface
{
    public function getSpaceByType(int $spaceType): SpacesForPet {
        return SpaceServiceHelper::getSpaceByType($spaceType);
    }
}
