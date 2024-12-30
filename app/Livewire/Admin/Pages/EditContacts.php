<?php

namespace App\Livewire\Admin\Pages;

use App\Models\Faq;
use App\Models\FaqTranslation;
use App\Models\Page;
use Livewire\Component;

class EditContacts extends Component
{
    public Page $page;

    public string $locale = '';

    public string $ukTitle;

    public string $ruTitle;

    public string $ukFirstDay;

    public string $ukFirstHours;

    public string $ruFirstDay;

    public string $ruFirstHours;

    public string $ukSecondDay;

    public string $ruSecondDay;

    public string $ukSecondHours;

    public string $ruSecondHours;

    public string $ukFirstAddress;

    public string $ruFirstAddress;

    public string $ukSecondAddress;

    public string $ruSecondAddress;

    public string $ukFirstPhone;

    public string $ruFirstPhone;

    public string $ukSecondPhone;

    public string $ruSecondPhone;

    public string $ukEmail;

    public string $ruEmail;

    public string $ukInstagram;

    public string $ruInstagram;

    public string $ukFacebook;

    public string $ruFacebook;

    public string $longitude;

    public string $latitude;

    protected $listeners = [
        'languageSwitched' => 'languageSwitched'
    ];

    public function mount(Page $page)
    {
        $this->locale = 'ua';

        $this->page = $page;

        $this->ukTitle = $page->translate('ua')->h1 ?? '';

        $this->ruTitle = $page->translate('ru')->h1 ?? '';

        $this->ukFirstDay = $this->page->pageBlocks->where('block', 'days')->where('key', 'first')->first()->translate('ua')->title ?? '';

        $this->ruFirstDay = $this->page->pageBlocks->where('block', 'days')->where('key', 'first')->first()->translate('ru')->title ?? '';

        $this->ukSecondDay = $this->page->pageBlocks->where('block', 'days')->where('key', 'second')->first()->translate('ua')->title ?? '';

        $this->ruSecondDay = $this->page->pageBlocks->where('block', 'days')->where('key', 'second')->first()->translate('ru')->title ?? '';

        $this->ukFirstHours = $this->page->pageBlocks->where('block', 'days')->where('key', 'first')->first()->translate('ua')->description ?? '';

        $this->ruFirstHours = $this->page->pageBlocks->where('block', 'days')->where('key', 'first')->first()->translate('ru')->description ?? '';

        $this->ukSecondHours = $this->page->pageBlocks->where('block', 'days')->where('key', 'second')->first()->translate('ua')->description ?? '';

        $this->ruSecondHours = $this->page->pageBlocks->where('block', 'days')->where('key', 'second')->first()->translate('ru')->description ?? '';

        $this->ukFirstAddress = $this->page->pageBlocks->where('block', 'address')->where('key', 'text')->first()->translate('ua')->title ?? '';

        $this->ruFirstAddress = $this->page->pageBlocks->where('block', 'address')->where('key', 'text')->first()->translate('ru')->title ?? '';

        $this->ukSecondAddress  = $this->page->pageBlocks->where('block', 'address')->where('key', 'text')->first()->translate('ua')->description ?? '';

        $this->ruSecondAddress = $this->page->pageBlocks->where('block', 'address')->where('key', 'text')->first()->translate('ru')->title ?? '';

        $this->ukFirstPhone = $this->page->pageBlocks->where('block', 'phone')->where('key', 'text')->first()->translate('ua')->title ?? '';

        $this->ruFirstPhone = $this->page->pageBlocks->where('block', 'phone')->where('key', 'text')->first()->translate('ru')->title ?? '';

        $this->ukSecondPhone  = $this->page->pageBlocks->where('block', 'phone')->where('key', 'text')->first()->translate('ua')->description ?? '';

        $this->ruSecondPhone  = $this->page->pageBlocks->where('block', 'phone')->where('key', 'text')->first()->translate('ru')->title ?? '';

        $this->ukEmail  = $this->page->pageBlocks->where('block', 'email')->where('key', 'text')->first()->translate('ua')->title ?? '';

        $this->ruEmail = $this->page->pageBlocks->where('block', 'email')->where('key', 'text')->first()->translate('ru')->title ?? '';

        $this->ukInstagram = $this->page->pageBlocks->where('block', 'instagram')->where('key', 'text')->first()->translate('ua')->title ?? '';

        $this->ruInstagram = $this->page->pageBlocks->where('block', 'instagram')->where('key', 'text')->first()->translate('ru')->title ?? '';

        $this->ukFacebook = $this->page->pageBlocks->where('block', 'facebook')->where('key', 'text')->first()->translate('ua')->title ?? '';

        $this->ruFacebook = $this->page->pageBlocks->where('block', 'facebook')->where('key', 'text')->first()->translate('ru')->title ?? '';

        $this->longitude = $this->page->pageBlocks->where('block', 'map')->where('key', 'longitude')->first()->value ?? '';

        $this->latitude = $this->page->pageBlocks->where('block', 'map')->where('key', 'latitude')->first()->value ?? '';
    }

    protected function rules()
    {
        return [
            'ukTitle' => [
                'nullable',
                'string',
            ],

            'ruTitle' => [
                'nullable',
                'string',
            ],

            'ukFirstDay' => [
                'nullable',
                'string',
            ],

            'ruFirstDay' => [
                'nullable',
                'string',
            ],

            'ukSecondDay' => [
                'nullable',
                'string',
            ],

            'ruSecondDay' => [
                'nullable',
                'string',
            ],

            'ukFirstHours' => [
                'nullable',
                'string',
            ],

            'ruFirstHours' => [
                'nullable',
                'string',
            ],

            'ukSecondHours' => [
                'nullable',
                'string',
            ],

            'ruSecondHours' => [
                'nullable',
                'string',
            ],

            'ukFirstAddress' => [
                'nullable',
                'string',
            ],

            'ruFirstAddress' => [
                'nullable',
                'string',
            ],

            'ukSecondAddress' => [
                'nullable',
                'string',
            ],

            'ruSecondAddress' => [
                'nullable',
                'string',
            ],

            'ukFirstPhone' => [
                'nullable',
                'string',
            ],

            'ruFirstPhone' => [
                'nullable',
                'string',
            ],

            'ukSecondPhone' => [
                'nullable',
                'string',
            ],

            'ruSecondPhone' => [
                'nullable',
                'string',
            ],

            'ukEmail' => [
                'nullable',
                'string',
            ],

            'ruEmail' => [
                'nullable',
                'string',
            ],

            'ukInstagram' => [
                'nullable',
                'string',
            ],

            'ruInstagram' => [
                'nullable',
                'string',
            ],

            'ukFacebook' => [
                'nullable',
                'string',
            ],

            'ruFacebook' => [
                'nullable',
                'string',
            ],

            'longitude' => [
                'nullable',
                'string',
            ],

            'latitude' => [
                'nullable',
                'string',
            ],
        ];
    }

    public function languageSwitched($lang)
    {
        $this->locale = $lang;
    }

    public function save()
    {
        $this->validate();

        $this->page->translateOrNew('ua')->h1 = $this->ukTitle;
        $this->page->translateOrNew('ru')->h1 = $this->ruTitle;

        $this->page->save();

        $this->page->pageBlocks()->firstOrCreate([
            'block' => 'days',
            'key' => 'first'
        ])
        // where('block', 'days')
        //     ->where('key', 'first')
        //     ->first()
            ->translate('ua')
            ->update([
                'title' => $this->ukFirstDay,
            ]);

        $this->page->pageBlocks()->firstOrCreate([
            'block' => 'days',
            'key' => 'first'
        ])
        // where('block', 'days')
        //     ->where('key', 'first')
        //     ->first()
            ->translate('ru')
            ->update([
                'title' => $this->ruFirstDay,
            ]);

        $this->page->pageBlocks()->firstOrCreate([
            'block' => 'days',
            'key' => 'second'
        ])
        // where('block', 'days')
        //     ->where('key', 'second')
        //     ->first()
            ->translate('ua')->update([
                'title' => $this->ukSecondDay,
            ]);

        $this->page->pageBlocks()->firstOrCreate([
            'block' => 'days',
            'key' => 'second'
        ])
        // where('block', 'days')
        //     ->where('key', 'second')
        //     ->first()
            ->translate('ru')
            ->update([
                'title' => $this->ruSecondDay,
            ]);

        $this->page->pageBlocks()->firstOrCreate([
            'block' => 'days',
            'key' => 'first'
        ])
        // where('block', 'days')
        //     ->where('key', 'first')
        //     ->first()
            ->translate('ua')
            ->update([
                'description' => $this->ukFirstHours,
            ]);

        $this->page->pageBlocks()->firstOrCreate([
            'block' => 'days',
            'key' => 'first'
        ])
        // where('block', 'days')
        //     ->where('key', 'first')
        //     ->first()
            ->translate('ru')
            ->update([
                'description' => $this->ruFirstHours,
            ]);

        $this->page->pageBlocks()->firstOrCreate([
            'block' => 'days',
            'key' => 'second'
        ])
        // where('block', 'days')
        //     ->where('key', 'second')
        //     ->first()
            ->translate('ua')
            ->update([
                'description' => $this->ukSecondHours,
            ]);

        $this->page->pageBlocks()->firstOrCreate([
            'block' => 'days',
            'key' => 'second'
        ])
        // where('block', 'days')
        //     ->where('key', 'second')
        //     ->first()
            ->translate('ru')
            ->update([
                'description' => $this->ruSecondHours
            ]);

        $this->page->pageBlocks()->firstOrCreate([
            'block' => 'address',
            'key' => 'text'
        ])
        // where('block', 'address')
        //     ->where('key', 'text')
        //     ->first()
            ->translate('ua')
            ->update([
                'title' => $this->ukFirstAddress
            ]);

        $this->page->pageBlocks()->firstOrCreate([
            'block' => 'address',
            'key' => 'text'
        ])
        // where('block', 'address')
        //     ->where('key', 'text')
        //     ->first()
            ->translate('ru')
            ->update([
                'tite' => $this->ruFirstAddress
            ]);

        $this->page->pageBlocks()->firstOrCreate([
            'block' => 'address',
            'key' => 'text'
        ])
        // where('block', 'address')
        //     ->where('key', 'text')
        //     ->first()
            ->translate('ua')
            ->update([
                'description' => $this->ukSecondAddress
            ]);

        $this->page->pageBlocks()->firstOrCreate([
            'block' => 'address',
            'key' => 'text'
        ])
        // where('block', 'address')
        //     ->where('key', 'text')
        //     ->first()
            ->translate('ru')
            ->update([
                'title' => $this->ruSecondAddress
            ]);

        $this->page->pageBlocks()->firstOrCreate([
            'block' => 'phone',
            'key' => 'text'
        ])
        // where('block', 'phone')
        //     ->where('key', 'text')
        //     ->first()
            ->translate('ua')
            ->update([
                'title' => $this->ukFirstPhone
            ]);

        $this->page->pageBlocks()->firstOrCreate([
            'block' => 'phone',
            'key' => 'text'
        ])
        // where('block', 'phone')
        //     ->where('key', 'text')
        //     ->first()
            ->translate('ru')
            ->update([
                'title' => $this->ruFirstPhone,
            ]);

        $this->page->pageBlocks()->firstOrCreate([
            'block' => 'phone',
            'key' => 'text'
        ])
        // where('block', 'phone')
        //     ->where('key', 'text')
        //     ->first()
            ->translate('ua')
            ->update([
                'description' => $this->ukSecondPhone
            ]);

        $this->page->pageBlocks()->firstOrCreate([
            'block' => 'phone',
            'key' => 'text'
        ])
        // where('block', 'phone')
        //     ->where('key', 'text')
        //     ->first()
            ->translate('ru')
            ->update([
                'title' => $this->ruSecondPhone
            ]);

        $this->page->pageBlocks()->firstOrCreate([
            'block' => 'email',
            'key' => 'text'
        ])
        // where('block', 'email')
        //     ->where('key', 'text')
        //     ->first()
            ->translate('ua')
            ->update([
                'title' => $this->ukEmail
            ]);

        $this->page->pageBlocks()->firstOrCreate([
            'block' => 'email',
            'key' => 'text'
        ])
        // where('block', 'email')
        //     ->where('key', 'text')
        //     ->first()
            ->translate('ru')
            ->update([
                'title' => $this->ruEmail
            ]);

        $this->page->pageBlocks()->firstOrCreate([
            'block' => 'instagram',
            'key' => 'text'
        ])
        // where('block', 'instagram')
        //     ->where('key', 'text')
        //     ->first()
            ->translate('ua')
            ->update([
                'title' => $this->ukInstagram
            ]);

        $this->page->pageBlocks()->firstOrCreate([
            'block' => 'instagram',
            'key' => 'text'
        ])
        // where('block', 'instagram')
        //     ->where('key', 'text')
        //     ->first()
            ->translate('ru')
            ->update([
                'title' => $this->ruInstagram
            ]);

        $this->page->pageBlocks()->firstOrCreate([
            'block' => 'facebook',
            'key' => 'text'
        ])
        // where('block', 'facebook')
        //     ->where('key', 'text')
        //     ->first()
            ->translate('ua')
            ->update([
                'title' => $this->ukFacebook
            ]);

        $this->page->pageBlocks()->firstOrCreate([
            'block' => 'facebook',
            'key' => 'text'
        ])
        // where('block', 'facebook')
        //     ->where('key', 'text')
        //     ->first()
            ->translate('ru')
            ->update([
                'title' => $this->ruFacebook
            ]);

        $this->page->pageBlocks()->firstOrCreate([
            'block' => 'map',
            'key' => 'longitude'
        ])
        // where('block', 'map')
        //     ->where('key', 'longitude')
        //     ->first()
            ->update([
                'value' => $this->longitude,
            ]);

        $this->page->pageBlocks()->firstOrCreate([
            'block' => 'map',
            'key' => 'latitude'
        ])
        // where('block', 'map')
        //     ->where('key', 'latitude')
        //     ->first()
            ->update([
                'value' => $this->latitude,
            ]);

        session()->flash('success', 'Дані успішно збережено');

        $this->redirectRoute('page.index');
    }

    public function render()
    {
        return view('livewire.admin.pages.edit-contacts');
    }
}
