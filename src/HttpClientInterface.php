<?php

namespace Jaddek\Europabank\Stats;

use Symfony\Contracts\HttpClient\ResponseInterface;

interface HttpClientInterface
{
    public function eurofxrefDaily(array $options = []): ResponseInterface;
}
