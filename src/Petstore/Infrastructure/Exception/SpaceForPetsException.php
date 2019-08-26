<?php

namespace Petstore\Application\Infrastructure\Exception;

use DomainException;
use Throwable;

class SpaceForPetsException extends DomainException
{
    /**
     * @var string
     */
    private $id;
    /**
     * @var string
    */
    protected $message;

    /**
     * SpaceForPetsException constructor.
     * @param string $externalId
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($id, $message = "", $code = 0, Throwable $previous = null)
    {
        $this->id = $id;
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
}
