<?php

declare(strict_types=1);

namespace App\Enums\Orders;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class PaymentStatusEnum extends Enum
{
    const Pending = 0;
    const Done = 1;
    const Cancel = 2;
    const Error = 3;
}
