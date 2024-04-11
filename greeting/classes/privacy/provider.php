<?php

declare(strict_types=1);

namespace greeting\privacy;

use core_privacy\local\metadata\null_provider;

final class provider implements null_provider
{
    public static function get_reason(): string
    {
        return 'privacy:metadata';
    }
}