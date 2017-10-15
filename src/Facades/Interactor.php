<?php

namespace Nasyrov\Laravel\Interactions\Facades;

use Illuminate\Support\Facades\Facade;
use Nasyrov\Laravel\Interactions\Contracts\Interactor as InteractorContract;

/**
 * @method static InteractorContract interact($interaction, array $parameters = [])
 *
 * @see InteractorContract
 */
class Interactor extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return InteractorContract::class;
    }
}
