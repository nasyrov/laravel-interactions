<?php

namespace Nasyrov\Laravel\Interactions;

use Illuminate\Contracts\Container\Container;
use InvalidArgumentException;
use Nasyrov\Laravel\Interactions\Contracts\Interaction as InteractionContract;
use Nasyrov\Laravel\Interactions\Contracts\Interactor as InteractorContract;

class Interactor implements InteractorContract
{
    /**
     * The container implementation.
     *
     * @var Container
     */
    protected $container;

    /**
     * Create a new interactor instance.
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Dispatch an interaction to its appropriate handler.
     *
     * @param string $interaction
     * @param array  $parameters
     *
     * @return mixed
     */
    public function interact($interaction, array $parameters = [])
    {
        $interaction = $this->appendHandleMethod($interaction);

        list($class, $method) = explode('@', $interaction);

        $instance = $this->resolveInstance($class);

        return call_user_func_array([$instance, $method], $parameters);
    }

    /**
     * Append the interaction handle method.
     *
     * @param string $interaction
     * @param string $method
     *
     * @return string
     */
    protected function appendHandleMethod($interaction, $method = 'handle')
    {
        if (!str_contains($interaction, '@')) {
            $interaction .= '@' . $method;
        }

        return $interaction;
    }

    /**
     * Resolve the interaction instance.
     *
     * @param string $class
     *
     * @return InteractionContract
     */
    protected function resolveInstance($class)
    {
        $instance = $this->container->make($class);

        if (!$instance instanceof InteractionContract) {
            throw new InvalidArgumentException(sprintf(
                '`%s` is not a valid interaction.',
                $class
            ));
        }

        return $instance;
    }
}
