<?php

namespace Petstore\Application\Command\Handler;

use Petstore\Domain\Entity\SpacesForPet;
use Petstore\Application\Command\GetSpaceByTypeCommand;
use Petstore\Domain\Repository\SpaceRepositoryInterface;

class GetSpaceByTypeCommandHandler
{
    /** @var SpaceRepositoryInterface */
    private $spaceRepositoryInterface;

    /**
     * GetPetByStatusCommandHandler constructor.
     * @param SpaceRepository $petRepositoryInterface
     */
    public function __construct(SpaceRepositoryInterface $spaceRepositoryInterface)
    {
        $this->spaceRepositoryInterface = $spaceRepositoryInterface;
    }

    /**
     * @param GetSpaceByTypeCommand $command
     * @return array
     */
    public function handle(GetSpaceByTypeCommand $command): SpacesForPet
    {
        return $this->spaceRepositoryInterface->getSpaceByType($command->getSpaceType());
    }
}
