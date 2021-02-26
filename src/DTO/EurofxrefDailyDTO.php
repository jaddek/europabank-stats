<?php

declare(strict_types=1);

namespace Jaddek\Europabank\Stats\DTO;

final class EurofxrefDailyDTO
{
    private array $rates;
    
    public function __construct(array $rates)
    {
        $this->rates = $rates;
    }
    
    public function getCurrencyRate(string $currency): ?RateDTO
    {
        return $this->rates[$currency] ?? null;
    }
    
    public function getRates(): array
    {
        return $this->rates;
    }
    
    public function getSupportedCurrencies(): array
    {
        return array_keys($this->rates);
    }
}