<?php

namespace Nasyrov\Laravel\Interactions;

use Nasyrov\Laravel\Interactions\Contracts\Interactor;

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
        return app(Interactor::class)->interact($interaction, $parameters);
    }
}
