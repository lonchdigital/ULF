<?php

namespace Modules\Cars\Services\Web;

use App\Helpers\MultiLangRoute;
use Modules\Cars\Models\Car;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;



class WebService
{
    const PER_PAGE = 6;

    public function __construct()
    {

    }

    public function getCarsCatalog($perPage = 10): LengthAwarePaginator
    {
        $query = Car::query()->latest();
        return $query->paginate($perPage);
    }

    public function getFilteredPosts(Request $request): array
    {
        $currentLocale = session()->get('language', 'ua');
        app()->setLocale($currentLocale);

        $filters = $request->all()['filters'];
        $query = Car::query();

        // dd($filters);

        if (!empty($filters['manufacturer'])) {
            $query->whereHas('vehicle.model.manufacturer', function ($query) use ($filters) {
                $query->where('id', $filters['manufacturer']);
            });
        }
        if (!empty($filters['model'])) {
            $query->whereHas('vehicle', function ($query) use ($filters) {
                $query->where('model_id', $filters['model']);
            });
        }


        if(!empty($filters['priceMin']) && !empty($filters['priceMax'])) {
            $query->whereHas('subscribePrices', function ($q) use ($filters) {
                $q->where('section_id', 1);
                $q->whereBetween('monthly_payment', [$filters['priceMin'], $filters['priceMax']]);
            });
        }


        if(!empty($filters['yearFrom']) && !empty($filters['yearTo'])) {
            $query->whereHas('vehicle', function ($query) use ($filters) {
                $query->whereBetween('manufacturedYear', [$filters['yearFrom'], $filters['yearTo']]);
            });
        } elseif (!empty($filters['yearFrom'])) {
            $query->whereHas('vehicle', function ($query) use ($filters) {
                $query->where('manufacturedYear', '>=', $filters['yearFrom']);
            });
        } elseif (!empty($filters['yearTo'])) {
            $query->whereHas('vehicle', function ($query) use ($filters) {
                $query->where('manufacturedYear', '<=', $filters['yearTo']);
            });
        }

        if(!empty($filters['engineFrom']) && !empty($filters['engineTo'])) {
            $query->whereHas('vehicle', function ($query) use ($filters) {
                $query->whereBetween('engineVolume', [$filters['engineFrom'], $filters['engineTo']]);
            });
        } elseif (!empty($filters['engineFrom'])) {
            $query->whereHas('vehicle', function ($query) use ($filters) {
                $query->where('engineVolume', '>=', $filters['engineFrom']);
            });
        } elseif (!empty($filters['engineTo'])) {
            $query->whereHas('vehicle', function ($query) use ($filters) {
                $query->where('engineVolume', '<=', $filters['engineTo']);
            });
        }

        if (!empty($filters['fuelType'])) {
            $query->whereHas('vehicle', function ($query) use ($filters) {
                $query->where('fuel_type_id', $filters['fuelType']);
            });
        }
        if (!empty($filters['bodyTypes'])) {
            $query->whereHas('vehicle', function ($query) use ($filters) {
                $query->whereIn('type_id', $filters['bodyTypes']);
            });
        }
        if (!empty($filters['driverTypes'])) {
            $query->whereHas('vehicle', function ($query) use ($filters) {
                $query->whereIn('driver_type_id', $filters['driverTypes']);
            });
        }

        if ($filters['orderValue'] !== null) {
            if ($filters['orderValue'] === 'price_up') {
                $query->select('cars.*')
                    ->join('subscribe_prices', function($join) {
                        $join->on('cars.id', '=', 'subscribe_prices.car_id')
                            ->where('subscribe_prices.section_id', '=', 1);
                    })
                    ->orderBy('subscribe_prices.monthly_payment', 'asc');
            } elseif ($filters['orderValue'] === 'price_down') {
                $query->select('cars.*')
                    ->join('subscribe_prices', function($join) {
                        $join->on('cars.id', '=', 'subscribe_prices.car_id')
                            ->where('subscribe_prices.section_id', '=', 1);
                    })
                    ->orderBy('subscribe_prices.monthly_payment', 'desc');
            } elseif ($filters['orderValue'] === 'popularity_up') {
                $query->orderByRaw('COALESCE(sort_by_popularity_id, 999999) ASC');
            } elseif ($filters['orderValue'] === 'popularity_down') {
                $query->orderByRaw('COALESCE(sort_by_popularity_id, 0) DESC');
            }
        }
        $query->orderByRaw("CASE WHEN status_id = 2 THEN 1 ELSE 0 END")
            ->orderBy('id', 'asc');


        // pagination
        $requestPage = $request['pageNumber'] !== null ? (int) $request['pageNumber'] : 1;
        $currentPage = $request->input('page', $requestPage);

        $postTypeDocuments = $query->paginate(self::PER_PAGE, ['*'], 'page', $currentPage)->onEachSide(0);
        $postTypeItems = $postTypeDocuments->items();

        $results = new LengthAwarePaginator($postTypeDocuments->items(), $postTypeDocuments->total(), self::PER_PAGE, $currentPage);
        $results->onEachSide(0);
        $results->setPath($request->fullUrl());
        $paginationHtml = $results->onEachSide(3)->links('vendor.pagination.default')->toHtml();

        $postTypeDocuments = $this->getDocumentsAdditional($postTypeItems);

        return [
            'paginationHTML' => $paginationHtml,
            'documents' => $postTypeDocuments,
        ];
    }

    private function getDocumentsAdditional($cars)
    {
        foreach ($cars as $car) {

            $monthly_payment = (count($car->subscribePrices) > 0 && !is_null($car->subscribePrices->where('section_id', 1)->first()->monthly_payment)) ?
                $car->subscribePrices->where('section_id', 1)->first()->monthly_payment : null;

            $car['car_additional'] = [
                'car_name' => $car->getFullName(),
                'car_url' => MultiLangRoute::getMultiLangRoute('car.single.page', ['slug' => $car->page->slug]),
                'car_short_desc' => $car->getShortDesc(),
                'car_image_url' => $car->getMainImageUrl(),
                'car_label' => $car->label,
                'car_label_color_id' => $car->label_color_id,
                'monthly_payment' => $monthly_payment,
            ];
        }

        return $cars;
    }

}
