<?php

namespace Modules\Articles\Services\Admin;

use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ArticleBaseService
{
    /**
     * @var PageService
     */
    protected PageService $pageService;

    protected const ARTICLE_IMAGES_FOLDER = 'article-images';

    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
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
