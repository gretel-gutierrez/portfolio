<?php

namespace Drupal\encapsulation_demo\Service;

use Drupal\Core\Config\ConfigFactoryInterface;

/**
 * Class PriceCalculator.
 *
 * Demonstrates encapsulation: hides price logic inside a service.
 */
class PriceCalculator {

    protected $config;

    public function __construct(ConfigFactoryInterface $config_factory) {
        $this->config = $config_factory->get('encapsulation_demo.settings');
    }

    public function getDiscountedPrice(): float {
        $base = (float) $this->config->get('base_price');
        $discount = (float) $this->config->get('discount_rate');

        return $base * (1 - $discount);
    }
}