<?php

namespace Medboubazine\FacebookPixel\Events;

use Medboubazine\FacebookPixel\Elements\EventCredentialsElement;
use FacebookAds\Object\ServerSide\ActionSource;
use FacebookAds\Object\ServerSide\EventRequest;
use FacebookAds\Object\ServerSide\UserData;
use FacebookAds\Object\ServerSide\Event;
use FacebookAds\Api;
use Medboubazine\FacebookPixel\Core\Abstracts\EventAbstract;
use Medboubazine\FacebookPixel\Core\Interfaces\EventsInterface;
use Medboubazine\FacebookPixel\Elements\Events\UserElement;

final class PageViewEvent extends EventAbstract implements EventsInterface
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
     * Prepare event to push
     *
     * @param UserElement $user
     * @param string $url
     * @return EventRequest
     */
    public function handle(UserElement $user, string $url): self
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

        $this->event = (new EventRequest($this->credentials->getPixelId()))->setEvents($events);

        return $this;
    }
}
