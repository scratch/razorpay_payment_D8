<?php
/**
 * @file
 * Contains \Drupal\paypalpage\Controller\paypaypageController class
 */

namespace Drupal\paypalpage\Controller;
use Drupal\Core\Controller\ControllerBase;

class paypalpageController extends ControllerBase {
  /**
   * Returns markup for paypal page
   */
  public function paypalPage()  {
    return [
      '#markup' => t('Welcome to my custom paypal page!'),
    ];
  }
}
?>
