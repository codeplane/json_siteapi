<?php

namespace Drupal\json_siteapi\Routing;

// Classes referenced in this class.
use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Listens to the dynamic route events.
 */
class SiteApiKeyRouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    // Overriding the default system.site_information_settings route
    // to load the form we have created.
    if ($route = $collection->get('system.site_information_settings')) {
      $route->setDefault('_form', 'Drupal\json_siteapi\Form\SiteApiKeySettingForm');
    }
  }

}
