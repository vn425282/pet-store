<?php

namespace Petstore\Domain\Entity;

class PetType
{
    const CAT = 0;
    const DOG = 1;
    const BIRD = 2;

    public static function getName(int $type, bool $isSpace = false){
        switch($type){
            case PetType::DOG:
                return $isSpace ? 'number_of_dogs_can_buy_more' : 'Dog';
                break;
            case PetType::CAT:
                return $isSpace ? 'number_of_cats_can_buy_more' : 'CAT';
                break;
            case PetType::BIRD:
                return $isSpace ? 'number_of_birds_can_buy_more' : 'BIRD';
                break;
        }
    }
}
