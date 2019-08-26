<?php

namespace Petstore\Application\Command\Handler;

use Petstore\Application\Command\GetPetByStatusCommand;
use Petstore\Domain\Repository\PetRepositoryInterface;

class GetPetByStatusCommandHandler
{
    /** @var PetRepositoryInterface */
    private $petRepositoryInterface;

    /**
     * GetPetByStatusCommandHandler constructor.
     * @param PetRepositoryInterface $petRepositoryInterface
     */
    public function __construct(PetRepositoryInterface $petRepositoryInterface)
    {
        $this->petRepositoryInterface = $petRepositoryInterface;
    }

    /**
     * @param GetPetByStatusCommand $command
     * @return array
     */
    public function handle(GetPetByStatusCommand $command): array
    {
        return $this->petRepositoryInterface->getPetByStatus($command->getPetStatus());
    }
}
