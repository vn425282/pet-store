<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\PetService;
use App\Services\SpaceService;
use JildertMiedema\LaravelTactician\DispatchesCommands;
use Petstore\Domain\Entity\SpacesType;
use Petstore\Services\JsonDatabaseService;
use Exception;

class ReportController extends Controller
{
    use DispatchesCommands;

    private $petService;
    private $spaceService;

    public function __construct(PetService $petService, SpaceService $spaceService)
    {
        $this->petService = $petService;
        $this->spaceService = $spaceService;
    }

    public function getOccupancyReport(){
        try {
            $space = $this->spaceService->dispatchGetSpaceByStatus(SpacesType::BACKYARD);
            $result = $this->petService->dispatchGetOccupancyReport($space);
            $json = array(
                'occupancy_report' => JsonDatabaseService::removeNameSpaceAfterPushtoArray($result)
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
