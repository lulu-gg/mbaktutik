<?php

declare(strict_types=1);

namespace App\Enums\Withdrawl;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class WithdrawlStatusEnum extends Enum
{
    const Pending = 0;
    const Paid = 1;
    const Rejected = 2;
}
