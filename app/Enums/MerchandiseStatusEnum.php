<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class MerchandiseStatusEnum extends Enum
{
    const AVAILABLE = 1;
    const OUT_OF_STOCK = 0;

    public static function getDescription($value): string
    {
        switch ($value) {
            case self::AVAILABLE:
                return 'Available';
            case self::OUT_OF_STOCK:
                return 'Out of Stock';
            default:
                return self::getKey($value);
        }
    }
}
