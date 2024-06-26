<?php

namespace Medboubazine\FacebookPixel\Elements\Events;

use Medboubazine\FacebookPixel\Core\Abstracts\ElementsAbstract;
use Medboubazine\FacebookPixel\Core\Interfaces\ElementsInterface;

final class ProductElement extends ElementsAbstract implements ElementsInterface
{
    /**
     * Constructor
     *
     */
    public function __construct(string $id, int $quantity, string $amount, string $currency, string $url)
    {
        $this->setId($id);
        $this->setQuantity($quantity);
        $this->setAmount($amount);
        $this->setCurrency($currency);
        $this->setUrl($url);
    }
}
