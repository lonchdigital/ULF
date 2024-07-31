<?php

namespace Modules\Cars\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use Modules\Cars\Models\Car;
use Illuminate\Routing\Controller;
use Modules\Cars\Services\Admin\CarsService;
use Modules\Cars\Http\Requests\Admin\CarUpdateRequest;


class CarsController extends Controller
{
    /**
    * @var CarsService
     */
   private CarsService $service;
   private const PER_PAGE = 10;

    public function __construct(CarsService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return view('cars::admin.index', [
            'cars' => $this->service->getLatestCars(self::PER_PAGE)
        ]);
    }
    public function edit(Car $car)
    {
        return view('cars::admin.edit', [
            'car' => $car
        ]);
    }

    public function update(Car $car, CarUpdateRequest $request)
    {
        return redirect()->route('car.edit', [
            'car' => $this->service->updateDocument($car, $request->all())
        ])->with('success', trans('admin.document_updated'));
    }

    public function deleteAllCars()
    {
        $this->service->removeAllDocuments();

        return redirect()->route('car.index', [
            'cars' => []
        ])->with('success', trans('admin.all_cars_has_been_deleted'));
    }

}
