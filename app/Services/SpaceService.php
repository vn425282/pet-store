<?php

namespace App\Services;

use JildertMiedema\LaravelTactician\DispatchesCommands;
use Petstore\Application\Command\GetSpaceByTypeCommand;

class SpaceService
{
    use DispatchesCommands;

    /**
     * @param $petStatus
     */
    public function dispatchGetSpaceByStatus(int $spaceType)
    {
        return self::dispatch(new GetSpaceByTypeCommand($spaceType));
    }
}
