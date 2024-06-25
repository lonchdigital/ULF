<?php


namespace App\Services\Admin\CarCommonSettings;

use App\Models\Page;
use App\Models\SubscribeBenefit;
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

    public function updatePage(array $request): void
    {
//        dd('updatePage!!!', $request);

        $this->syncBenefits($request['subscribe-benefit']);


    }

    private function syncBenefits(array $benefits): void
    {
        $existingBenefits = $this->getAllSubscribeBenefits();

        if ($benefits) {

            foreach ($benefits as $key => $benefit) {
                $benefit_id = $key;

                foreach ($benefit as $values) {

                    foreach ($values as $locale => $title) {
                        $dataToUpdate[] = [
                            'benefit_id' => $benefit_id,
                            'locale' => $locale,
                            'title' => $title,
                        ];
                    }
                }

//                dd($dataToUpdate);


                if (isset($benefit['benefit_id']) && $benefit['benefit_id']) {
                    $existingBenefit = $existingBenefits->where('benefit_id', $benefit['benefit_id'])->first();
                    if (!$existingBenefit) {
                        throw new \Exception('Incorrect benefit id: ' . $benefit['benefit_id']);
                    }


//                    dd('1');

//                    $existingBenefit->update($dataToUpdate);

                    foreach ($dataToUpdate as $item) {
                        $existingBenefit->update($item);
                    }
                } else {
//                    dd('2');
//                    dd($dataToUpdate);
                    foreach ($dataToUpdate as $item) {
                        SubscribeBenefit::create($item);
                    }

                }
            }

        }

    }

    public function getAllSubscribeBenefits()
    {
        return SubscribeBenefit::all();
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
