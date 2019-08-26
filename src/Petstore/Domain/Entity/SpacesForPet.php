<?php

namespace Petstore\Domain\Entity;

class SpacesForPet
{
    /**
     * @var string
     */
    private $id;
    /**
     * @var int
     */
    private $maxDogs;
    /**
     * @var int
     */
    private $maxCats;
    /**
     * @var int
     */
    private $maxBirds;
    /**
     * @var array
     */
    private $listPet;
    /**
     * @var int
    */
    private $spaceType;

    public function __construct(
        string $id,
        ?int $maxDogs,
        ?int $maxCats,
        ?int $maxBirds,
        array $listPet,
        int $spaceType
    ) {
        $this->id = $id;
        $this->maxDogs = $maxDogs;
        $this->maxCats = $maxCats;
        $this->maxBirds = $maxBirds;
        $this->listPet = $listPet;
        $this->spaceType = $spaceType;
    }

    public function spaceId(): string
    {
        return $this->id;
    }

    public function spaceType(): int
    {
        return $this->spaceType;
    }

    public function maxDogs(): int
    {
        return $this->maxDogs;
    }

    public function maxCats(): int
    {
        return $this->maxCats;
    }

    public function maxBirds(): int
    {
        return $this->maxBirds;
    }

    public function listPet(): array
    {
        return $this->listPet;
    }

    public function listMaxForReport(): array
    {
        return [
            'maxDogs' => $this->maxDogs,
            'maxCats' => $this->maxCats,
            'maxBirds' => $this->maxBirds
        ];
    }

    public function numberOfCurrentPetInSpace(): int
    {
        return sizeof($this->listPet);
    }

    public function maxPetsInSpace(): int
    {
        return $this->maxDogs + $this->maxCats + $this->maxBirds;
    }
}
