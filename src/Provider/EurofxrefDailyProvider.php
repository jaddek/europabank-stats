<?php

declare(strict_types=1);

namespace Jaddek\Europabank\Stats\Provider;

use Jaddek\Europabank\Stats\DTO\EurofxrefDailyDTO;
use Jaddek\Europabank\Stats\DTO\RateDTO;
use Jaddek\Europabank\Stats\HttpClientInterface;

final class EurofxrefDailyProvider
{
    private HttpClientInterface $client;
    
    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }
    
    /**
     * @param  array  $options
     * @return EurofxrefDailyDTO
     * @throws \JsonException
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function __invoke(array $options = []): EurofxrefDailyDTO
    {
        $response = $this->client->eurofxrefDaily($options);
        
        $rates = $this->parseContent($response->getContent());
        
        return new EurofxrefDailyDTO($rates);
    }
    
    private function parseContent(string $content): array
    {
        $rates    = [];
        $document = \simplexml_load_string($content);
        
        $json  = \json_encode($document, JSON_THROW_ON_ERROR);
        $data = \json_decode($json, true, 512, JSON_THROW_ON_ERROR);
        
        foreach ($data['Cube']['Cube']['Cube'] ?? [] as $rate) {
            if (empty($rate['@attributes']['rate']) || !is_string($rate['@attributes']['rate'])) {
                continue;
            }
            
            if (empty($rate['@attributes']['currency']) || !is_string($rate['@attributes']['currency'])) {
                continue;
            }
            
            $rates[$rate['@attributes']['currency']] = new RateDTO($rate['@attributes']['currency'], $rate['@attributes']['rate']);
        }
        
        return $rates;
    }
}