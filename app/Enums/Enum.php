<?php

namespace App\Enums;

abstract class Enum
{
    abstract protected static function values();

    /**
     * キー、値の連想配列を返す
     *
     * @return array
     */
    public static function all(): array
    {
        return static::values();
    }

    public static function get($key)
    {
        $values = static::values();
        return $values[$key] ?? null;
    }
}
