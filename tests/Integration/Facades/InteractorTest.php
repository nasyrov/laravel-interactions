<?php

namespace Nasyrov\Laravel\Interactions\Tests\Integration\Facades;

use Nasyrov\Laravel\Interactions\Facades\Interactor as InteractorFacade;
use Nasyrov\Laravel\Interactions\Interactor;
use Nasyrov\Laravel\Interactions\Tests\Integration\TestCase;

class InteractorTest extends TestCase
{
    /** @test */
    public function it_provides_facade()
    {
        $this->assertInstanceOf(Interactor::class, InteractorFacade::getFacadeRoot());
    }
}
