<?php

namespace Medboubazine\FacebookPixel\Events;

use Medboubazine\FacebookPixel\Elements\EventCredentialsElement;
use FacebookAds\Object\ServerSide\ActionSource;
use FacebookAds\Object\ServerSide\EventRequest;
use FacebookAds\Object\ServerSide\UserData;
use FacebookAds\Object\ServerSide\Event;
use FacebookAds\Api;
use Medboubazine\FacebookPixel\Elements\EventResponseElement;
use Medboubazine\FacebookPixel\Elements\Events\ProductElement;
use Medboubazine\FacebookPixel\Elements\Events\UserElement;

final class PageViewEvent
{
    /**
     * Constructor
     *
     * @param EventCredentialsElement $credentials
     */
    public function __construct(public EventCredentialsElement $credentials)
    {
        Api::init(null, null, $credentials->getAccessToken());
    }
    /**
     * Push event
     *
     * @param UserElement $user
     * @param ProductElement $product
     * @return void
     */
    public function push(UserElement $user, string $url): EventResponseElement
    {
        /**
         * =========================
         * User Data
         * =========================
         */
        $user_data = (new UserData())
            ->setClientIpAddress($user->getIp())
            ->setClientUserAgent($user->getUserAgent());

        (!$user->getFbc()) ?? $user_data->setFbc($user->getFbc());
        (!$user->getFbp()) ?? $user_data->setFbp($user->getFbp());
        (!$user->getEmail()) ?? $user_data->setEmail($user->getEmail());
        (!$user->getPhone()) ?? $user_data->setPhone($user->getPhone());
        /**
         * =========================
         * Event
         * =========================
         */
        $events = [
            (new Event())
                ->setEventName('PageView')
                ->setUserData($user_data)
                ->setEventSourceUrl($url)
                ->setEventTime(time())
                ->setActionSource(ActionSource::WEBSITE)
        ];

        $request = (new EventRequest($this->credentials->getPixelId()))
            ->setEvents($events);

        return new EventResponseElement($request->execute());
    }
}
