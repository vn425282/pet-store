<?php

namespace Petstore\Services;

class JsonDatabaseService
{
    const DB_PATH = 'storage/app/json/data.json';

    public static function dbStructure(){
        return [
            "store" => [
              "id",
              "owner",
              "name",
              "open",
              "dayOpen"
            ],
            "rules" => [
              "costForChip",
              "cashBackRate",
              "costForInsurance",
              "depositRate"
            ],
            "space" => [
              "showroom" => [
                "id",
                "maxDogs",
                "maxCats",
                "maxBirds",
                "listPets"=> []
              ],
              "backyard" => [
                "id",
                "maxDogs",
                "maxCats",
                "maxBirds",
                "listPets"=> []
              ]
            ],
            "customers" => [
                "id",
                "name",
                "address"
            ],
            "bills" => [
                "id",
                "dateCreated",
                "idCustomers",
                "idPet",
                "isInsuranceDate",
                "dateNotificationToPickup",
                "deposit",
                "totalFee"
            ],
            "pets" => [
                "id",
                "petType",
                "petStatus",
                "petName",
                "dateOfBirth",
                "chipIdentifier",
                "dateOfImplantedChip",
                "price",
                "description",
                "isShowForCustomer"
            ]
        ];
    }

    public static function removeNameSpaceAfterPushtoArray($object){
        $temp = (array) $object;
        $array = array();
        $matches = array();
        foreach ($temp as $k => $v) {
            $k = preg_match('/^\x00(?:.*?)\x00(.+)/', $k, $matches) ? $matches[1] : $k;
            $array[$k] = $v;
        }

        return $array;
    }

    public static function connectDB()
    {
        $jsonString = file_get_contents(base_path(self::DB_PATH));
        // convert to array
        $array = json_decode($jsonString, true);
        return $array;
    }

    public static function updateDB($content)
    {
        file_put_contents(base_path(self::DB_PATH), json_encode($content));
    }

    public static function ofilter($array, $properties)
    {
        if (empty($array)) {
            return;
        }
        if (is_string($properties)) {
            $properties = [$properties];
        }
        $isValid = function($obj, $propKey, $propVal) {
            if (is_int($propKey)) {
                if (!property_exists($obj, $propVal) || empty($obj->{$propVal})) {
                    return false;
                }
            } else {
                $obj = (object) $obj;
                if (!property_exists($obj, $propKey)) {
                    return false;
                }
                if (is_callable($propVal)) {
                    return call_user_func($propVal, $obj->{$propKey});
                }
                if (strtolower($obj->{$propKey}) != strtolower($propVal)) {
                    return false;
                }
            }
            return true;
        };

        return array_filter($array, function($v) use ($properties, $isValid) {
            foreach ($properties as $propKey => $propVal) {
                if (is_array($propVal)) {
                    $prop = array_shift($propVal);
                    if (!property_exists($v, $prop)) {
                        return false;
                    }
                    reset($propVal);
                    $key = key($propVal);
                    if (!$isValid($v->{$prop}, $key, $propVal[$key])) {
                        return false;
                    }
                } else {
                    if (!$isValid($v, $propKey, $propVal)) {
                        return false;
                    }
                }
            }
            return true;
        });
    }
}
