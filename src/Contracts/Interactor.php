<?php

namespace Nasyrov\Laravel\Interactions\Contracts;

interface Interactor
{
    /**
     * Run the interaction.
     *
     * @param mixed $interaction
     * @param array $parameters
     *
     * @return mixed
     */
    public function interact($interaction, array $parameters = []);
}
