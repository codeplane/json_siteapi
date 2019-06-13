<?php

namespace Drupal\json_siteapi\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\node\Entity\Node;

/**
 * Class CustomRestController.
 */
class CustomRestController extends ControllerBase {

  /**
   * Function to render JSON response for nodes of type page.
   *
   * @param string $apikey
   *   A String passed from the request URL.
   * @param int $nid
   *   A integer passed from the request URL.
   *
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   *
   *   A Json Response containing Node info or Error Message
   */
  public function getPageNodes($apikey, $nid) {
    // Retrieve the siteapikey value from system.site configuration.
    $site_api_key = $this->config('system.site')->get('siteapikey');

    // Checking whether the api key from the url matches the site wide apikey.
    if ($apikey === $site_api_key) {

      // Checking for a valid node id.
      if ((is_numeric($nid) && $nid > 0)) {
        $node = Node::load($nid);

        // Checking whether the node is of page content type.
        if (!empty($node) && $node->getType() === 'page') {
          $node = Node::load($nid);
          $serializer = \Drupal::service('serializer');

          // Normalizes the node object to a set of arrays.
          $data = $serializer->normalize($node);

          // Return the JSON response of the normalized array.
          return new JsonResponse($data);
        }
        // Response when the node is not availabale or it is not
        // of the type page.
        else {
          $data = [
            'Message' => 'Access Denied : Invalid Node',
            'Reason' => 'Node does\'t exist or not of the type page.',
          ];
          return new JsonResponse($data);
        }
      }
      // Response when the node id is null or not a numeric value.
      else {
        $data = [
          'Message' => 'Access Denied : Invalid Node ID',
          'Reason' => 'Node Id is not a numeric value.',
        ];
        return new JsonResponse($data);

      }
    }
    // Response when the API keys doesn't match.
    else {
      $data = [
        'Message' => 'Access Denied : Ivalid API Key.',
        'Reason' => 'API keys doesn\'t match.',
      ];
      return new JsonResponse($data);
    }
  }

}
