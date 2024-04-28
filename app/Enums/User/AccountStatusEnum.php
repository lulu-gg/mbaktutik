<?php declare(strict_types=1);

namespace App\Enums\User;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class AccountStatusEnum extends Enum
{
    const PendingActivate = 0;
    const Active = 1;
    const NonActive = 2;
}
