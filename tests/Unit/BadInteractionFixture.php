<?php

namespace Nasyrov\Laravel\Interactions\Tests\Unit;

class BadInteractionFixture
{
    const RESPONSE = 'bad';

    public function handle()
    {
        return static::RESPONSE;
    }
}
