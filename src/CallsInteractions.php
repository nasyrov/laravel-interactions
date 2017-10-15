<?php

namespace Nasyrov\Laravel\Interactions;

use Nasyrov\Laravel\Interactions\Facades\Interactor;

trait CallsInteractions
{
    /**
     * Run the interaction.
     *
     * @param string $interaction
     * @param array  $parameters
     *
     * @return mixed
     */
    public function interact($interaction, array $parameters = [])
    {
        return Interactor::interact($interaction, $parameters);
    }
}
