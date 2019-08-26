<?php

namespace Petstore\Domain\Entity;

class SpacesType
{
    const SHOWROOM = 0;
    const BACKYARD = 1;

    public static function getName($status){
        switch($status){
            case SpacesType::SHOWROOM:
                return 'Showroom';
                break;
            case SpacesType::BACKYARD:
                return 'Backyard';
                break;
        }
    }
}
