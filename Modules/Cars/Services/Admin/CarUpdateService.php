<?php

namespace Modules\Cars\Services\Admin;

use Modules\Cars\Models\Car;
use Modules\Cars\Models\SubscribePrice;
use Modules\Cars\Models\CarFaq;

class CarUpdateService extends CarBaseService
{

    // Update cars that we got by API
    public function updateCars($allLots)
    {
        foreach($allLots as $lot){
            $page = $this->pageService->updateFromApi([]);
            $vehicle = $this->carVehicleService->updateFromApi($lot['vehicle']);

            $dataToUpdate = [];
            $dataToUpdate['vehicle_id'] = $vehicle->id;
            $dataToUpdate['car_page_id'] = $page->id;
            $dataToUpdate['lot_id'] = $lot['id'];
            $dataToUpdate['subscription_category'] = $lot['SubscriptionCategory'];
            // TODO:: get more about these fields
            // $dataToUpdate['subscription_period_id'] = null;
            // $dataToUpdate['subscription_extentional_id'] = null;
            // $dataToUpdate['advertisement_city_id'] = null;
            $dataToUpdate['uk']['description'] = $lot['description_ua'];
            $dataToUpdate['ru']['description'] = $lot['description_ru'];

            $car = Car::create($dataToUpdate);

            if(!is_null($lot['images'])){
                $this->updateCarImagesApi($lot['images'], $car);
            }
        }

    }


    // Update one car from dashboard
    public function updateCarFromDashboard(Car $car, array $data)
    {
        // dd($data);

        $this->syncSubscribePrices($car, $data['month_settings']);
        (isset($data['faqs'])) ? $this->syncFaqs($car, $data['faqs']) : $car->faqs()->delete();


        $dataToUpdate = [];
        $dataToUpdate['status_id'] = $data['status_id'];
        $dataToUpdate['label_color_id'] = $data['label_color_id'];
        $dataToUpdate['popularity_id'] = $data['popularity_id'];
        foreach ($data['label'] as $lang => $value) {
            $dataToUpdate[$lang]['label'] = $value;
        }

        $car->update($dataToUpdate);


        // update car page meta
        $dataPageToUpdate = [];
        foreach ($data['meta_title'] as $lang => $value) {
            $dataPageToUpdate[$lang]['meta_title'] = $value;
        }
        foreach ($data['meta_description'] as $lang => $value) {
            $dataPageToUpdate[$lang]['meta_description'] = $value;
        }

        $car->page->update($dataPageToUpdate);

        // dd($data, $car->page);
        return $car;
    }

    private function syncSubscribePrices(Car $car, array $data)
    {
        $existingSettings = SubscribePrice::where('car_id', $car->id)->get();

        foreach($data as $section_id => $value) {
            $dataToUpdate = [
                'car_id' => $car->id,
                'section_id' => $section_id,
                'monthly_payment' => $value['monthly_payment'],
                'first_payment' => $value['first_payment'],
            ];
            $existingSetting = $existingSettings->where('section_id', $section_id)->where('car_id', $car->id)->first();

            if( !is_null($existingSetting) ) {
                $existingSetting->update($dataToUpdate);
            } else {
                SubscribePrice::create($dataToUpdate);
            }
        }

    }

    private function syncFaqs(Car $car, array $faqs): void
    {
        $dataToUpdate = [];
        $existingFaqs = CarFaq::where('car_id', $car->id)->get();

        if ($faqs) {
            foreach ($faqs as $faq_id => $faqLanguages) {
                $faqs[$faq_id]['id'] = $faq_id; // add id

                $dataToUpdate['car_id'] = $car->id;
                foreach ($faqLanguages as $fieldName => $faq) {
                    foreach ($faq as $lang => $value) {
                        $dataToUpdate[$lang][$fieldName] = $value;
                    }
                }

                $existingFaq = $existingFaqs->where('car_id', $car->id)->where('id', $faq_id)->first();
                
                if( !is_null($existingFaq) ) {
                    $existingFaq->update($dataToUpdate);
                } else {
                    CarFaq::create($dataToUpdate);
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

}
