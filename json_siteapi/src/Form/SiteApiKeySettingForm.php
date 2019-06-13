<?php

namespace Drupal\json_siteapi\Form;

use Drupal\Core\Form\FormStateInterface;

// This is the form we are extending.
use Drupal\system\Form\SiteInformationForm;

/**
 * Configure site information settings for this site.
 */
class SiteApiKeySettingForm extends SiteInformationForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // Retrieve the system.site configuration.
    $site_config = $this->config('system.site');

    // Get the original form from the class we are extending.
    $form = parent::buildForm($form, $form_state);

    // Add a textfield to the site information section for siteapikey field.
    $form['site_information']['siteapikey'] = [
      '#type' => 'textfield',
      '#title' => t('Site API Key'),
      '#description' => $this->t('The API key for accessing the endpoint'),
      '#default_value' => $site_config->get('siteapikey') ?: 'No API Key yet',
    ];
    // Changing text of the "Save configuration" to "Update Configuration".
    if (isset($form['actions']['submit'])) {
      $form['actions']['submit']['#value'] = t('Update Configuration');
    }
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // The siteapikey is retrieved from the submitted form values
    // and saved to the 'siteapikey' field of the system.site configuration.
    $this->config('system.site')
      ->set('siteapikey', $form_state->getValue('siteapikey'))
      ->save();
    // Display message to the user that the Site API Key has been saved with
    // the value given.
    \Drupal::messenger()->addStatus(t('The Site API Key has been saved with the value %apikey', ['%apikey' => $form_state->getValue('siteapikey')]));
    parent::submitForm($form, $form_state);
  }

}
