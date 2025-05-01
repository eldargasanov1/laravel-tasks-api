<?php

namespace App\Enums;

interface Enum
{
    /**
     * @return array<int, string>
     */
    public static function values(): array;
}
