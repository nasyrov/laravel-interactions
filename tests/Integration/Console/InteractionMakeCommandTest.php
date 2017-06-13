<?php

namespace Nasyrov\Laravel\Enums\Console;

use Illuminate\Support\Facades\Artisan;
use Nasyrov\Laravel\Interactions\Tests\Integration\TestCase;

class InteractionMakeCommandTest extends TestCase
{
    /** @test */
    public function it_can_run_the_command()
    {
        $exitCode = Artisan::call('make:interaction', ['name' => 'TestInteraction']);

        $this->assertEquals(0, $exitCode);
        $this->assertContains('Interaction created successfully', Artisan::output());
    }
}
