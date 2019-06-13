# JSON Site API
</br>
<h2>Synopsis</h2>

JSON Site API module allows the administrator to set up a Site-wide API key to access the custom endpoint to get the JSON response of the nodes belonging to the page content type.

<h2>Usage</h2>

Once the module is enabled, the admin  (or) the user with the privilege can access the site information page and set up an API key to access the endpoint. 

This module is dependant on the <code>Drupal Core: Serialization</code> module to render the node values.

<h2>Configuration</h2>

1. To set the API key navigate to
 <code>/admin/config/system/site-information</code>
 
2. Provide the API key to the <code>Site API Key</code> field under the site
  details section, to set up a site-wide API key.
  
3. Access the below endpoint to get the JSON response.
 <code> http(s)://&lt;site_name&gt;/page_json/&lt;api_key&gt;/&lt;node_id&gt; </code>
 
 <h2>References</h2>
 
 
<a href="http://www.jaypan.com/tutorial/drupal-8-extending-core-configuration-extending-core-forms-and-overriding-core-routes">Drupal 8: Extending Core Configuration</a>

<a href="https://www.mediacurrent.com/blog/building-rest-endpoints-drupal-8/">Building REST Endpoints</a>

<a href="https://api.drupal.org/api/drupal/vendor%21symfony%21http-foundation%21JsonResponse.php/class/JsonResponse/8.2.x">Drupal 8: JsonResponse</a>

<a href="https://api.drupal.org/api/drupal/vendor%21symfony%21serializer%21Serializer.php/function/Serializer%3A%3Anormalize/8.2.x">Function Serializer::normalize</a>

<a href="https://github.com/devtaher/siteapi">Site API</a>


Research : 3 hrs

Implementation : 2 hrs

Total Effort : 5hrs









