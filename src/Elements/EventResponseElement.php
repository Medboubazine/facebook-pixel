<?php

namespace Medboubazine\FacebookPixel\Elements;

use FacebookAds\Object\ServerSide\EventResponse;
use Medboubazine\FacebookPixel\Core\Abstracts\ElementsAbstact;
use Medboubazine\FacebookPixel\Core\Interfaces\ElementsInterface;

final class EventResponseElement extends ElementsAbstact implements ElementsInterface
{
    /**
     * Constructor
     *
     */
    public function __construct(EventResponse $response)
    {
        $this->setEventRecieved(boolval($response->getEventsReceived() ?? null));
        $this->setTraceId($response->getFbTraceId());
    }
}
