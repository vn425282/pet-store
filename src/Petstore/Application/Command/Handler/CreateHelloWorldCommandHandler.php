<?php

namespace Petstore\Application\Command\Handler;

use Petstore\Application\Command\CreateHelloWorldCommand;
use Petstore\Domain\HelloWorldRepositoryInterface;

class CreateHelloWorldCommandHandler
{
    /** @var HelloWorldRepositoryInterface */
    private $helloWorldRepositoryInterface;

    /**
     * CreateHelloWorldCommandHandler constructor.
     * @param HelloWorldRepositoryInterface $helloWorldRepositoryInterface
     */
    public function __construct(HelloWorldRepositoryInterface $helloWorldRepositoryInterface)
    {
        $this->helloWorldRepositoryInterface = $helloWorldRepositoryInterface;
    }

    /**
     * @param CreateHelloWorldCommand $command
     */
    public function handle(CreateHelloWorldCommand $command)
    {
        $oldModel = $this->helloWorldRepositoryInterface->checkExist();
        $newModel = $command->getHelloWorld();
        if($oldModel){
            $helloWorldModel = $this->helloWorldRepositoryInterface->get($command->getHelloWorld()->helloWorld);
            if(!$helloWorldModel){
                return $this->updateHelloCommand($oldModel, $newModel);
            }
        }else{
            return $this->createHelloCommand($newModel);
        }
    }

    private function createHelloCommand($newModel)
    {
        return $this->helloWorldRepositoryInterface->setData($newModel);
    }

    private function updateHelloCommand($oldModel, $newModel)
    {
        return $this->helloWorldRepositoryInterface->updateData($oldModel, $newModel);
    }
}
