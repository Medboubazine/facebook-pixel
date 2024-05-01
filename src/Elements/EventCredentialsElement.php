<?php

namespace Medboubazine\FacebookPixel\Elements;

use Medboubazine\FacebookPixel\Core\Abstracts\ElementsAbstact;
use Medboubazine\FacebookPixel\Core\Interfaces\ElementsInterface;

final class EventCredentialsElement extends ElementsAbstact implements ElementsInterface
{
    /**
     * Constructor
     *
     * @param string $pixel
     * @param string $access_token
     */
    public function __construct(string $pixel, string $access_token)
    {
        $this->setPixelId($pixel);
        $this->setAccessToken($access_token);
    }
}
