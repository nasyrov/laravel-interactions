<?php

namespace Nasyrov\Laravel\Interactions;

use Nasyrov\Laravel\Interactions\Contracts\Interactor;

trait DispatchesInteractions
{
    /**
     * Dispatch an interaction to its appropriate handler.
     *
     * @param string $interaction
     * @param array  $parameters
     *
     * @return mixed
     */
    protected function dispatch($interaction, array $parameters = [])
    {
        return app(Interactor::class)->interact($interaction, $parameters);
    }
}
