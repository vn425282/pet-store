<?php

namespace Petstore\Domain\Entity;

class PetStatus
{
    const SHOWROOM = 0;
    const BACKYARD = 1;
    const VETERINARIAN = 2;
    const SOLD_WITH_WARRANTY = 3;
    const SOLD = 4;

    public static function getName($status){
        switch($status){
            case PetStatus::SHOWROOM:
                return 'Showroom';
                break;
            case PetStatus::BACKYARD:
                return 'Backyard';
                break;
            case PetStatus::VETERINARIAN:
                return 'Veterinarian';
                break;
            case PetStatus::SOLD_WITH_WARRANTY:
                return 'Soldout';
                break;
            case PetStatus::SOLD:
                return 'Soldout';
                break;
        }
    }
}
