<?php

namespace Drupal\encapsulation_demo\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\encapsulation_demo\Service\PriceCalculator;

/**
 * Class PriceController.
 *
 * Demonstrates encapsulation: hides price logic inside a service.
 */
class PriceController extends ControllerBase {

    /**
     * The price calculator service.
     *
     * Instead of calculating prices directly inside the controller,
     * we delegate the logic to an encapsulated service.
     */
    protected PriceCalculator $priceCalculator;

    /**
     * Injects the PriceCalculator service.
     *
     * Using constructor injection allows the controller to access the
     * service without creating it manually. Drupal handles the instantiation.
     */
    public function __construct(PriceCalculator $priceCalculator) {
        $this->priceCalculator = $priceCalculator;
    }

    /**
     * Creates the controller instance with dependencies.
     *
     * This method is required to support dependency injection in Drupal.
     * It retrieves the price calculator service from the container.
     */
    public static function create(ContainerInterface $container) {
        return new static(
            $container->get('encapsulation_demo.price_calculator')
        );
    }

    /**
     * Displays the final price.
     *
     * The controller does not know how the price is calculated.
     * It only uses the public method from the encapsulated service.
     * This demonstrates encapsulation: logic is hidden and exposed via a clean interface.
     */
    public function showPrice() {
        $price = $this->priceCalculator->getDiscountedPrice();

        return [
        '#markup' => $this->t('Final price after discount: $@price', ['@price' => number_format($price, 2)]),
        ];
    }

}