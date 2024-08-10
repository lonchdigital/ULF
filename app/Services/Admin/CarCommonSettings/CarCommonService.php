<?php


namespace App\Services\Admin\CarCommonSettings;

use App\Models\CarDriveBlock;
use App\Models\CommonCarSetting;
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
        // car common settings
        $commonCarSettings = $this->getAllCommonCarSettings();
        $data = [];
        foreach ($request['first_payment_note'] as $lang => $value) {
            $data[$lang]['first_payment_note'] = $value;
        }

        $this->updateDriveBlock($request['drive']);

        if(!is_null($commonCarSettings)) {
            $commonCarSettings->update($data);
        } else {
            CommonCarSetting::create($data);
        }


       (isset($request['subscribe-benefit'])) ? $this->syncBenefits($request['subscribe-benefit']) : $this->syncBenefits([]);
       (isset($request['subscribe-settings'])) ? $this->syncSubscribeSettings($request['subscribe-settings']) : $this->syncSubscribeSettings([]);
       (isset($request['faqs'])) ? $this->syncFaqs($request['faqs']) : $this->syncFaqs([]);
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

    public function getAllCommonCarSettings()
    {
        return CommonCarSetting::first();
    }
    public function getAllSubscribeBenefits()
    {
        return SubscribeBenefit::all();
    }

    private function updateDriveBlock(array $data)
    {
        $homeDriveBlock = CarDriveBlock::first();
        $dataToUpdate = [];

        foreach( $data['title'] as $lang => $value ){
            $dataToUpdate[$lang]['title'] = $value;
        }

        foreach( $data['step_one'] as $lang => $value ){
            $dataToUpdate[$lang]['step_one'] = $value;
        }
        foreach( $data['step_two'] as $lang => $value ){
            $dataToUpdate[$lang]['step_two'] = $value;
        }
        foreach( $data['step_three'] as $lang => $value ){
            $dataToUpdate[$lang]['step_three'] = $value;
        }
        foreach( $data['step_four'] as $lang => $value ){
            $dataToUpdate[$lang]['step_four'] = $value;
        }
        foreach( $data['step_five'] as $lang => $value ){
            $dataToUpdate[$lang]['step_five'] = $value;
        }

        if( !is_null($homeDriveBlock) ) {
            $homeDriveBlock->update($dataToUpdate);
        } else {
            CarDriveBlock::create($dataToUpdate);
        }
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

}
