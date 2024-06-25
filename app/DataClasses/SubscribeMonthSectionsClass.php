<?php

namespace App\DataClasses;


class SubscribeMonthSectionsClass implements BaseDataClass
{
    const SECTION_ID_ONE = 1;
    const SECTION_ID_TWO = 3;
    const SECTION_ID_THREE = 6;
    const SECTION_ID_FOUR = 12;
    const SECTION_ID_FIVE = 24;
    const SECTION_ID_SIX = 36;



    public static function get(?int $item = null): mixed
    {
        $collection = collect([
            [
                'id' => self::SECTION_ID_ONE,
                'name' => self::SECTION_ID_ONE,
            ],
            [
                'id' => self::SECTION_ID_TWO,
                'name' => self::SECTION_ID_TWO,
            ],
            [
                'id' => self::SECTION_ID_THREE,
                'name' => self::SECTION_ID_THREE,
            ],
            [
                'id' => self::SECTION_ID_FOUR,
                'name' => self::SECTION_ID_FOUR,
            ],
            [
                'id' => self::SECTION_ID_FIVE,
                'name' => self::SECTION_ID_FIVE,
            ],
            [
                'id' => self::SECTION_ID_SIX,
                'name' => self::SECTION_ID_SIX,
            ]
        ]);

        if ($item) {
            return $collection->where('id', $item)->first();
        }

        return $collection;
    }
}
