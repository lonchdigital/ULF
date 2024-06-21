<?php


namespace App\Services\Admin\CarCommonSettings;

use App\Models\Page;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class CarCommonService
{

    public function getPages()
    {
        return Page::where('page_id', null)->get();
    }

    public function createPage(array $data)
    {
        return [];
    }

    public function updatePage(Page $page, array $request): void
    {
        dd('updatePage! ! !');
    }

/*    private function syncFaqs(int $infoSectionId, array $faqs): void
    {
        $existingFaqs = InfoFaq::where('info_section_id', $infoSectionId)->get();

        if ($faqs) {
            foreach ($faqs as $faq) {
                $dataToUpdate = [
                    'info_section_id' => $infoSectionId,
                    'question' => $faq['question'],
                    'answer' => $faq['answer'],
                    'url' => $faq['url'],
                    'icon_id' => (isset($faq['icon_id'])) ? $faq['icon_id'] : 1,
                ];

                if (isset($faq['id']) && $faq['id']) {
                    $existingFaq = $existingFaqs->where('id', $faq['id'])->first();
                    if (!$existingFaq) {
                        throw new \Exception('Incorrect faq id: ' . $faq['id']);
                    }

                    $existingFaq->update($dataToUpdate);
                } else {
                    InfoFaq::create($dataToUpdate);
                }
            }
        }

        $existingFaqsInRequest = $faqs ? array_filter(array_column($faqs, 'id'), function ($item) {
            return $item !== null;
        }): [];

        $faqsToDelete = $existingFaqs->whereNotIn('id', $existingFaqsInRequest);

        foreach ($faqsToDelete as $faqToDelete) {
            $faqToDelete->delete();
        }

    }*/

}
