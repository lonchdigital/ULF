<?php

namespace App\Livewire\Admin\Pages;

use App\Models\Faq;
use App\Models\FaqTranslation;
use App\Models\Page;
use App\Models\PageBlock;
use App\Services\Admin\Page\ImageService;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditFooter extends Component
{
    use WithFileUploads;

    public Page $page;

    public string $locale = '';

    public string $ukDescription = '';

    public string $ruDescription = '';

    public string $telegramLink;

    public string $viberLink;

    public string $botTelegram;

    public string $botViber;

    public string $email;

    public string $phone1 = '';

    public string $phone2 = '';

    public string $ukPhone2Desck = '';

    public string $ruPhone2Desck = '';

    public string $inst;

    public string $tikTok;

    public string $facebook;

    public string $youtube;

    public string $linkedin;

    public $image;

    public $imageTemporary;

    public PageBlock $linkedinBlock;

    public $linkedinImage;

    public $linkedinImageTemporary;

    public PageBlock $youtubeBlock;

    public $youtubeImage;

    public $youtubeImageTemporary;

    public PageBlock $facebookBlock;

    public $facebookImage;

    public $facebookImageTemporary;

    public PageBlock $tiktokBlock;

    public $tiktokImage;

    public $tiktokImageTemporary;

    public PageBlock $instagramBlock;

    public $instagramImage;

    public $instagramImageTemporary;

    protected $listeners = [
        'languageSwitched' => 'languageSwitched'
    ];

    public function mount(Page $page)
    {
        $this->locale = 'ua';

        $this->page = $page;

        $this->ukDescription = $this->page->pageBlocks()->firstOrCreate([
                'block' => 'footer',
                'key' => 'description'
            ])
            ->translate('ua')
            ->description ?? '';

        $this->ruDescription = $this->page->pageBlocks()->firstOrCreate([
                'block' => 'footer',
                'key' => 'description'
            ])
            ->translate('ru')
            ->description ?? '';

        $this->telegramLink = $this->page->pageBlocks()->firstOrCreate([
                'block' => 'footer',
                'key' => 'communicate_telegram'
            ])
            ->translate('ua')
            ->description ?? '';

        $this->viberLink = $this->page->pageBlocks()->firstOrCreate([
                'block' => 'footer',
                'key' => 'communicate_viber'
            ])
            ->translate('ua')
            ->description ?? '';

        $this->botTelegram = $this->page->pageBlocks()->firstOrCreate([
                'block' => 'footer',
                'key' => 'bot_telegram'
            ])
            ->translate('ua')
            ->description ?? '';

        $this->botViber = $this->page->pageBlocks()->firstOrCreate([
                'block' => 'footer',
                'key' => 'bot_viber'
            ])
            ->translate('ua')
            ->description ?? '';

        $this->email = $this->page->pageBlocks()->firstOrCreate([
                'block' => 'footer',
                'key' => 'email'
            ])
            ->translate('ua')
            ->description ?? '';

        $this->phone1 = $this->page->pageBlocks()->firstOrCreate([
                'block' => 'phone',
                'key' => 'phone1'
            ])
            ->translate('ua')
            ->title ?? '';

        $this->phone2 = $this->page->pageBlocks()->firstOrCreate([
                'block' => 'phone',
                'key' => 'phone2'
            ])
            ->translate('ua')
            ->title ?? '';

        $this->ukPhone2Desck = $this->page->pageBlocks()->firstOrCreate([
                'block' => 'phone',
                'key' => 'phone2'
            ])
            ->translate('ua')
            ->description ?? '';

        $this->ruPhone2Desck = $this->page->pageBlocks()->firstOrCreate([
                'block' => 'phone',
                'key' => 'phone2'
            ])
            ->translate('ru')
            ->description ?? '';

        $this->inst = $this->page->pageBlocks()->firstOrCreate([
                'block' => 'footer',
                'key' => 'instagram'
            ])
            ->translate('ua')
            ->description ?? '';

        $this->tikTok = $this->page->pageBlocks()->firstOrCreate([
                'block' => 'footer',
                'key' => 'tik_tok'
            ])
            ->translate('ua')
            ->description ?? '';

        $this->facebook = $this->page->pageBlocks()->firstOrCreate([
                'block' => 'footer',
                'key' => 'facebook'
            ])
            ->translate('ua')
            ->description ?? '';

        $this->youtube = $this->page->pageBlocks()->firstOrCreate([
                'block' => 'footer',
                'key' => 'youtube'
            ])
            ->translate('ua')
            ->description ?? '';

        $this->linkedin = $this->page->pageBlocks()->firstOrCreate([
                'block' => 'footer',
                'key' => 'linkedin'
            ])
            ->translate('ua')
            ->description ?? '';

        $this->linkedinBlock = $this->page->pageBlocks()->firstOrCreate([
            'block' => 'footer',
            'key' => 'linkedin'
        ]);

        $this->youtubeBlock = $this->page->pageBlocks()->firstOrCreate([
            'block' => 'footer',
            'key' => 'youtube'
        ]);

        $this->facebookBlock = $this->page->pageBlocks()->firstOrCreate([
            'block' => 'footer',
            'key' => 'facebook'
        ]);

        $this->tiktokBlock = $this->page->pageBlocks()->firstOrCreate([
            'block' => 'footer',
            'key' => 'tik_tok'
        ]);

        $this->instagramBlock = $this->page->pageBlocks()->firstOrCreate([
            'block' => 'footer',
            'key' => 'instagram'
        ]);
    }

    protected function rules()
    {
        return [
            'ukDescription' => [
                'nullable',
                'string',
            ],

            'ruDescription' => [
                'nullable',
                'string',
            ],

            'telegramLink' => [
                'nullable',
                'string',
            ],

            'viberLink' => [
                'nullable',
                'string',
            ],

            'botTelegram' => [
                'nullable',
                'string',
            ],

            'botViber' => [
                'nullable',
                'string',
            ],

            'email' => [
                'nullable',
                'string',
            ],

            'phone1' => [
                'nullable',
                'string',
            ],

            'phone2' => [
                'nullable',
                'string',
            ],

            'ukPhone2Desck' => [
                'nullable',
                'string',
            ],

            'ruPhone2Desck' => [
                'nullable',
                'string',
            ],

            'inst' => [
                'nullable',
                'string',
            ],

            'tikTok' => [
                'nullable',
                'string',
            ],

            'facebook' => [
                'nullable',
                'string',
            ],

            'youtube' => [
                'nullable',
                'string',
            ],

            'linkedin' => [
                'nullable',
                'string',
            ],

            'image' => [
                'nullable',
                'mimes:jpeg,jpg,png,gif',
                'image',
            ],

            'linkedinImage' => [
                'nullable',
                'mimes:jpeg,jpg,png,gif,svg',
                'image',
            ],

            'youtubeImage' => [
                'nullable',
                'mimes:jpeg,jpg,png,gif,svg',
                'image',
            ],

            'facebookImage' => [
                'nullable',
                'mimes:jpeg,jpg,png,gif,svg',
                'image',
            ],

            'tiktokImage' => [
                'nullable',
                'mimes:jpeg,jpg,png,gif,svg',
                'image',
            ],

            'instagramImage' => [
                'nullable',
                'mimes:jpeg,jpg,png,gif,svg',
                // 'image',
            ],
        ];
    }

    public function languageSwitched($lang)
    {
        $this->locale = $lang;
    }

    public function updatedImage($val)
    {
        $this->validateOnly('image');
        $this->image = $val;
        $this->imageTemporary = $val->temporaryUrl();
    }

    public function updatedLinkedinImage($val)
    {
        $this->validateOnly('linkedinImage');
        $this->linkedinImage = $val;
        $this->linkedinImageTemporary = $val->temporaryUrl();
    }

    public function updatedYoutubeImage($val)
    {
        $this->validateOnly('youtubeImage');
        $this->youtubeImage = $val;
        $this->youtubeImageTemporary = $val->temporaryUrl();
    }

    public function updatedFacebookImage($val)
    {
        $this->validateOnly('facebookImage');
        $this->facebookImage = $val;
        $this->facebookImageTemporary = $val->temporaryUrl();
    }

    public function updatedTiktokImage($val)
    {
        $this->validateOnly('tiktokImage');
        $this->tiktokImage = $val;
        $this->tiktokImageTemporary = $val->temporaryUrl();
    }

    public function updatedInstagramImage($val)
    {
        $this->validateOnly('instagramImage');
        $this->instagramImage = $val;
        $this->instagramImageTemporary = $val->temporaryUrl();
    }

    public function deleteImage()
    {
        $this->image = null;
        $this->imageTemporary = null;
    }

    public function deleteLinkedinImage()
    {
        $this->linkedinImage = null;
        $this->linkedinImageTemporary = null;
    }

    public function deleteYoutubeImage()
    {
        $this->youtubeImage = null;
        $this->youtubeImageTemporary = null;
    }

    public function deleteFacebookImage()
    {
        $this->facebookImage = null;
        $this->facebookImageTemporary = null;
    }

    public function deleteTiktokImage()
    {
        $this->tiktokImage = null;
        $this->tiktokImageTemporary = null;
    }

    public function deleteInstagramImage()
    {
        $this->instagramImage = null;
        $this->instagramImageTemporary = null;
    }

    public function save()
    {
        $this->validate();

        $imageService = resolve(ImageService::class);

        if ($this->image) {
            $image = $imageService->downloadImage($this->image, '/footer');

            if(!empty($this->page->image)) {
                $imageService->deleteStorageImage($this->image, $this->page->image);
            }

            $this->page->image = $image;
        }

        $this->page->save();

        $this->page->pageBlocks()->firstOrCreate([
            'block' => 'footer',
            'key' => 'description'
        ])
        // where('block', 'footer')
        //     ->where('key', 'description')
        //     ->first()
            ->translate('ua')
            ->update([
                'description' => $this->ukDescription,
            ]);

        $this->page->pageBlocks()->firstOrCreate([
            'block' => 'footer',
            'key' => 'description'
        ])
            ->translate('ru')
            ->update([
                'description' => $this->ruDescription,
            ]);

        $block = $this->page->pageBlocks()->firstOrCreate([
                    'block' => 'footer',
                    'key' => 'communicate_telegram'
        ]);

        $translation = $block->translateOrNew('ua');
        $translation->description = $this->telegramLink;
        $translation->save();

        $translation = $block->translateOrNew('ru');
        $translation->description = $this->telegramLink;
        $translation->save();

        $block = $this->page->pageBlocks()->firstOrCreate([
            'block' => 'footer',
            'key' => 'communicate_viber'
        ]);

        $translation = $block->translateOrNew('ua');
        $translation->description = $this->viberLink;
        $translation->save();

        $translation = $block->translateOrNew('ru');
        $translation->description = $this->viberLink;
        $translation->save();

        $block = $this->page->pageBlocks()->firstOrCreate([
            'block' => 'footer',
            'key' => 'bot_viber'
        ]);

        $translation = $block->translateOrNew('ua');
        $translation->description = $this->botViber;
        $translation->save();

        $translation = $block->translateOrNew('ru');
        $translation->description = $this->botViber;
        $translation->save();

        $block = $this->page->pageBlocks()->firstOrCreate([
            'block' => 'footer',
            'key' => 'bot_telegram'
        ]);

        $translation = $block->translateOrNew('ua');
        $translation->description = $this->botTelegram;
        $translation->save();

        $translation = $block->translateOrNew('ru');
        $translation->description = $this->botTelegram;
        $translation->save();

        $block = $this->page->pageBlocks()->firstOrCreate([
            'block' => 'footer',
            'key' => 'email'
        ]);

        $translation = $block->translateOrNew('ua');
        $translation->description = $this->email;
        $translation->save();

        $translation = $block->translateOrNew('ru');
        $translation->description = $this->email;
        $translation->save();

        $block = $this->page->pageBlocks()->firstOrCreate([
            'block' => 'phone',
            'key' => 'phone1'
        ]);

        $translation = $block->translateOrNew('ua');
        $translation->title = $this->phone1;
        $translation->save();

        $translation = $block->translateOrNew('ru');
        $translation->title = $this->phone1;
        $translation->save();

        $block = $this->page->pageBlocks()->firstOrCreate([
            'block' => 'phone',
            'key' => 'phone2'
        ]);

        $translation = $block->translateOrNew('ua');
        $translation->title = $this->phone2;
        $translation->description = $this->ukPhone2Desck;
        $translation->save();

        $translation = $block->translateOrNew('ru');
        $translation->title = $this->phone2;
        $translation->description = $this->ruPhone2Desck;

        $block = $this->page->pageBlocks()->firstOrCreate([
            'block' => 'footer',
            'key' => 'instagram'
        ]);

        if ($this->instagramImage) {
            $image = $imageService->downloadImage($this->instagramImage, '/footer');

            if(!empty($this->block->value)) {
                $imageService->deleteStorageImage($this->instagramImage, $this->block->value);
            }

            $block->value = $image;
            $block->save();
        }

        $translation = $block->translateOrNew('ua');
        $translation->description = $this->inst;
        $translation->save();

        $translation = $block->translateOrNew('ru');
        $translation->description = $this->inst;
        $translation->save();

        $block = $this->page->pageBlocks()->firstOrCreate([
            'block' => 'footer',
            'key' => 'tik_tok'
        ]);

        if ($this->tiktokImage) {
            $image = $imageService->downloadImage($this->tiktokImage, '/footer');

            if(!empty($this->block->value)) {
                $imageService->deleteStorageImage($this->tiktokImage, $this->block->value);
            }

            $block->value = $image;
            $block->save();
        }

        $translation = $block->translateOrNew('ua');
        $translation->description = $this->tikTok;
        $translation->save();

        $translation = $block->translateOrNew('ru');
        $translation->description = $this->tikTok;
        $translation->save();

        $block = $this->page->pageBlocks()->firstOrCreate([
            'block' => 'footer',
            'key' => 'facebook'
        ]);

        if ($this->facebookImage) {
            $image = $imageService->downloadImage($this->facebookImage, '/footer');

            if(!empty($this->block->value)) {
                $imageService->deleteStorageImage($this->facebookImage, $this->block->value);
            }

            $block->value = $image;
            $block->save();
        }

        $translation = $block->translateOrNew('ua');
        $translation->description = $this->facebook;
        $translation->save();

        $translation = $block->translateOrNew('ru');
        $translation->description = $this->facebook;
        $translation->save();

        $block = $this->page->pageBlocks()->firstOrCreate([
            'block' => 'footer',
            'key' => 'youtube'
        ]);

        if ($this->youtubeImage) {
            $image = $imageService->downloadImage($this->youtubeImage, '/footer');

            if(!empty($this->block->value)) {
                $imageService->deleteStorageImage($this->youtubeImage, $this->block->value);
            }

            $block->value = $image;
            $block->save();
        }

        $translation = $block->translateOrNew('ua');
        $translation->description = $this->youtube;
        $translation->save();

        $translation = $block->translateOrNew('ru');
        $translation->description = $this->youtube;
        $translation->save();

        $block = $this->page->pageBlocks()->firstOrCreate([
            'block' => 'footer',
            'key' => 'linkedin'
        ]);

        if ($this->linkedinImage) {
            $image = $imageService->downloadImage($this->linkedinImage, '/footer');

            if(!empty($this->block->value)) {
                $imageService->deleteStorageImage($this->linkedinImage, $this->block->value);
            }

            $block->value = $image;
            $block->save();
        }

        $translation = $block->translateOrNew('ua');
        $translation->description = $this->linkedin;
        $translation->save();

        $translation = $block->translateOrNew('ru');
        $translation->description = $this->linkedin;
        $translation->save();

        session()->flash('success', 'Дані успішно збережено');

        $this->redirectRoute('page.index');
    }

    public function render()
    {
        return view('livewire.admin.pages.edit-footer');
    }
}
