<?php

namespace Nasyrov\Laravel\Interactions\Tests\Unit;

use Nasyrov\Laravel\Interactions\Contracts\Interaction;

class GoodInteractionFixture implements Interaction
{
    const RESPONSE = 'good';

    public function handle()
    {
        return static::RESPONSE;
    }
}
