<?php

declare(strict_types=1);

namespace App\Enums\Sponsors;

use BenSampo\Enum\Attributes\Description;
use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class SponsorStatusEnum extends Enum
{
    #[Description('Inactive')]
    const Inactive = 0;

    #[Description('Active')]
    const Active = 1;
}
