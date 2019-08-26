<?php

namespace Petstore\Infrastructure\Persistence;

use Petstore\Domain\Entity\Pet;
use Petstore\Domain\Entity\PetStatus;
use Petstore\Domain\Repository\PetRepositoryInterface;
use Petstore\Services\HelperService;
use Petstore\Services\PetServiceHelper;
use Petstore\Services\SpaceServiceHelper;

class PetRepository implements PetRepositoryInterface
{
    public function createPet(Pet $pet): Pet  {
        PetServiceHelper::updateOrCreatePet($pet);
        return $pet;
    }

    public function getPetByStatus(int $petStatus): array {
        return PetServiceHelper::getPetByStatus($petStatus);
    }

    public function getOccupancyReportCommand(array $listMaxPetsInSpace): array {
        // case SHOWROOM
        $petInShowRoom = PetServiceHelper::getPetByStatus(PetStatus::SHOWROOM);
        $currentShowRoom = PetServiceHelper::parsePetInSpaceToDetail($petInShowRoom);

        //case BACKYARD
        $petInBackYard = PetServiceHelper::getPetByStatus(PetStatus::BACKYARD);
        $currentBackYard = PetServiceHelper::parsePetInSpaceToDetail($petInBackYard);

        //case VETERINARIAN
        $petInVeterinarian = PetServiceHelper::getPetByStatus(PetStatus::VETERINARIAN);
        $currentVeterinarian = PetServiceHelper::parsePetInSpaceToDetail($petInVeterinarian);

        //case SOLD with insurance options
        $petInSold = PetServiceHelper::getPetByStatus(PetStatus::SOLD_WITH_WARRANTY);
        $currentSoldWithWarranty = PetServiceHelper::parsePetInSpaceToDetail($petInSold);

        $totalPetsInSpace = HelperService::arraySumIdenticalKeys($currentShowRoom , $currentBackYard, $currentVeterinarian, $currentSoldWithWarranty);

        $report = [
            'number_of_dogs_can_buy_more' => $listMaxPetsInSpace['maxDogs'] - $totalPetsInSpace['numberDogs'],
            'number_of_cats_can_buy_more' => $listMaxPetsInSpace['maxCats'] - $totalPetsInSpace['numberCats'],
            'number_of_birds_can_buy_more' => $listMaxPetsInSpace['maxBirds'] - $totalPetsInSpace['numberBirds']
        ];

        return $report;
    }
}
