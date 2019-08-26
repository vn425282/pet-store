<?php

namespace Petstore\Domain\Entity;

class ShopInfo
{
    /**
     * @var string
     */
    private $id;
    /**
     * @var string
     */
    private $owner;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $open;
    /**
     * @var string
     */
    private $dayOpen;

    public function __construct(
        string $id,
        string $owner,
        string $name,
        string $open,
        string $dayOpen
    ) {
        $this->id = $id;
        $this->owner = $owner;
        $this->name = $name;
        $this->open = $open;
        $this->dayOpen = $dayOpen;
    }

    public function shopId(): string
    {
        return $this->id;
    }

    public function shopOpen(): string
    {
        return $this->open;
    }

    public function dayOpen(): string
    {
        return $this->dayOpen;
    }
}
