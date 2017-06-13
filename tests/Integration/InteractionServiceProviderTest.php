<?php

namespace Nasyrov\Laravel\Interactions\Tests\Integration;

use Illuminate\Support\Facades\Artisan;
use Nasyrov\Laravel\Interactions\Console\InteractionMakeCommand;
use Nasyrov\Laravel\Interactions\Contracts\Interactor as InteractorContract;
use Nasyrov\Laravel\Interactions\Interactor;

class InteractionServiceProviderTest extends TestCase
{
    /** @test */
    public function it_registers_services()
    {
        $this->assertTrue($this->app->bound(Interactor::class));
        $this->assertTrue($this->app->bound(InteractorContract::class));

        $this->assertInstanceOf(Interactor::class, $this->app->make(Interactor::class));
        $this->assertInstanceOf(Interactor::class, $this->app->make(InteractorContract::class));

        $this->assertInstanceOf(InteractionMakeCommand::class, Artisan::all()['make:interaction']);
    }
}
