<?php

namespace Medboubazine\FacebookPixel;

use Medboubazine\FacebookPixel\Elements\EventCredentialsElement;
use Medboubazine\FacebookPixel\Events\PageViewEvent;
use Medboubazine\FacebookPixel\Events\PurchaseEvent;

final class FacebookPixel
{
    /**
     * attributes
     *
     * @var EventCredentialsElement
     */
    public EventCredentialsElement $credentials;

    /**
     * Constructor
     *
     * @param string $pixel_id
     * @param string $accees_token
     */
    public function __construct(EventCredentialsElement $credentials)
    {
        $this->credentials = $credentials;
    }
    /**
     * Purchase event
     *
     * @return PurchaseEvent
     */
    public function purchase_event()
    {
        return new PurchaseEvent($this->credentials);
    }
    /**
     * Page view event
     *
     * @return PageViewEvent
     */
    public function page_view_event()
    {
        return new PageViewEvent($this->credentials);
    }
}
