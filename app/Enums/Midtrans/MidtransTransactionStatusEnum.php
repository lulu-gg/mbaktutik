<?php

declare(strict_types=1);

namespace App\Enums\Midtrans;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class MidtransTransactionStatusEnum extends Enum
{
    const Pending = 'PENDING';
    const Success = 'SUCCESS';
    const Expired = 'EXPIRED';
    const Cancelled = 'CANCELLED';
}
