<?php

namespace Modules\Cars\Services\Admin;

use Illuminate\Support\Str;
use Modules\Cars\Models\Car;
use Illuminate\Http\UploadedFile;
use Modules\Cars\Models\CarImage;
use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CarBaseService
{
    protected PageService $pageService;
    protected CarVehicleService $carVehicleService;
    protected const CAR_IMAGES_FOLDER = 'car-images';

    public function __construct(
        PageService $pageService,
        CarVehicleService $carVehicleService
        )
    {
        $this->pageService = $pageService;
        $this->carVehicleService = $carVehicleService;
    }


    public function updateCarImagesApi(array $images, Car $car)
    {
        // remove all OLD images
        if(count($car->images) > 0) {
            foreach ($car->images as $image) {
                deleteImage($image->Url);
                $image->delete();
            }
        }

        // download and set new images
        foreach($images as $image) {
            $response = Http::get($image['url']);

            if ($response->successful()) {
                // save to temporary folder
                $tempFilePath = tempnam(sys_get_temp_dir(), 'image');
                file_put_contents($tempFilePath, $response->getBody());

                $imagePath = self::CAR_IMAGES_FOLDER . '/'  . sha1(time()) . '_' . Str::random(10);
                storeImage($imagePath, new UploadedFile($tempFilePath, 'image'), 'webp');
                storeImage($imagePath, new UploadedFile($tempFilePath, 'image'), 'jpg');
                unlink($tempFilePath);

                CarImage::create([
                    'car_id' => $car->id,
                    'Url' => $imagePath . '.webp',
                    'TypeId' => $image['typeId']
                ]);
            }
        }

    }

    /**
     * Validate Lot data.
     *
     * @param array $lot
     * @throws \Exception
     */
    public function validateLotData(array $lot): void
    {
        $validator = Validator::make($lot, [
            'id' => 'required|integer',  
            'vehicle' => 'required|array',
            'vehicle.model' => 'required|array',
            'vehicle.model.manufacturer' => 'required|array',
            'images' => 'nullable|array',
            'subscriptionExtentional' => 'nullable|array'
        ]);

        if ($validator->fails()) {
            $errors = implode(', ', $validator->errors()->all());
            throw new \Exception('Invalid Lot id ' . $lot['id'] . ': ' . $errors);
        }
    }

}
