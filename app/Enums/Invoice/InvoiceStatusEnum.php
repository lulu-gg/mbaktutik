<?php

declare(strict_types=1);

namespace App\Enums\Invoice;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class InvoiceStatusEnum extends Enum
{
    const Pending = 0;
    const Done = 1;
    const Cancel = 2;
}
