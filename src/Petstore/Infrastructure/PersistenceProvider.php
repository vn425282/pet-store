<?php

namespace Petstore\Infrastructure;

use Illuminate\Support\ServiceProvider;
use Petstore\Domain\HelloWorldRepositoryInterface;
use Petstore\Domain\Repository\PetRepositoryInterface;
use Petstore\Domain\Repository\SpaceRepositoryInterface;

class PersistenceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Petstore\Domain\Repository\PetRepositoryInterface',
            'Petstore\Infrastructure\Persistence\PetRepository'
        );

        $this->app->bind(
            'Petstore\Domain\Repository\SpaceRepositoryInterface',
            'Petstore\Infrastructure\Persistence\SpaceRepository'
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            HelloWorldRepositoryInterface::class,
            PetRepositoryInterface::class,
            SpaceRepositoryInterface::class
        ];
    }
}
