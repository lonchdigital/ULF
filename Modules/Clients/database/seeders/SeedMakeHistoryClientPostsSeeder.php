<?php

namespace Modules\Clients\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Clients\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class SeedMakeHistoryClientPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $post = [
            'name' => [
                'ru' => 'Андрей',
                'uk' => 'Андрей',
            ],
            'history_title' => [
                'ru' => 'Моє перше авто',
                'uk' => 'Моє перше авто',
            ],
            'description' => [
                'ru' => 'Взяв авто в підписку на пів року для того щоб визначитись з вподобаннями...',
                'uk' => 'Взяв авто в підписку на пів року для того щоб визначитись з вподобаннями...',
            ],
            'preview_image' => new UploadedFile(public_path('seederData/clients/customer-stories-1.jpeg'), 'customer-stories-1.jpeg'),
            'video' => new UploadedFile(public_path('seederData/clients/example.mp4'), 'example.mp4')
        ];
        $this->createClient($post);

        $post = [
            'name' => [
                'ru' => 'Роман',
                'uk' => 'Роман',
            ],
            'history_title' => [
                'ru' => 'Любимое авто',
                'uk' => 'Любимое авто',
            ],
            'description' => [
                'ru' => 'Взяв авто в підписку на пів року для того щоб визначитись з вподобаннями...',
                'uk' => 'Взяв авто в підписку на пів року для того щоб визначитись з вподобаннями...',
            ],
            'preview_image' => new UploadedFile(public_path('seederData/clients/customer-stories-2.jpeg'), 'customer-stories-2.jpeg'),
        ];

        $this->createClient($post);

        $post = [
            'name' => [
                'ru' => 'Семен',
                'uk' => 'Семен',
            ],
            'history_title' => [
                'ru' => 'Моє новое авто',
                'uk' => 'Моє новое авто',
            ],
            'description' => [
                'ru' => 'Взяв авто в підписку на пів року для того щоб визначитись з вподобаннями...',
                'uk' => 'Взяв авто в підписку на пів року для того щоб визначитись з вподобаннями...',
            ],
            'preview_image' => new UploadedFile(public_path('seederData/clients/customer-stories-3.jpeg'), 'customer-stories-3.jpeg'),
            'video' => new UploadedFile(public_path('seederData/clients/example-vertical.mp4'), 'example-vertical.mp4')
        ];
        $this->createClient($post);

        $post = [
            'name' => [
                'ru' => 'Владислав',
                'uk' => 'Владислав',
            ],
            'history_title' => [
                'ru' => null,
                'uk' => null,
            ],
            'description' => [
                'ru' => null,
                'uk' => null,
            ],
            'preview_image' => new UploadedFile(public_path('seederData/clients/customer-stories-4.jpeg'), 'customer-stories-4.jpeg'),
        ];
        $this->createClient($post);

        $post = [
            'name' => [
                'ru' => 'Федор',
                'uk' => 'Федор',
            ],
            'history_title' => [
                'ru' => null,
                'uk' => null,
            ],
            'description' => [
                'ru' => null,
                'uk' => null,
            ],
            'preview_image' => new UploadedFile(public_path('seederData/clients/scroll-gallery-car-1.jpeg'), 'scroll-gallery-car-1.jpeg'),
        ];
        $this->createClient($post);

        $post = [
            'name' => [
                'ru' => 'Дмитрий',
                'uk' => 'Дмитрий',
            ],
            'history_title' => [
                'ru' => null,
                'uk' => null,
            ],
            'description' => [
                'ru' => null,
                'uk' => null,
            ],
            'preview_image' => new UploadedFile(public_path('seederData/clients/customer-stories-1.jpeg'), 'customer-stories-1.jpeg'),
        ];
        $this->createClient($post);

        $post = [
            'name' => [
                'ru' => 'Анастасия',
                'uk' => 'Анастасия',
            ],
            'history_title' => [
                'ru' => null,
                'uk' => null,
            ],
            'description' => [
                'ru' => null,
                'uk' => null,
            ],
            'preview_image' => new UploadedFile(public_path('seederData/clients/scroll-gallery-car-1.jpeg'), 'scroll-gallery-car-1.jpeg'),
        ];
        $this->createClient($post);

        $post = [
            'name' => [
                'ru' => 'Сергей',
                'uk' => 'Сергей',
            ],
            'history_title' => [
                'ru' => null,
                'uk' => null,
            ],
            'description' => [
                'ru' => null,
                'uk' => null,
            ],
            'preview_image' => new UploadedFile(public_path('seederData/clients/customer-stories-3.jpeg'), 'customer-stories-3.jpeg'),
        ];
        $this->createClient($post);
    }

    private function createClient(array $data)
    {
        $dataToUpdate = [];


        if(isset($data['preview_image'])) {
            $imagePath = 'clients-media' . '/'  . sha1(time()) . '_' . Str::random(10);
            storeImage($imagePath, $data['preview_image'], 'webp');
            storeImage($imagePath, $data['preview_image'], 'jpg');
            $dataToUpdate['image_path'] = $imagePath . '.webp';
        }

        if(isset($data['video'])) {
            $imagePath = 'clients-media';
            $filename = sha1(time()) . '_' . Str::random(10) . '.' . $data['video']->getClientOriginalExtension();
            if(storeVideo($imagePath, $data['video'], $filename)) {
                $dataToUpdate['video'] = $imagePath .'/'. $filename;
            }
        }

        foreach ($data['name'] as $lang => $value) {
            $dataToUpdate[$lang]['name'] = $value;
        }
        foreach ($data['history_title'] as $lang => $value) {
            $dataToUpdate[$lang]['history_title'] = $value;
        }
        foreach ($data['description'] as $lang => $value) {
            $dataToUpdate[$lang]['description'] = $value;
        }

        Client::create($dataToUpdate);
    }
}
