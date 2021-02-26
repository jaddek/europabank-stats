<?php

declare(strict_types=1);

namespace Jaddek\Europabank\Stats;

use Jaddek\Europabank\Stats\DTO\EurofxrefDailyDTO;
use Jaddek\Europabank\Stats\DTO\RateDTO;

final class CurrencyGetter
{
    public static function getCurrencyRate(EurofxrefDailyDTO $eurofxrefDailyDTO, string $currency): RateDTO
    {
        if ($currency === SupportedCurrenciesInterface::EUR) {
            throw new \RuntimeException('There not reference to EUR-EUR rate. Maybe they are equal?');
        }
        
        $rate = $eurofxrefDailyDTO->getCurrencyRate($currency);
        
        if (!$rate instanceof RateDTO) {
            $supportedCurrencies = implode(', ', $eurofxrefDailyDTO->getSupportedCurrencies());
            throw new \RuntimeException(sprintf('Unsupported currency %s. Available are %s', $currency, $supportedCurrencies));
        }
        
        return $rate;
    }
}