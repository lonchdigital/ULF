<?php

namespace App\Services\Admin\Page;

use App\Models\Faq;
use App\Models\Page;
use Illuminate\Support\Str;
use App\Models\HomeMainBlock;
use App\Models\HomeDriveBlock;
use App\Models\HomeBenefitBlock;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    public function downloadImage($file, $folder)
    {
        $image = Storage::disk('public')->put($folder, $file);

        return $image;
    }

    public function deleteStorageImage($image, $path)
    {
        if ($image && $path) {
            Storage::disk('public')->delete($path);
        }
    }
}
