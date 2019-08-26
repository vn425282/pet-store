<?php

namespace Tests\Unit\Http\Controller;

use App\Services\PetService;
use App\Services\SpaceService;
use Petstore\Domain\Entity\Pet;
use Petstore\Domain\Entity\PetStatus;
use Petstore\Domain\Entity\PetType;
use Petstore\Domain\Entity\SpacesType;
use Petstore\Services\PetServiceHelper;
use Tests\TestCase;

class PetTest extends TestCase
{

    public function testAddNewCatPet()
    {
        $pet = PetServiceHelper::generatePetByType(PetType::CAT);
        $this->assertInstanceOf(Pet::class, $pet);
        $this->assertTrue($pet->petType() === PetType::CAT);
    }

    public function testAddNewCatDog()
    {
        $pet = PetServiceHelper::generatePetByType(PetType::DOG);
        $this->assertInstanceOf(Pet::class, $pet);
        $this->assertTrue($pet->petType() === PetType::DOG);
    }

    public function testAddNewCatBird()
    {
        $pet = PetServiceHelper::generatePetByType(PetType::BIRD);
        $this->assertInstanceOf(Pet::class, $pet);
        $this->assertTrue($pet->petType() === PetType::BIRD);
    }

    public function testPetsInShowroom()
    {
        $petService = new PetService;
        $array = $petService->dispatchGetPetByStatus(PetStatus::SHOWROOM);
        foreach ($array as $key) {
            $this->assertTrue($key['petStatus'] === PetStatus::SHOWROOM);
        }
    }
}
