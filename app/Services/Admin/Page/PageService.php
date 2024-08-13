<?php

namespace App\Services\Admin\Page;

use App\Models\Faq;
use App\Models\Page;
use Illuminate\Support\Str;
use App\Models\HomeMainBlock;
use App\Models\HomeDriveBlock;
use App\Models\HomeBenefitBlock;


class PageService
{
    public function updateDocument(Page $page, array $request): Page
    {
        $dataPageToUpdate = [];
        foreach ($request['text'] as $lang => $value) {
            $dataPageToUpdate[$lang]['text'] = $value;
        }
        foreach ($request['seo_data'] as $lang => $value) {
            $dataPageToUpdate[$lang]['seo_text'] = $value;
        }
        foreach ($request['meta_title'] as $lang => $value) {
            $dataPageToUpdate[$lang]['meta_title'] = $value;
        }
        foreach ($request['meta_description'] as $lang => $value) {
            $dataPageToUpdate[$lang]['meta_description'] = $value;
        }
        foreach ($request['meta_keywords'] as $lang => $value) {
            $dataPageToUpdate[$lang]['meta_keywords'] = $value;
        }
        $dataPageToUpdate['is_show_in_header'] = $request['is_show_in_header'];
        $dataPageToUpdate['is_show_in_footer'] = $request['is_show_in_footer'];

        $page->update($dataPageToUpdate);

        return $page;
    }


}
