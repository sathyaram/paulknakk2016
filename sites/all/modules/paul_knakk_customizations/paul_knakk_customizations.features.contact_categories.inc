<?php
/**
 * @file
 * paul_knakk_customizations.features.contact_categories.inc
 */

/**
 * Implements hook_contact_categories_defaults().
 */
function paul_knakk_customizations_contact_categories_defaults() {
  return array(
    'Booking' => array(
      'category' => 'Booking',
      'recipients' => 'paul@harkland.com,management@paulknakk.com,info@paulknakk.com',
      'reply' => '',
      'weight' => 0,
      'selected' => 1,
    ),
  );
}
