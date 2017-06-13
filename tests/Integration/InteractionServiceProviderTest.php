<?php

namespace Nasyrov\Laravel\Interactions\Tests\Integration;

use Nasyrov\Laravel\Interactions\Contracts\Interactor as InteractorContract;
use Nasyrov\Laravel\Interactions\Interactor;

class InteractionServiceProviderTest extends TestCase
{
    /** @test */
    public function it_registers_the_services()
    {
        $this->assertTrue($this->app->bound(Interactor::class));
        $this->assertTrue($this->app->bound(InteractorContract::class));

        $this->assertInstanceOf(Interactor::class, $this->app->make(Interactor::class));
        $this->assertInstanceOf(Interactor::class, $this->app->make(InteractorContract::class));
    }
}
