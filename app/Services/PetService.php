<?php

namespace App\Services;

use Petstore\Domain\Entity\Pet;
use Petstore\Application\Command\GetPetByStatusCommand;
use Petstore\Application\Command\UpdateOrCreatePetCommand;
use Petstore\Application\Command\GetOccupancyReportCommand;
use Petstore\Domain\Entity\SpacesForPet;
use Petstore\Services\PetServiceHelper;
use JildertMiedema\LaravelTactician\DispatchesCommands;

class PetService
{
    use DispatchesCommands;

    /**
     * @param $pet
     */
    public function dispatchCreatePetByType($petType): Pet
    {
        $pet = PetServiceHelper::generatePetByType($petType);
        return self::dispatch(new UpdateOrCreatePetCommand($pet));
    }

    /**
     * @param $pet
     */
    public function dispatchGetPetByStatus(int $petStatus)
    {
        return self::dispatch(new GetPetByStatusCommand($petStatus));
    }

        /**
     * @param $pet
     */
    public function dispatchGetOccupancyReport(SpacesForPet $space)
    {
        return self::dispatch(new GetOccupancyReportCommand($space));
    }
}
