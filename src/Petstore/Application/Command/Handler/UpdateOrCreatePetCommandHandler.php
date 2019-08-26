<?php

namespace Petstore\Application\Command\Handler;

use Petstore\Application\Command\UpdateOrCreatePetCommand;
use Petstore\Domain\Entity\Pet;
use Petstore\Domain\Repository\PetRepositoryInterface;

class UpdateOrCreatePetCommandHandler
{
    /** @var PetRepositoryInterface */
    private $petRepositoryInterface;

    /**
     * UpdateOrCreatePetCommandHandler constructor.
     * @param PetRepositoryInterface $petRepositoryInterface
     */
    public function __construct(PetRepositoryInterface $petRepositoryInterface)
    {
        $this->petRepositoryInterface = $petRepositoryInterface;
    }

    /**
     * @param UpdateOrCreatePetCommand $command
     * @return Pet
     */
    public function handle(UpdateOrCreatePetCommand $command): Pet
    {
        return $this->petRepositoryInterface->createPet($command->getPetInstance());
    }
}
