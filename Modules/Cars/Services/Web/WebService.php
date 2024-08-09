<?php

namespace Modules\Cars\Services\Web;

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
        $currentLocale = session()->get('language', 'uk');
        app()->setLocale($currentLocale);

        $query = Car::query()->latest();

        // pagination
        $requestPage = $request['pageNumber'] !== null ? (int) $request['pageNumber'] : 1;
        $currentPage = $request->input('page', $requestPage); // Current page

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
                'car_url' => route('car.single.page', ['slug' => $car->page->slug]),
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
