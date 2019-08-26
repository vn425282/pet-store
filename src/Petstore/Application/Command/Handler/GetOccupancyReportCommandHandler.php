<?php

namespace Petstore\Application\Command\Handler;

use Petstore\Application\Command\GetOccupancyReportCommand;
use Petstore\Domain\Repository\PetRepositoryInterface;

class GetOccupancyReportCommandHandler
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
     * @param GetOccupancyReportCommand $command
     * @return array
     */
    public function handle(GetOccupancyReportCommand $command): array
    {
        return $this->petRepositoryInterface->getOccupancyReportCommand($command->getListMaxForReport());
    }
}
