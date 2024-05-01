<?php

namespace Medboubazine\FacebookPixel\Core\Interfaces;

use Medboubazine\FacebookPixel\Elements\EventResponseElement;

interface EventsInterface
{
    /**
     * All ATrributes
     */
    public function push(): EventResponseElement;
}
