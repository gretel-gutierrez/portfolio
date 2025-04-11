<?php

declare(strict_types=1);

namespace Drupal\hello_journey\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for Hello Journey routes.
 */
class HelloJourneyController extends ControllerBase {

  /**
   * Builds the response.
   */

  public function content() {
    $build = [
      '#markup' => $this->t('Hello Controller!'),
    ];
    return $build;
  }

}
