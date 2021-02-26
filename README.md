# EuropaBank reference to EUR rates http client 

```php
require_once ('vendor/autoload.php');

$client = new \Jaddek\Europabank\Stats\HttpClient(new \Symfony\Component\HttpClient\CurlHttpClient());
$provider = new \Jaddek\Europabank\Stats\Provider\EurofxrefDailyProvider($client);

try {
    $rates = $provider();
} catch (JsonException $e) {
} catch (\Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface $e) {
} catch (\Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface $e) {
} catch (\Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface $e) {
} catch (\Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface $e) {
}


print_r($rates->getRates());
print_r($rates->getCurrencyRate(\Jaddek\Europabank\Stats\SupportedCurrenciesInterface::USD));
```
