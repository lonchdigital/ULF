<?php

namespace Modules\Cars\Services\Web;

use Modules\Cars\Models\Car;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;



class WebService
{
    public function __construct()
    {

    }

    public function getCarsCatalog($perPage = 10): LengthAwarePaginator
    {
        $query = Car::query()->latest();
        return $query->paginate($perPage);
    }

}