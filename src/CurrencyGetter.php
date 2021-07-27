<?php

declare(strict_types=1);

namespace Jaddek\Europabank\Stats;

use Jaddek\Europabank\Stats\DTO\EurofxrefDailyDTO;
use Jaddek\Europabank\Stats\DTO\RateDTO;

final class CurrencyGetter
{
    public static function getCurrencyRate(EurofxrefDailyDTO $eurofxrefDailyDTO, string $currency): RateDTO
    {
        $rate = $eurofxrefDailyDTO->getCurrencyRate($currency);
        
        if (!$rate instanceof RateDTO) {
            $supportedCurrencies = implode(', ', $eurofxrefDailyDTO->getSupportedCurrencies());
            throw new \RuntimeException(sprintf('Unsupported currency %s. Available are %s', $currency, $supportedCurrencies));
        }
        
        return $rate;
    }
}