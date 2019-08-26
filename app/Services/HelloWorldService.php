<?php

namespace App\Services;

use App\Repositories\HelloWorldRepository;
use Exception;
use JildertMiedema\LaravelTactician\DispatchesCommands;
use Petstore\Application\Command\CreateHelloWorldCommand;
use Petstore\Domain\HelloWorld;

class HelloWorldService
{
    use DispatchesCommands;

    /**
     * @var HelloWorldRepository
     */
    private $helloWorldRepository;

    public function __construct(
        HelloWorldRepository $helloWorldRepository
    ) {
        $this->helloWorldRepository = $helloWorldRepository;
    }


    /**
     * @param $data
     */
    public function setHelloWorld(HelloWorld $helloWorld)
    {
        return $this->dispatch(new CreateHelloWorldCommand($helloWorld));
    }
}
