<?php

declare(strict_types=1);

namespace App\Enums\Tickets;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class TicketStatusEnum extends Enum
{
    const Pending = 0;
    const Active = 1;
    const Scanned = 2;
}
