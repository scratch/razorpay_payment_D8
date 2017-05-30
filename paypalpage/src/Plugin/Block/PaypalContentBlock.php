<?php

namespace Drupal\paypalpage\Plugin\Block;


use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Paypal Content' Block.
 *
 * @Block(
 *   id = "PaypalContentBlock",
 *   admin_label = @Translation("Paypal content type block"),
 * )
 */
class PaypalContentBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    /* RTFM: https://www.sitepoint.com/drupal-8-version-entityfieldquery/
     */
    try  {
      $query = \Drupal::entityQuery('node')
        ->condition('type', 'rp_payment_type_2')
        // ->condition('type', 'payment_block')
        ->condition('status', 1);
    } catch (\Exception $e)  {
        print("entityQuery() Exception: " . $e->getMessage());
    }

    /*
    if ($query == NULL || (function_exists($query->execute()) == FALSE))
      return NULL;
     */

    $nids = $query->execute();
    $nodes = node_load_multiple($nids);

    foreach ($nodes as $node)  {
      dpm($node);
    }

    return array(
      '#markup' => $this->t('Hello, Block World With Text!: ') . "entity_type, payment block" . var_dump($nids),
    );
  }
}

