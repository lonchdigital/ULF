<?php


namespace App\Services\Admin\CarCommonSettings;

use App\Models\Faq;
use App\Models\Page;
use App\Models\SubscribeBenefit;
use App\Models\SubscribeSetting;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Services\Application\ApplicationConfigService;


class CarCommonService
{
    public function __construct(ApplicationConfigService $applicationConfigService)
    {
        $this->availableLanguages = $applicationConfigService->getAvailableLanguages();
    }

    private array $availableLanguages;

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
        $this->syncSubscribeSettings($request['subscribe-settings']);
        $this->syncFaqs($request['faqs']);

    }

    private function syncBenefits(array $benefits): void
    {
        $dataToUpdate = [];
        $existingBenefits = $this->getAllSubscribeBenefits();

        if ($benefits) {
            foreach ($benefits as $benefit_id => $benefitLanguages) {
                $benefits[$benefit_id]['id'] = $benefit_id; // add id

                foreach ($benefitLanguages as $benefit) {

                    foreach ($benefit as $lang => $value) {
                        $dataToUpdate[$lang] = ['title' => $value];
                    }

                    $existingBenefit = $existingBenefits->where('id', $benefit_id)->first();

                    if( !is_null($existingBenefit) ) {
                        $existingBenefit->update($dataToUpdate);
                    } else {
                        SubscribeBenefit::create($dataToUpdate);
                    }

                }
            }
        }

        $existingBenefitsInRequest = $benefits ? array_filter(array_column($benefits, 'id'), function ($item) {
            return $item !== null;
        }): [];

        $benefitsToDelete = $existingBenefits->whereNotIn('id', $existingBenefitsInRequest);

        foreach ($benefitsToDelete as $benefitToDelete) {
            $benefitToDelete->deleteTranslations();
            $benefitToDelete->delete();
        }
    }

    public function getAllSubscribeBenefits()
    {
        return SubscribeBenefit::all();
    }


    private function syncFaqs(array $faqs): void
    {
        $dataToUpdate = [];
        $existingFaqs = $this->getAllCommonFaqs();

        if ($faqs) {
            foreach ($faqs as $faq_id => $faqLanguages) {
                $faqs[$faq_id]['id'] = $faq_id; // add id

                foreach ($faqLanguages as $fieldName => $faq) {
                    foreach ($faq as $lang => $value) {
                        $dataToUpdate[$lang][$fieldName] = $value;
                    }
                }

                $existingFaq = $existingFaqs->where('id', $faq_id)->first();

                if( !is_null($existingFaq) ) {
                    $existingFaq->update($dataToUpdate);
                } else {
                    Faq::create($dataToUpdate);
                }

            }
        }

        $existingFaqsInRequest = $faqs ? array_filter(array_column($faqs, 'id'), function ($item) {
            return $item !== null;
        }): [];

        $faqsToDelete = $existingFaqs->whereNotIn('id', $existingFaqsInRequest);

        foreach ($faqsToDelete as $faqToDelete) {
            $faqToDelete->deleteTranslations();
            $faqToDelete->delete();
        }
    }

    public function getAllCommonFaqs()
    {
        return Faq::where('page_id', null)->get();
    }


    private function syncSubscribeSettings(array $settings): void
    {
        $dataToUpdate = [];
        $existingSettings = $this->getAllSubscribeSettings();

        if ($settings) {

            foreach ($settings as $section_id => $setting) {
                foreach ($setting as $item_id => $settingLanguages) {
                    $settings[$item_id]['id'] = $item_id; // add id
                    $dataToUpdate['section_id'] = $section_id;

                    if(isset($settingLanguages['is_active']) && $settingLanguages['is_active'] == 'on') {
                        $dataToUpdate['is_active'] = true;
                    } else {
                        $dataToUpdate['is_active'] = false;
                    }

                    foreach ($settingLanguages as $fieldName => $faq) {
                        if($fieldName == 'is_active') {
                            continue;
                        }

                        foreach ($faq as $lang => $value) {
                            $dataToUpdate[$lang][$fieldName] = $value;
                        }
                    }

                    $existingSetting = $existingSettings->where('section_id', $section_id)->where('id', $item_id)->first();

                    if( !is_null($existingSetting) ) {
                        $existingSetting->update($dataToUpdate);
                    } else {
                        SubscribeSetting::create($dataToUpdate);
                    }

                }

            }

        }



        $existingSettingsInRequest = $settings ? array_filter(array_column($settings, 'id'), function ($item) {
            return $item !== null;
        }): [];

        $existingSettingsToDelete = $existingSettings->whereNotIn('id', $existingSettingsInRequest);

        foreach ($existingSettingsToDelete as $existingSettingToDelete) {
            $existingSettingToDelete->deleteTranslations();
            $existingSettingToDelete->delete();
        }
    }

    public function getAllSubscribeSettings()
    {
        return SubscribeSetting::all();
    }


    // TODO:: remove later
    /*public function getAllSubscribeBenefitsAdmin(): array
    {
        $allSubscribeBenefits = [];

        foreach ( SubscribeBenefit::all() as $key => $benefit ) {
            foreach ( $this->availableLanguages as $language) {
//                $allSubscribeBenefits[$key]['id'] = $key;
                $allSubscribeBenefits[$key]['title'][$language] = $benefit->translate($language)->title;
            }
        }

        return $allSubscribeBenefits;
    }*/
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
