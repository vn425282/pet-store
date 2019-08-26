<?php

namespace Petstore\Services;

use Petstore\Domain\Entity\Pet;
use Petstore\Services\HelperService;
use Petstore\Domain\Entity\PetStatus;
use Petstore\Domain\Entity\PetType;

class PetServiceHelper
{
    public static function parsePetInSpaceToDetail(array $petsInSpace){
        $numberCats = 0;
        $numberDogs = 0;
        $numberBirds = 0;
        foreach ($petsInSpace as $val){
            switch((int)$val['petType']){
                case PetType::CAT:
                    $numberCats++;
                    break;
                case PetType::DOG:
                    $numberDogs++;
                    break;
                case PetType::BIRD:
                    $numberBirds++;
                    break;
            }
        }

        return [
            "numberDogs" => $numberDogs,
            "numberCats" => $numberCats,
            "numberBirds" => $numberBirds
        ];
    }

    public static function generatePetByType($petType): Pet {
        $generateId = HelperService::generate()->toString();
        $pet = new Pet(
            HelperService::generate()->toString(),
            $petType,
            PetStatus::BACKYARD,
            'PET_TESTER_' . $generateId,
            date("Y-m-d"),
            '',
            '',
            rand(5000,10000),
            HelperService::generatePetDescription($petType),
            true
        );

        return $pet;
    }

    public static function getAllPets(): array
    {
        $db = JsonDatabaseService::connectDB();
        return $db['pets'];
    }

    public static function getPetByStatus($petStatus): ?array {
        $record = JsonDatabaseService::ofilter(self::getAllPets(), ['petStatus' =>  $petStatus]);
        return $record;
    }

    public static function getPetByType($petType): ?array {
        $record = JsonDatabaseService::ofilter(self::getAllPets(), ['petType' =>  $petType]);
        return $record;
    }

    public static function getPetsByID(string $id): ?Pet
    {
        $record = JsonDatabaseService::ofilter(self::getAllPets(), ['id' =>  $id]);
        return self::convertArrayToObject($record);
    }

    public static function updateOrCreatePet(Pet $pet): void {
        $db = JsonDatabaseService::connectDB();
        $record = self::getPetsByID($pet->petId());
        // update
        if($record) {
            // $db['pets']
        } else {
            array_push($db['pets'], JsonDatabaseService::removeNameSpaceAfterPushtoArray($pet));
            array_push($db['space']['backyard']['listPets'], $pet->petId());
        }
        JsonDatabaseService::updateDB($db);
    }

    private static function convertArrayToObject($array) {
        if($array && sizeof($array) > 0){
            return new Pet(
                $array['id'],
                $array['petType'],
                $array['petStatus'],
                $array['petName'],
                $array['dateOfBirth'],
                $array['chipIdentifier'],
                $array['dateOfImplantedChip'],
                $array['price'],
                $array['description'],
                $array['isShowForCustomer']
            );
        }
        return null;
    }

    public static function getName($type, $isSpace = false){
        switch($type){
            case PetType::DOG:
                return $isSpace ? 'number_of_dogs_can_buy_more' : 'Dog';
                break;
            case PetType::CAT:
                return $isSpace ? 'number_of_cats_can_buy_more' : 'CAT';
                return 'Cat';
                break;
            case PetType::BIRD:
                return $isSpace ? 'number_of_birds_can_buy_more' : 'BIRD';
                return 'Bird';
                break;
        }
    }
}
