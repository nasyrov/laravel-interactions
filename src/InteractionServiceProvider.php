<?php

namespace Nasyrov\Laravel\Interactions;

use Illuminate\Support\ServiceProvider;
use Nasyrov\Laravel\Interactions\Contracts\Interactor as InteractorContract;

class InteractionServiceProvider extends ServiceProvider
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
        $this->app->singleton(Interactor::class, function ($app) {
            return new Interactor($app);
        });

        $this->app->alias(Interactor::class, InteractorContract::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            Interactor::class,
            InteractorContract::class,
        ];
    }
}
