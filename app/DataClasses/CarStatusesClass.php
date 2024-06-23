<?php

namespace App\DataClasses;


class CarStatusesClass implements BaseDataClass
{
    const IN_SUBSCRIPTION = 1;
    const AVAILABLE = 2;

    public static function get(?int $item = null): mixed
    {
        $collection = collect([
            [
                'id' => self::IN_SUBSCRIPTION,
                'name' => trans('admin.in_subscription'),
            ],
            [
                'id' => self::AVAILABLE,
                'name' => trans('admin.available'),
            ]
        ]);

        if ($item) {
            return $collection->where('id', $item)->first();
        }

        return $collection;
    }
}
