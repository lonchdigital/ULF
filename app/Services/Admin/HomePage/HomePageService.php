<?php

namespace App\Services\Admin\HomePage;

use App\Models\Faq;
use App\Models\Page;
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
//         dd($request);

        $this->updateHomeMainBlock($request['hero']);
        if(isset($request['home-benefit'])) {
            $this->syncBenefits($request['home-benefit']);
        }
        $this->updateHomeDriveBlock($request['drive']);


        // update car page data
        $page = Page::where('key', 'homepage')->first();
        $dataPageToUpdate = [];
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
        $page->update($dataPageToUpdate);
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

        if (isset($data['bg_image_mob'])) {
            $imagePath = self::HOMEPAGE_IMAGES_FOLDER . '/'  . sha1(time()) . '_' . Str::random(10);

            storeImage($imagePath, $data['bg_image_mob'], 'webp');
            storeImage($imagePath, $data['bg_image_mob'], 'jpg');

            $dataToUpdate['image_mob'] = $imagePath . '.webp';
            if(!is_null($homeMainBlock) && !is_null($homeMainBlock->image_mob)){
                deleteImage($homeMainBlock->image_mob);
            }
        }

//        $dataToUpdate['video'] = $data['video'];

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

        $dataToUpdate['youtube'] = $data['youtube'];

        if (isset($data['image'])) {
            $imagePath = self::HOMEPAGE_IMAGES_FOLDER . '/'  . sha1(time()) . '_' . Str::random(10);

            storeImage($imagePath, $data['image'], 'webp');
            storeImage($imagePath, $data['image'], 'jpg');

            $dataToUpdate['image'] = $imagePath . '.webp';
            if(!is_null($homeDriveBlock) && !is_null($homeDriveBlock->image)){
                deleteImage($homeDriveBlock->image);
            }
        }

        if($data['delete_video']) {
            deleteVideo($homeDriveBlock->video);
            $dataToUpdate['video'] = null;
        }
        if(isset($data['video'])) {
            $imagePath = self::HOMEPAGE_IMAGES_FOLDER;
            $filename = sha1(time()) . '_' . Str::random(10) . '.' . $data['video']->getClientOriginalExtension();
            if(storeVideo($imagePath, $data['video'], $filename)) {
                $dataToUpdate['video'] = $imagePath .'/'. $filename;
            }
            deleteVideo($homeDriveBlock->video);
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


    public function getAllCommonFaqs()
    {
        return Faq::where('page_id', null)->get();
    }

}
