<?php

namespace App\DataClasses;


class CarLabelColorClass implements BaseDataClass
{
    const COLOR_ONE = 1;
    const COLOR_TWO = 2;

    public static function get(?int $item = null): mixed
    {
        $collection = collect([
            [
                'id' => self::COLOR_ONE,
                'color' => '#02afff',
                'name' => trans('admin.blue'),
            ],
            [
                'id' => self::COLOR_TWO,
                'color' => '#ff2a2a',
                'name' => trans('admin.red'),
            ]
        ]);

        if ($item) {
            return $collection->where('id', $item)->first();
        }

        return $collection;
    }
}
