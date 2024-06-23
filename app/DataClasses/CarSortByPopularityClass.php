<?php

namespace App\DataClasses;


class CarSortByPopularityClass implements BaseDataClass
{
    const SORT_ONE = 1;
    const SORT_TWO = 2;
    const SORT_THREE = 3;
    const SORT_FOUR = 4;
    const SORT_FIVE = 5;

    public static function get(?int $item = null): mixed
    {
        $collection = collect([
            [
                'id' => self::SORT_ONE,
                'name' => self::SORT_ONE,
            ],
            [
                'id' => self::SORT_TWO,
                'name' => self::SORT_TWO,
            ],
            [
                'id' => self::SORT_THREE,
                'name' => self::SORT_THREE,
            ],
            [
                'id' => self::SORT_FOUR,
                'name' => self::SORT_FOUR,
            ],
            [
                'id' => self::SORT_FIVE,
                'name' => self::SORT_FIVE,
            ]
        ]);

        if ($item) {
            return $collection->where('id', $item)->first();
        }

        return $collection;
    }
}
