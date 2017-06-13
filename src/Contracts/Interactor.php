<?php

namespace Nasyrov\Laravel\Interactions\Contracts;

interface Interactor
{
    /**
     * Dispatch an interaction to its appropriate handler.
     *
     * @param mixed $interaction
     * @param array $parameters
     *
     * @return mixed
     */
    public function interact($interaction, array $parameters = []);
}
