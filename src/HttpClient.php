<?php

declare(strict_types=1);

namespace Jaddek\Europabank\Stats;

use Jaddek\Europabank\Stats\HttpClientInterface as EuropaBankHttpClientInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

final class HttpClient implements EuropaBankHttpClientInterface
{
    private const HOST = 'https://www.ecb.europa.eu';
    private const PATHS = [
        'eurofxrefDaily' => '/stats/eurofxref/eurofxref-daily.xml',
    ];
    
    private HttpClientInterface $client;
    
    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }
    
    private function getUrl(string $endpoint): string
    {
        if (empty(self::PATHS[$endpoint]) || !is_string(self::PATHS[$endpoint])) {
            throw new \RuntimeException(sprintf('Unexpected endpoint key %s', $endpoint));
        }
        
        return self::HOST.self::PATHS[$endpoint];
    }
    
    public function eurofxrefDaily(array $options = []): ResponseInterface
    {
        return $this->client->request('GET', $this->getUrl(__FUNCTION__), $options);
    }
}