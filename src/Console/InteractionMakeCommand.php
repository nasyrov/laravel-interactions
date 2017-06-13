<?php

namespace Nasyrov\Laravel\Interactions\Console;

use Illuminate\Support\ServiceProvider;

class InteractionMakeCommand extends ServiceProvider
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:interaction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new interaction class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Interaction';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/interaction.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Interactions';
    }
}
