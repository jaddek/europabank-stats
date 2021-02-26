<?php

declare(strict_types=1);

namespace Jaddek\Europabank\Stats;

interface SupportedCurrenciesInterface
{
    public const EUR = 'EUR';
    public const USD = 'USD';
    public const JPY = 'JPY';
    public const BGN = 'BGN';
    public const CZK = 'CZK';
    public const DKK = 'DKK';
    public const GBP = 'GBP';
    public const HUF = 'HUF';
    public const PLN = 'PLN';
    public const RON = 'RON';
    public const SEK = 'SEK';
    public const CHF = 'CHF';
    public const ISK = 'ISK';
    public const NOK = 'NOK';
    public const HRK = 'HRK';
    public const RUB = 'RUB';
    public const TRY = 'TRY';
    public const AUD = 'AUD';
    public const BRL = 'BRL';
    public const CAD = 'CAD';
    public const CNY = 'CNY';
    public const HKD = 'HKD';
    public const IDR = 'IDR';
    public const ILS = 'ILS';
    public const INR = 'INR';
    public const KRW = 'KRW';
    public const MXN = 'MXN';
    public const MYR = 'MYR';
    public const NZD = 'NZD';
    public const PHP = 'PHP';
    public const SGD = 'SGD';
    public const THB = 'THB';
    public const ZAR = 'ZAR';
    
    public const CURRENCIES = [
        self::ZAR,
        self::THB,
        self::SGD,
        self::NZD,
        self::MYR,
        self::MXN,
        self::KRW,
        self::INR,
        self::ILS,
        self::IDR,
        self::HKD,
        self::CNY,
        self::CAD,
        self::BRL,
        self::AUD,
        self::RUB,
        self::HRK,
        self::NOK,
        self::ISK,
        self::CHF,
        self::SEK,
        self::RON,
        self::PLN,
        self::HUF,
        self::GBP,
        self::DKK,
        self::CZK,
        self::BGN,
        self::JPY,
        self::USD,
    ];
}