<?php

declare(strict_types=1);

namespace Jaddek\Europabank\Stats\DTO;

final class RateDTO
{
    private string $currency;
    private string $rate;
    
    public function __construct(string $currency, string $rate)
    {
        $this->currency = $currency;
        $this->rate     = $rate;
    }
    
    public function getCurrency(): string
    {
        return $this->currency;
    }
    
    public function getRate(): string
    {
        return $this->rate;
    }
}
