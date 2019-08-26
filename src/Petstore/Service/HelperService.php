<?php

namespace Petstore\Services;

use Petstore\Domain\Entity\PetType;
use Ramsey\Uuid\Uuid;

class HelperService {
    /**
     * @return string
    */
    // Generate a version 1 (time-based) UUID object
    public static function generate()
    {
        return Uuid::uuid1();
    }

    public static function generatePetDescription($petType): string {
        $des = '';
        switch((int) $petType){
            case PetType::CAT:
                $des = 'The cat is a small carnivorous mammal. It is the only domesticated species in the family Felidae and often referred to as the domestic cat to distinguish it from wild members of the family. The cat is either a house cat or a farm cat, which are pets, or a feral cat, which ranges freely and avoids human contact.';
                break;
            case PetType::DOG:
                $des = 'This domestic dog (Canis lupus familiaris when considered a subspecies of the wolf or Canis familiaris when considered a distinct species)[5] is a member of the genus Canis (canines), which forms part of the wolf-like canids,[6] and is the most widely abundant terrestrial carnivor';
                break;
            case PetType::BIRD:
                $des = 'This Birds, also known as Aves or avian dinosaurs, are a group of endothermic vertebrates, characterised by feathers, toothless beaked jaws';
                break;
        }

        return $des;
    }

    public static function convertArrayToCollection($array){
        return collect($array);
    }

    public static function arraySumIdenticalKeys() {
        $arrays = func_get_args();
        $keys = array_keys(array_reduce($arrays, function ($keys, $arr) { return $keys + $arr; }, array()));
        $sums = array();

        foreach ($keys as $key) {
            $sums[$key] = array_reduce($arrays, function ($sum, $arr) use ($key) { return $sum + @$arr[$key]; });
        }
        return $sums;
    }
}
