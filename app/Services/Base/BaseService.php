<?php

namespace App\Services\Base;

use Closure;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
//use Intervention\Image\Facades\Image;

class BaseService
{
    /**
     * @throws Throwable
     */
    protected function coverWithDBTransaction(Closure $closure): ServiceActionResult
    {
        try {
            DB::beginTransaction();

            $result = $closure();

            DB::commit();
        } catch (\Throwable $throwable) {
            DB::rollback();
            $this->logCaughtException($throwable);

            if (config('app.debug')) {
                throw $throwable;
            } else {
                return ServiceActionResult::make(false, trans('common.action_unexpected_error'));
            }
        }

        return $result;
    }

    /**
     * @throws Throwable
     */
    protected function coverWithDBTransactionWithoutResponse(Closure $closure): mixed
    {
        try {
            DB::beginTransaction();

            $result = $closure();

            DB::commit();
        } catch (\Throwable $throwable) {
            DB::rollback();
            $this->logCaughtException($throwable);
            throw $throwable;
        }

        return $result;
    }

    /**
     * @throws Throwable
     */
    public function coverWithTryCatch(Closure $closure): ServiceActionResult
    {
        try {
            $result = $closure();
        } catch (\Throwable $throwable) {
            $this->logCaughtException($throwable);

            if (config('app.debug')) {
                throw $throwable;
            } else {
                return ServiceActionResult::make(false, trans('common.action_unexpected_error'));
            }
        }

        return $result;
    }

    protected function logCaughtException(Throwable $throwable): void
    {
        $callerFunctionName = debug_backtrace()[1]['function'];
        Log::error(
            get_class() . '@' . $callerFunctionName . ' ' . $throwable->getMessage() . PHP_EOL . $throwable->getTraceAsString()
        );
    }

    protected function getAuthUser(): User
    {
        return Auth::user();
    }


    /*protected function storeImage(string $path, UploadedFile $image, string $format, $quality = 70): void
    {
        $image = Image::make($image)->encode($format, $quality);
        Storage::disk(config('app.images_disk_default'))->put($path . '.'.$format, $image);
    }*/

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

    /*protected function storeAuthorAvatar(string $path, UploadedFile $image, string $format, $quality = 100): void
    {
        $image = Image::make($image)->fit(300, 300)->encode($format, $quality);
        Storage::disk(config('app.images_disk_default'))->put($path . '.'.$format, $image);
    }*/

}
