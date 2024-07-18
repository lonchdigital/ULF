<?php

namespace Modules\Cars\Services\Admin;

use Illuminate\Support\Str;
use Modules\Cars\Models\CarPage;
use Modules\Cars\Http\Controllers\Web\CarsController;

class PageService
{

    public function updateFromApi(array $data): CarPage
    {
        $dataToUpdate = [];

        $dataToUpdate['section'] = config('cars.section');
        // $dataToUpdate['slug'] = $data['slug'];
        $dataToUpdate['slug'] = 'new-name-page-' . Str::random(5);
        $dataToUpdate['action'] = config('cars.new_document_action');
        $dataToUpdate['controller'] = CarsController::class;

        $data['name'] = ['uk' => 'name UK', 'ru' => 'name RU'];
        foreach ($data['name'] as $lang => $value) {
            $dataToUpdate[$lang]['name'] = $value;
            $dataToUpdate[$lang]['h1'] = $value;
        }
        // foreach ($data['meta_title'] as $lang => $value) {
        //     $dataToUpdate[$lang]['meta_title'] = $value;
        // }
        // foreach ($data['meta_description'] as $lang => $value) {
        //     $dataToUpdate[$lang]['meta_description'] = $value;
        // }

        return CarPage::create($dataToUpdate);
    }

    // public function update(ArticlePage $page, array $data)
    // {
    //     $dataToUpdate = [];

    //     $dataToUpdate['slug'] = $data['slug'];

    //     foreach ($data['name'] as $lang => $value) {
    //         $dataToUpdate[$lang]['name'] = $value;
    //         $dataToUpdate[$lang]['h1'] = $value;
    //     }
    //     foreach ($data['meta_title'] as $lang => $value) {
    //         $dataToUpdate[$lang]['meta_title'] = $value;
    //     }
    //     foreach ($data['meta_description'] as $lang => $value) {
    //         $dataToUpdate[$lang]['meta_description'] = $value;
    //     }

    //     $page->update($dataToUpdate);
    // }

}
