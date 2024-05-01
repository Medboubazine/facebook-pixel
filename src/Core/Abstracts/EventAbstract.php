<?php

namespace Medboubazine\FacebookPixel\Core\Abstracts;

use Medboubazine\FacebookPixel\Elements\EventResponseElement;

abstract class EventAbstract
{
    /**
     * Event to be executed
     *
     * @var object
     */
    protected object $event;

    /**
     * Push
     *
     * @return EventResponseElement
     */
    public function push(): EventResponseElement
    {
        return new EventResponseElement($this->event->execute());
    }
}
