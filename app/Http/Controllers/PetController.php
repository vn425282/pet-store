<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\PetService;
use App\Services\SpaceService;
use Petstore\Services\JsonDatabaseService;
use Petstore\Domain\Entity\PetType;
use Petstore\Domain\Entity\PetStatus;
use Petstore\Domain\Entity\SpacesType;
use Petstore\Application\Infrastructure\Exception\PetException;
use Symfony\Component\HttpFoundation\Request;
use Exception;

class PetController extends Controller
{
    private $petService;
    private $spaceService;

    public function __construct(PetService $petService, SpaceService $spaceService)
    {
        $this->petService = $petService;
        $this->spaceService = $spaceService;

    }

    public function index()
    {
        return view('welcome');
    }

    public function createPetByType(Request $request)
    {
        $petType = $request->input('type');
        $status = 'You have successfully purchased the ' . PetType::getName($petType);
        try {

            // RULES CHECK : check Space ( BACKYARD ) is avalible for add more Pet or not
            // because at night, the pets will be move to BACKYARD
            // and in the future, some pet will come back if they got sent to veterinarian or still have warranty
            $space = $this->spaceService->dispatchGetSpaceByStatus(SpacesType::BACKYARD);
            $listSpaceAvalibleForEachPet = $this->petService->dispatchGetOccupancyReport($space);
            $petTypeName = PetType::getName($petType, true);

            if($listSpaceAvalibleForEachPet[$petTypeName] > 0){
                $pet = $this->petService->dispatchCreatePetByType($petType);
                $json = array(
                    'result' => $status,
                    'pet_info' => JsonDatabaseService::removeNameSpaceAfterPushtoArray($pet)
                );
            }else{
                throw new PetException("", $petTypeName . ':' . $listSpaceAvalibleForEachPet[$petTypeName]);
            }
        }catch (Exception $e){
            $status = $e->getMessage();
            $json = array(
                'error_message' => $status
            );
        }

        return view('result', ["title" => json_encode($json)]);
    }

    // included option isShowupForCustomer
    public function getPetByStatus($petStatus)
    {
        try {
            $pets = $this->petService->dispatchGetPetByStatus($petStatus);
            $json = array(
                'result_message' => 'Get all of pets in ' . PetStatus::getName($petStatus),
                'total_pets' => sizeof($pets),
                'pet_info' => JsonDatabaseService::removeNameSpaceAfterPushtoArray($pets)
            );
        }catch (Exception $e){
            $status = $e->getMessage();
            $json = array(
                'error_message' => $status
            );
        }

        return view('result', ["title" => json_encode($json)]);
    }
}
