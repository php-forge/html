<?php

declare(strict_types=1);

namespace PHPForge\Html\Attribute\Component;

use Closure;

/**
 * Is used by widgets which implement the url collection.
 */
trait HasUrlCollection
{
    protected Closure|null $urlCreator = null;
    protected array $urlQueryParameters = [];
    protected string $urlPath = '';

    /**
     * Create the url for the route.
     *
     * @param Closure $value The url creator of the route.
     *
     * @return static A new instance of the current class with the specified url creator.
     */
    public function urlCreator(Closure $value): static
    {
        $new = clone $this;
        $new->urlCreator = $value;

        return $new;
    }

    /**
     * Set the url query parameters for the route.
     *
     * @param array $value The query parameters of the route.
     *
     * @return static A new instance of the current class with the specified url query parameters.
     */
    public function urlQueryParameters(array $value): static
    {
        $new = clone $this;
        $new->urlQueryParameters = $value;

        return $new;
    }

    /**
     * Set the url path for the route.
     *
     * @param string $value The url path of the route.
     *
     * @return static A new instance of the current class with the specified url path.
     */
    public function urlPath(string $value): static
    {
        $new = clone $this;
        $new->urlPath = $value;

        return $new;
    }
}
