<?php

namespace App\Enums;

use App\Enums\Enum;

class IsFavorite extends Enum
{
    const YES = 1; //お気に入り
    const NO = 0; //非お気に入り

    protected static function values()
    {
        return [
            self::YES => 'お気に入り',
            self::NO => '非お気に入り',
        ];
    }
}
