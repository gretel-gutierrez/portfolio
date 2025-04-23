<?php
namespace Drupal\encapsulation_demo\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class EncapsulationSettingsForm extends ConfigFormBase {

  protected function getEditableConfigNames() {
    return ['encapsulation_demo.settings'];
  }

  public function getFormId() {
    return 'encapsulation_settings_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('encapsulation_demo.settings');

    $form['base_price'] = [
      '#type' => 'number',
      '#title' => $this->t('Base Price'),
      '#default_value' => $config->get('base_price') ?? 100,
      '#step' => 0.01,
    ];

    $form['discount_rate'] = [
      '#type' => 'number',
      '#title' => $this->t('Discount Rate'),
      '#description' => $this->t('Enter as decimal (e.g., 0.2 for 20%)'),
      '#default_value' => $config->get('discount_rate') ?? 0.15,
      '#step' => 0.01,
    ];

    return parent::buildForm($form, $form_state);
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('encapsulation_demo.settings')
      ->set('base_price', $form_state->getValue('base_price'))
      ->set('discount_rate', $form_state->getValue('discount_rate'))
      ->save();

    parent::submitForm($form, $form_state);
  }
}