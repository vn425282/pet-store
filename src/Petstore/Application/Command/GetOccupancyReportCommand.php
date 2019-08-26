<?php

namespace Petstore\Application\Command;

use Petstore\Domain\Entity\SpacesForPet;

class GetOccupancyReportCommand
{
    private $space;
    /**
     * GetOccupancyReportCommand constructor.
     * @param array $rules
     */
    public function __construct(SpacesForPet $space)
    {
        $this->space = $space;
    }

    public function getListMaxForReport(){
        return $this->space->listMaxForReport();
    }
}
