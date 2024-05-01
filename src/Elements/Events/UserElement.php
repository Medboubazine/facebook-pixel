<?php

namespace Medboubazine\FacebookPixel\Elements\Events;

use Medboubazine\FacebookPixel\Core\Abstracts\ElementsAbstract;
use Medboubazine\FacebookPixel\Core\Interfaces\ElementsInterface;

final class UserElement extends ElementsAbstract implements ElementsInterface
{
    /**
     * Constructor
     *
     */
    public function __construct(string $ip, string $user_agent, ?string $email = null, ?string $phone = null, ?string $fbc = null, ?string $fbp = null)
    {
        $this->setIp($ip);
        $this->setUserAgent($user_agent);
        $this->setEmail($email);
        $this->setPhone($phone);
        $this->setFbc($fbc);
        $this->setFbp($fbp);
    }
}
