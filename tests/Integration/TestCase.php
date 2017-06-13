<?php

namespace Nasyrov\Laravel\Interactions\Tests\Integration;

use Nasyrov\Laravel\Interactions\InteractionServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            InteractionServiceProvider::class,
        ];
    }
}
