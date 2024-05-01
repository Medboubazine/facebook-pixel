```php

use Medboubazine\FacebookPixel\Elements\EventCredentialsElement;
use Medboubazine\FacebookPixel\Elements\Events\ProductElement;
use Medboubazine\FacebookPixel\Elements\Events\UserElement;
use Medboubazine\FacebookPixel\FacebookPixel;

require "../vendor/autoload.php";

$pixel_id = 'DATASET_ID';//PIXEL_ID
$access_token = 'ACCESS_TOKEN';

$pixel = new FacebookPixel(new EventCredentialsElement($pixel_id, $access_token));

///
/// PageView Event
///
$event = $pixel->page_view_event();

$user = new UserElement("IP", "UserAgent");

$response = $event->push($user, "URL_HERE");
///
/// Purchase Event
///
$event = $pixel->purchase_event();

$user = new UserElement("IP", "UserAgent");
$product = new ProductElement("21", 1, "20.34", "usd", "URL_HERE");

$response = $event->push($user, $product);


```
