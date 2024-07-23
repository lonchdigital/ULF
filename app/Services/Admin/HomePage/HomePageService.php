<?php

namespace App\Services\Admin\HomePage;

use App\Models\Faq;
use Illuminate\Support\Str;
use App\Models\HomeMainBlock;
use App\Models\HomeDriveBlock;
use App\Models\HomeBenefitBlock;


class HomePageService
{
    protected const HOMEPAGE_IMAGES_FOLDER = 'homepage-images';

    public function __construct()
    {}

    public function updateSettings(array $request): void
    {
        // dd($request);

        $this->updateHomeMainBlock($request['hero']);
        $this->syncBenefits($request['home-benefit']);
        $this->updateHomeDriveBlock($request['drive']);



    //    (isset($request['subscribe-benefit'])) ? $this->syncBenefits($request['subscribe-benefit']) : $this->syncBenefits([]);
    //    (isset($request['subscribe-settings'])) ? $this->syncSubscribeSettings($request['subscribe-settings']) : $this->syncSubscribeSettings([]);
    //    (isset($request['faqs'])) ? $this->syncFaqs($request['faqs']) : $this->syncFaqs([]);
    }

    private function updateHomeMainBlock(array $data)
    {
        $homeMainBlock = HomeMainBlock::first();
        $dataToUpdate = [];

        if (isset($data['bg_image'])) {
            $imagePath = self::HOMEPAGE_IMAGES_FOLDER . '/'  . sha1(time()) . '_' . Str::random(10);

            storeImage($imagePath, $data['bg_image'], 'webp');
            storeImage($imagePath, $data['bg_image'], 'jpg');

            $dataToUpdate['image'] = $imagePath . '.webp';
            if(!is_null($homeMainBlock) && !is_null($homeMainBlock->image)){
                deleteImage($homeMainBlock->image);
            }
        }

        $dataToUpdate['video'] = $data['video'];

        foreach( $data['title'] as $lang => $value ){
            $dataToUpdate[$lang]['title'] = $value;
        }
        foreach( $data['running_text'] as $lang => $value ){
            $dataToUpdate[$lang]['running_text'] = $value;
        }
        foreach( $data['description'] as $lang => $value ){
            $dataToUpdate[$lang]['description'] = $value;
        }
        foreach( $data['button_one'] as $lang => $value ){
            $dataToUpdate[$lang]['button_one'] = $value;
        }
        foreach( $data['button_two'] as $lang => $value ){
            $dataToUpdate[$lang]['button_two'] = $value;
        }

        if( !is_null($homeMainBlock) ) {
            $homeMainBlock->update($dataToUpdate);
        } else {
            HomeMainBlock::create($dataToUpdate);
        }
    }

    private function syncBenefits(array $benefitsRows): void
    {
        $dataToUpdate = [];
        $existingBenefits = HomeBenefitBlock::all();
        $benefitsToSync = []; 

        if ($benefitsRows) {

            foreach($benefitsRows as $row => $benefits) {

                foreach ($benefits as $benefit_id => $benefitLanguages) {
                    $benefitsToSync[$row][$benefit_id]['id'] = $benefit_id; // add id
    
                    foreach ($benefitLanguages as $benefit) {
    
                        foreach ($benefit as $lang => $value) {
                            $dataToUpdate[$lang] = ['title' => $value];
                        }
    
                        $existingBenefit = $existingBenefits->where('row', $row)->where('id', $benefit_id)->first();
    
                        $dataToUpdate['row'] = $row;
                        if( !is_null($existingBenefit) ) {
                            $existingBenefit->update($dataToUpdate);
                        } else {
                            HomeBenefitBlock::create($dataToUpdate);
                        }
    
                    }
                }
            }
            
        }

        // dd('stop', $benefitsToSync);

        foreach($benefitsToSync as $row => $benefitsToSyncItems){

            $existingBenefitsInRequest = $benefitsToSyncItems ? array_filter(array_column($benefitsToSyncItems, 'id'), function ($item) {
                return $item !== null;
            }): [];
    
            $benefitsToDelete = $existingBenefits->where('row', $row)->whereNotIn('id', $existingBenefitsInRequest);
    
            foreach ($benefitsToDelete as $benefitToDelete) {
                $benefitToDelete->deleteTranslations();
                $benefitToDelete->delete();
            }

        }

    }

    private function updateHomeDriveBlock(array $data)
    {
        $homeDriveBlock = HomeDriveBlock::first();
        $dataToUpdate = [];

        if (isset($data['image'])) {
            $imagePath = self::HOMEPAGE_IMAGES_FOLDER . '/'  . sha1(time()) . '_' . Str::random(10);

            storeImage($imagePath, $data['image'], 'webp');
            storeImage($imagePath, $data['image'], 'jpg');

            $dataToUpdate['image'] = $imagePath . '.webp';
            if(!is_null($homeDriveBlock) && !is_null($homeDriveBlock->image)){
                deleteImage($homeDriveBlock->image);
            }
        }

        foreach( $data['title'] as $lang => $value ){
            $dataToUpdate[$lang]['title'] = $value;
        }
        foreach( $data['description'] as $lang => $value ){
            $dataToUpdate[$lang]['description'] = $value;
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
        foreach( $data['button_one'] as $lang => $value ){
            $dataToUpdate[$lang]['button_one'] = $value;
        }
        foreach( $data['button_two'] as $lang => $value ){
            $dataToUpdate[$lang]['button_two'] = $value;
        }

        if( !is_null($homeDriveBlock) ) {
            $homeDriveBlock->update($dataToUpdate);
        } else {
            HomeDriveBlock::create($dataToUpdate);
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

}
