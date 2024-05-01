<?php

namespace Medboubazine\FacebookPixel\Core\Abstracts;

use Medboubazine\FacebookPixel\Core\Helpers\Str;

abstract class ElementsAbstract
{
    /**
     * Attributes
     *
     * @var array
     */
    protected array $attributes = [];
    /**
     * Methods
     *
     * @var array
     */
    protected array $methods = [];

    /**
     * Magic Call
     *
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        if (Str::startsWith($name, "set")) {
            $attribute_name = Str::snake(Str::substr($name, 3, 200));
            $this->attributes[$attribute_name] = ($arguments[0] ?? null);
            return $this;
        }
        if (Str::startsWith($name, "get")) {
            $attribute_name = Str::snake(Str::substr($name, 3, 200));
            return $this->attributes[$attribute_name] ?? null;
        }
        return null;
    }
    /**
     * All
     *
     * @return array
     */
    public function all()
    {
        return $this->attributes;
    }
}
