<?php

namespace Modules\Cars\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use Modules\Cars\Models\Car;
use Modules\Cars\Models\CarPage;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Modules\Cars\Services\Admin\CarsService;
use Modules\Cars\Http\Requests\Admin\CarUpdateRequest;


class CarsController extends Controller
{
    /**
    * @var CarsService
     */
   private CarsService $service;
   private const PER_PAGE = 20;

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


    // Index CAR page edit and update
    public function editIndexPage()
    {
        return view('cars::admin.edit-index', [
            'carsPage' => CarPage::where('slug', 'cars')->first()
        ]);
    }
    public function updateIndexPage(CarPage $page, Request $request)
    {
        return redirect()->route('car.index.page', [
            'carsPage' => $this->service->updateCarIndex($page, $request->all())
        ])->with('success', trans('admin.document_updated'));
    }


    // API
    public function getAllCars()
    {
        return response()->json(Car::all());
    }

    public function addOrUpdateCar(Request $request)
    {
        $this->service->addCarFromApi($request->all());
    }

    public function removeCar(Request $request)
    {
        try {
            $request->validate([
                'lot_id' => 'required|integer'
            ]);
        } catch (\Exception $e) {
            Log::error('Create/Update Car failed', ['error' => $e->getMessage()]);
            abort(500, 'Internal Server Error');
        }

        $this->service->removeOneCar($request->all()['lot_id']);
    }

    public function updateDirectories(Request $request)
    {
        try {
            $request->validate([
                'directories_list' => 'required|array'
            ]);
        } catch (\Exception $e) {
            Log::error('Error!', ['error' => $e->getMessage()]);
            abort(500, 'Internal Server Error');
        }

        $this->service->updateAllDirectories($request->all()['directories_list']);
    }

}
