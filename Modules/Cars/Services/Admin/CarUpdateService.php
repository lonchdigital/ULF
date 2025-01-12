<?php

namespace Modules\Cars\Services\Admin;

use Modules\Cars\Models\Car;
use Modules\Cars\Models\CarFaq;
use Modules\Cars\Models\Vehicle;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\DataClasses\CarStatusesClass;
use Modules\Cars\Models\SubscribePrice;
use Modules\Cars\Models\CarsAvailability;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendAvailabilityNotification;

class CarUpdateService extends CarBaseService
{

    // Create/Update cars that we got by API
    public function updateCars($allLots, $console)
    {
        foreach($allLots as $lot){
            try {
                $console->info('Updating Lot ' . $lot['id']);
                $this->validateLotData($lot);
            } catch (\Exception $e) {
                $console->info($e->getMessage());
                continue;
            }

            $existingItem = Car::where('lot_id', $lot['id'])->first();
            if($existingItem) {

                $vehicle = $this->carVehicleService->updateFromApi($lot['vehicle'], $existingItem);

                $dataToUpdate = $this->setCarData($vehicle, $lot);
                $vehicle->car->update($dataToUpdate);

                if(!is_null($lot['images'])){
                    $this->updateCarImagesApi($lot['images'], $vehicle->car);
                }

            } else {

                $vehicle = $this->carVehicleService->createFromApi($lot['vehicle']);

                $dataToUpdate = $this->setCarData($vehicle, $lot);
                $car = Car::create($dataToUpdate);

                if(!is_null($lot['images'])){
                    $this->updateCarImagesApi($lot['images'], $car);
                }

            }

        }

    }
    private function setCarData(Vehicle $vehicle, $lot): array
    {
        $page = $this->pageService->updateFromApi([], $vehicle, $lot['id']);

        $dataToUpdate = [];
        $dataToUpdate['vehicle_id'] = $vehicle->id;
        $dataToUpdate['car_page_id'] = $page->id;
        $dataToUpdate['lot_id'] = $lot['id'];
        $dataToUpdate['subscription_category'] = $lot['SubscriptionCategory'];
        // TODO:: get more about these fields
        // $dataToUpdate['subscription_period_id'] = null;
        // $dataToUpdate['subscription_extentional_id'] = null;
        // $dataToUpdate['advertisement_city_id'] = null;
        $dataToUpdate['ua']['description'] = $lot['description_ua'];
        $dataToUpdate['ru']['description'] = $lot['description_ru'];

        return $dataToUpdate;
    }

    // Create/Update ONE car that we got by API
    public function addOneCar($data)
    {
        try {

            $existingItem = Car::where('lot_id', $data['id'])->first();
            if($existingItem) {

                DB::transaction(function () use ($data, $existingItem) {
                    $vehicle = $this->carVehicleService->updateFromApi($data['vehicle'], $existingItem);
                    $dataToUpdate = $this->setCarData($vehicle, $data);

                    $vehicle->car->update($dataToUpdate);

                    if(!is_null($data['images'])){
                        $this->updateCarImagesApi($data['images'], $vehicle->car);
                    }
                });

            } else {

                DB::transaction(function () use ($data) {
                    $vehicle = $this->carVehicleService->createFromApi($data['vehicle']);
                    $dataToUpdate = $this->setCarData($vehicle, $data);

                    $car = Car::create($dataToUpdate);

                    if(!is_null($data['images'])){
                        $this->updateCarImagesApi($data['images'], $car);
                    }
                });

            }

            return response()->json(['message' => 'Car added/updated successfully'], 200);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to add/update car', 'details' => $e->getMessage()], 500);
        }

    }




    // Update one car from dashboard
    public function updateCarFromDashboard(Car $car, array $data)
    {
        if($car->status_id === CarStatusesClass::IN_SUBSCRIPTION && (int)$data['status_id'] === CarStatusesClass::AVAILABLE) {
            $this->notifyAboutCarAvailability($car);
        }

        $this->syncSubscribePrices($car, $data['month_settings']);
        (isset($data['faqs'])) ? $this->syncFaqs($car, $data['faqs']) : $car->faqs()->delete();

        $dataToUpdate = [];
        $dataToUpdate['status_id'] = $data['status_id'];
        $dataToUpdate['sort_by_popularity_id'] = $data['sort_by_popularity'];
        $dataToUpdate['label_color_id'] = $data['label_color_id'];
        $dataToUpdate['popularity_id'] = $data['popularity_id'];
        foreach ($data['label'] as $lang => $value) {
            $dataToUpdate[$lang]['label'] = $value;
        }

        $car->update($dataToUpdate);


        // update car page data
        $dataPageToUpdate = [];
        $dataPageToUpdate['slug'] = $data['slug'];
        foreach ($data['meta_title'] as $lang => $value) {
            $dataPageToUpdate[$lang]['meta_title'] = $value;
        }
        foreach ($data['meta_description'] as $lang => $value) {
            $dataPageToUpdate[$lang]['meta_description'] = $value;
        }
        foreach ($data['meta_keywords'] as $lang => $value) {
            $dataPageToUpdate[$lang]['meta_keywords'] = $value;
        }
        foreach ($data['seo_data'] as $lang => $value) {
            $dataPageToUpdate[$lang]['seo_text'] = $value;
        }

        $car->page->update($dataPageToUpdate);

        // dd($data, $car->page);
        return $car;
    }

    private function notifyAboutCarAvailability(Car $car)
    {
        $posts = CarsAvailability::where('car_id', $car->id)->get();

        if(count($posts) > 0) {
            $message['name'] = $car->getFullName();
            $message['url'] = route('car.single.page', ['slug' => $car->page->slug]);

            foreach($posts as $post) {
                Notification::route('mail', $post->email)->notify(new SendAvailabilityNotification($post->email, $message));
            }
        }
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
