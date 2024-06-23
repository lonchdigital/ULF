<?php

namespace App\DataClasses;


class CarPopularityClass implements BaseDataClass
{
    const POPULAR = 1;
    const ORDINARY = 2;

    public static function get(?int $item = null): mixed
    {
        $collection = collect([
            [
                'id' => self::POPULAR,
                'name' => trans('admin.popular'),
            ],
            [
                'id' => self::ORDINARY,
                'name' => trans('admin.ordinary'),
            ]
        ]);

        if ($item) {
            return $collection->where('id', $item)->first();
        }

        return $collection;
    }
}
