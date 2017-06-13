<?php

namespace Nasyrov\Laravel\Interactions\Tests\Unit;

use Illuminate\Container\Container;
use InvalidArgumentException;
use Mockery;
use Nasyrov\Laravel\Interactions\Interactor;
use PHPUnit\Framework\TestCase;

class InteractorTest extends TestCase
{
    /** @var \Illuminate\Contracts\Container\Container */
    protected $container;

    /** @var \Nasyrov\Laravel\Interactions\Interactor */
    protected $interactor;

    protected function setUp()
    {
        $this->container = Mockery::mock(Container::class);
        $this->interactor = new Interactor($this->container);
    }

    protected function tearDown()
    {
        Mockery::close();
    }

    /** @test */
    public function it_dispatches_interaction()
    {
        $interaction = GoodInteractionFixture::class;

        $this->container
            ->shouldReceive('make')
            ->withArgs([$interaction])
            ->once()
            ->andReturn(new $interaction);

        $response = $this->interactor->interact($interaction);

        $this->assertEquals(GoodInteractionFixture::RESPONSE, $response);
    }

    /** @test */
    public function it_throws_exception()
    {
        $this->expectException(InvalidArgumentException::class);

        $interaction = BadInteractionFixture::class;

        $this->container
            ->shouldReceive('make')
            ->withArgs([$interaction])
            ->once()
            ->andReturn(new $interaction);

        $this->interactor->interact($interaction);
    }
}
