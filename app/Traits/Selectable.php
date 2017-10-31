<?php

namespace App\Traits;

trait Selectable
{
    public static function getSelectList($value = 'name', $key = 'id'){
        return static::latest()->pluck($value, $key);
    }
}