<?php

namespace App\DataClasses;


class CarStatusesClass implements BaseDataClass
{
    const AVAILABLE = 1;
    const IN_SUBSCRIPTION = 2;

    public static function get(?int $item = null): mixed
    {
        $collection = collect([
            [
                'id' => self::AVAILABLE,
                'name' => trans('admin.available'),
            ],
            [
                'id' => self::IN_SUBSCRIPTION,
                'name' => trans('admin.in_subscription'),
            ]
        ]);

        if ($item) {
            return $collection->where('id', $item)->first();
        }

        return $collection;
    }
}
