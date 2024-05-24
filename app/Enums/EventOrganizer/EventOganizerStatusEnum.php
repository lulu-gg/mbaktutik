<?php

declare(strict_types=1);

namespace App\Enums\EventOrganizer;

use BenSampo\Enum\Attributes\Description;
use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class EventOganizerStatusEnum extends Enum
{
    #[Description('Waiting for Approval')]
    const WaitingApproval = 0;

    const Active = 1;
}
