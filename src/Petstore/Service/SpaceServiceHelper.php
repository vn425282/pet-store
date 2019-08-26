<?php

namespace Petstore\Services;

use Petstore\Domain\Entity\SpacesForPet;
use Petstore\Domain\Entity\SpacesType;

class SpaceServiceHelper
{
    public static function getAllSpace()
    {
        $db = JsonDatabaseService::connectDB();
        return $db['space'];
    }

    public static function getSpaceByType(int $spaceType): SpacesForPet {
        $record = $spaceType === SpacesType::SHOWROOM ? self::getAllSpace()['showroom'] : self::getAllSpace()['backyard'];
        return self::convertArrayToObject($record, $spaceType);
    }

    private static function convertArrayToObject(array $array, int $spaceType) {
        if($array && sizeof($array) > 0){
            return new SpacesForPet(
                $array['id'],
                $array['maxDogs'],
                $array['maxCats'],
                $array['maxBirds'],
                $array['listPets'],
                $spaceType
            );
        }
        return null;
    }
}
