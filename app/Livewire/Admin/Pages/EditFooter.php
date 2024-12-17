<?php

namespace App\Livewire\Admin\Pages;

use App\Models\Faq;
use App\Models\FaqTranslation;
use App\Models\Page;
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

    protected $listeners = [
        'languageSwitched' => 'languageSwitched'
    ];

    public function mount(Page $page)
    {
        $this->locale = 'uk';

        $this->page = $page;

        $this->ukDescription = $this->page->pageBlocks->where('block', 'footer')->where('key', 'description')->first()->translate('uk')->description ?? '';

        $this->ruDescription = $this->page->pageBlocks->where('block', 'footer')->where('key', 'description')->first()->translate('ru')->description ?? '';

        $this->telegramLink = $this->page->pageBlocks->where('block', 'footer')->where('key', 'communicate_telegram')->first()->translate('uk')->description ?? '';

        $this->viberLink = $this->page->pageBlocks->where('block', 'footer')->where('key', 'communicate_viber')->first()->translate('uk')->description ?? '';

        $this->botTelegram = $this->page->pageBlocks->where('block', 'footer')->where('key', 'bot_telegram')->first()->translate('uk')->description ?? '';

        $this->botViber = $this->page->pageBlocks->where('block', 'footer')->where('key', 'bot_viber')->first()->translate('uk')->description ?? '';

        $this->email = $this->page->pageBlocks->where('block', 'footer')->where('key', 'email')->first()->translate('uk')->description ?? '';

        $this->phone1 = $this->page->pageBlocks->where('block', 'phone')->where('key', 'phone1')->first()->translate('uk')->title ?? '';

        $this->phone2 = $this->page->pageBlocks->where('block', 'phone')->where('key', 'phone2')->first()->translate('uk')->title ?? '';

        $this->ukPhone2Desck = $this->page->pageBlocks->where('block', 'phone')->where('key', 'phone2')->first()->translate('uk')->description ?? '';

        $this->ruPhone2Desck = $this->page->pageBlocks->where('block', 'phone')->where('key', 'phone2')->first()->translate('ru')->description ?? '';

        $this->inst = $this->page->pageBlocks->where('block', 'footer')->where('key', 'instagram')->first()->translate('uk')->description ?? '';

        $this->tikTok = $this->page->pageBlocks->where('block', 'footer')->where('key', 'tik_tok')->first()->translate('uk')->description ?? '';

        $this->facebook = $this->page->pageBlocks->where('block', 'footer')->where('key', 'facebook')->first()->translate('uk')->description ?? '';

        $this->youtube = $this->page->pageBlocks->where('block', 'footer')->where('key', 'youtube')->first()->translate('uk')->description ?? '';

        $this->linkedin = $this->page->pageBlocks->where('block', 'footer')->where('key', 'linkedin')->first()->translate('uk')->description ?? '';
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

    public function deleteImage()
    {
        $this->image = null;
        $this->imageTemporary = null;
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

        $this->page->pageBlocks->where('block', 'footer')
            ->where('key', 'description')
            ->first()
            ->translate('uk')
            ->update([
                'description' => $this->ukDescription,
            ]);

        $this->page->pageBlocks->where('block', 'footer')
            ->where('key', 'description')
            ->first()
            ->translate('ru')
            ->update([
                'description' => $this->ruDescription,
            ]);

        $this->page->pageBlocks->where('block', 'footer')
            ->where('key', 'communicate_telegram')
            ->first()
            ->translate('ua')->update([
                'description' => $this->telegramLink,
            ]);

        $this->page->pageBlocks->where('block', 'footer')
            ->where('key', 'communicate_telegram')
            ->first()
            ->translate('ru')->update([
                'description' => $this->telegramLink,
            ]);

        $this->page->pageBlocks->where('block', 'footer')
            ->where('key', 'communicate_viber')
            ->first()
            ->translate('ua')
            ->update([
                'description' => $this->viberLink,
            ]);

        $this->page->pageBlocks->where('block', 'footer')
            ->where('key', 'communicate_viber')
            ->first()
            ->translate('ru')
            ->update([
                'description' => $this->viberLink,
            ]);

        $this->page->pageBlocks->where('block', 'footer')
            ->where('key', 'bot_viber')
            ->first()
            ->translate('ua')
            ->update([
                'description' => $this->botViber,
            ]);

            $this->page->pageBlocks->where('block', 'footer')
            ->where('key', 'bot_viber')
            ->first()
            ->translate('ru')
            ->update([
                'description' => $this->botViber,
            ]);

        $this->page->pageBlocks->where('block', 'footer')
            ->where('key', 'bot_telegram')
            ->first()
            ->translate('ua')
            ->update([
                'description' => $this->botTelegram,
            ]);

        $this->page->pageBlocks->where('block', 'footer')
            ->where('key', 'bot_telegram')
            ->first()
            ->translate('ru')
            ->update([
                'description' => $this->botTelegram,
            ]);

        $this->page->pageBlocks->where('block', 'footer')
            ->where('key', 'email')
            ->first()
            ->translate('ru')
            ->update([
                'description' => $this->email,
            ]);

        $this->page->pageBlocks->where('block', 'footer')
            ->where('key', 'email')
            ->first()
            ->translate('ua')
            ->update([
                'description' => $this->email,
            ]);

        $this->page->pageBlocks->where('block', 'phone')
            ->where('key', 'phone1')
            ->first()
            ->translate('ua')
            ->update([
                'title' => $this->phone1
            ]);

        $this->page->pageBlocks->where('block', 'phone')
            ->where('key', 'phone2')
            ->first()
            ->translate('ua')
            ->update([
                'title' => $this->phone2
            ]);

        $this->page->pageBlocks->where('block', 'phone')
            ->where('key', 'phone2')
            ->first()
            ->translate('ua')
            ->update([
                'description' => $this->ukPhone2Desck
            ]);

        $this->page->pageBlocks->where('block', 'phone')
            ->where('key', 'phone2')
            ->first()
            ->translate('ru')
            ->update([
                'description' => $this->ruPhone2Desck
            ]);

        $this->page->pageBlocks->where('block', 'footer')
            ->where('key', 'instagram')
            ->first()
            ->translate('ua')
            ->update([
                'description' => $this->inst
            ]);

        $this->page->pageBlocks->where('block', 'footer')
            ->where('key', 'instagram')
            ->first()
            ->translate('ru')
            ->update([
                'description' => $this->inst
            ]);

        $this->page->pageBlocks->where('block', 'footer')
            ->where('key', 'tik_tok')
            ->first()
            ->translate('ua')
            ->update([
                'description' => $this->tikTok
            ]);

        $this->page->pageBlocks->where('block', 'footer')
            ->where('key', 'tik_tok')
            ->first()
            ->translate('ru')
            ->update([
                'description' => $this->tikTok
            ]);

        $this->page->pageBlocks->where('block', 'footer')
            ->where('key', 'facebook')
            ->first()
            ->translate('ua')
            ->update([
                'description' => $this->facebook
            ]);

        $this->page->pageBlocks->where('block', 'footer')
            ->where('key', 'facebook')
            ->first()
            ->translate('ru')
            ->update([
                'description' => $this->facebook
            ]);

        $this->page->pageBlocks->where('block', 'footer')
            ->where('key', 'youtube')
            ->first()
            ->translate('ua')
            ->update([
                'description' => $this->youtube,
            ]);

        $this->page->pageBlocks->where('block', 'footer')
            ->where('key', 'youtube')
            ->first()
            ->translate('ru')
            ->update([
                'description' => $this->youtube,
            ]);

        $this->page->pageBlocks->where('block', 'footer')
            ->where('key', 'linkedin')
            ->first()
            ->translate('ua')
            ->update([
                'description' => $this->linkedin
            ]);

        $this->page->pageBlocks->where('block', 'footer')
            ->where('key', 'linkedin')
            ->first()
            ->translate('ru')
            ->update([
                'description' => $this->linkedin
            ]);

        session()->flash('success', 'Дані успішно збережено');

        $this->redirectRoute('page.index');
    }

    public function render()
    {
        return view('livewire.admin.pages.edit-footer');
    }
}
