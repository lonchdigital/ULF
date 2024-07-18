<?php

namespace Modules\Cars\Services\Admin;

use Illuminate\Support\Str;
use Modules\Cars\Models\Car;
use Illuminate\Http\UploadedFile;
use Modules\Cars\Models\CarImage;
use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

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
        foreach($images as $image) {
            $response = Http::get($image['url']);

            if ($response->successful()) {
                // save to temporary folder
                $tempFilePath = tempnam(sys_get_temp_dir(), 'image');
                file_put_contents($tempFilePath, $response->getBody());

                $imagePath = self::CAR_IMAGES_FOLDER . '/'  . sha1(time()) . '_' . Str::random(10);
                $this->storeImage($imagePath, new UploadedFile($tempFilePath, 'image'), 'webp');
                $this->storeImage($imagePath, new UploadedFile($tempFilePath, 'image'), 'jpg');
                unlink($tempFilePath);

                // $this->deleteImage($article->image_path);
                CarImage::create([
                    'car_id' => $car->id,
                    'Url' => $imagePath . '.webp',
                    'TypeId' => $image['typeId']
                ]);
            }
        }

    }

    protected function storeImage(string $path, UploadedFile $image, string $format, $quality = 70): void
    {
        $image = Image::make($image)->encode($format, $quality);
        Storage::disk(config('app.images_disk_default'))->put($path . '.'.$format, $image);
    }

    protected function deleteImage(string $path): void
    {
        // remove webp
        if (Storage::disk(config('app.images_disk_default'))->exists($path)) {
            Storage::disk(config('app.images_disk_default'))->delete($path);
        }

        // remove jpg
        $jpgPath = pathinfo($path, PATHINFO_DIRNAME) . '/' . pathinfo($path, PATHINFO_FILENAME)  . '.jpg';
        if (Storage::disk(config('app.images_disk_default'))->exists($jpgPath)) {
            Storage::disk(config('app.images_disk_default'))->delete($jpgPath);
        }

        // remove png
        $jpgPath = pathinfo($path, PATHINFO_DIRNAME) . '/' . pathinfo($path, PATHINFO_FILENAME)  . '.png';
        if (Storage::disk(config('app.images_disk_default'))->exists($jpgPath)) {
            Storage::disk(config('app.images_disk_default'))->delete($jpgPath);
        }
    }
}
