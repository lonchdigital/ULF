<?php

namespace App\Livewire\Admin\Automatch;

use App\Models\Automatch;
use App\Models\Faq;
use App\Models\FaqTranslation;
use App\Models\Page;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public Page $page;

    public string $locale;

    public array $automatches = [];

    public string $ukTitle;

    public string $ruTitle;

    public string $ukDescription;

    public string $ruDescription;

    protected $listeners = ['languageSwitched' => 'languageSwitched'];

    public function mount(Page $page)
    {
        $this->locale = 'ua';

        $this->page = Page::where('key', 'homepage')->first();

        $this->ukTitle = $this->page->pageBlocks->where('block', 'automatch')->first()->translate('ua')->title ?? '';

        $this->ruTitle = $this->page->pageBlocks->where('block', 'automatch')->first()->translate('ru')->title ?? '';

        $this->ukDescription = $this->page->pageBlocks->where('block', 'automatch')->first()->translate('ua')->description ?? '';

        $this->ruDescription = $this->page->pageBlocks->where('block', 'automatch')->first()->translate('ru')->description ?? '';

        $automatches = Automatch::get();

        $i = 1;

        foreach($automatches as $automatch2) {
            $automatch2->update([
                'sort' => $i,
            ]);

            $i += 1;
        }

        foreach($automatches as $automatch) {
            $this->automatches[] = [
                'ua' => [
                    'title' => $automatch->translate('ua')->title ?? '',
                    'description' => $automatch->translate('ua')->description ?? '',
                ],

                'ru' => [
                    'title' => $automatch->translate('ru')->title ?? '',
                    'description' => $automatch->translate('ru')->description ?? '',
                ],

                'price' => $automatch->price ?? '',

                'link' => $automatch->link ?? '',

                'image' => $automatch->imageUrl ?? '',

                'oldImage' => $automatch->image ?? '',

                'newImage' => null,

                'sort' => $automatch->sort,

                'is_active' => $automatch->is_active ? true : false,
            ];
        }

        usort($this->automatches, function ($a, $b) {
            return $a['sort'] <=> $b['sort'];
        });

        if(empty($this->automatches)) {
            $this->automatches[] = [
                'ua' => [
                    'title' => '',
                    'description' => '',
                ],

                'ru' => [
                    'title' => '',
                    'description' => ''
                ],

                'price' => '',

                'link' => '',

                'sort' => 1,

                'is_active' => true,

                'image' => null,

                'newImage' => null,
            ];
        }
    }

    protected function rules()
    {
        return [
            'automatches.*.ua.title' => [
                'nullable',
                'string',
            ],

            'automatches.*.price' => [
                'nullable',
                'string',
            ],

            'automatches.*.link' => [
                'nullable',
                'string',
            ],

            'automatches.*.ua.description' => [
                'nullable',
                'string',
            ],

            'automatches.*.ru.title' => [
                'nullable',
                'string',
            ],

            'automatches.*.ru.description' => [
                'nullable',
                'string',
            ],

            'ukTitle' => [
                'nullable',
                'string',
            ],

            'ruTitle' => [
                'nullable',
                'string',
            ],

            'ukDescription' => [
                'nullable',
                'string',
            ],

            'ruDescription' => [
                'nullable',
                'string',
            ],
        ];
    }

    public function updated($propertyName)
    {
        if (preg_match('/automatches\.\d+\.newImage/', $propertyName)) {
            $this->handleImageChange($propertyName);
        }
    }

    protected function handleImageChange($propertyName)
    {
        preg_match('/automatches\.(\d+)\.newImage/', $propertyName, $matches);
        $index = $matches[1];

        $this->automatches[$index]['temporaryImage'] = $this->automatches[$index]['newImage']->temporaryUrl();
        // $this->validateOnly('image');
    }

    public function downloadImage($file)
    {
        $image = Storage::disk('public')->put('/automatches', $file);

        return $image;
    }

    public function removeImageFromStorage($imageUrl)
    {
        if ($imageUrl) {
            Storage::disk('public')->delete($imageUrl);
        }
    }

    public function deleteImage($index)
    {
        $this->automatches[$index]['image'] = null;
        $this->automatches[$index]['temporaryImage'] = null;
    }


    public function languageSwitched($lang)
    {
        $this->locale = $lang;
    }

    public function addAutomatch()
    {
        $this->automatches[] = [
            'ua' => [
                'title' => '',
                'description' => '',
            ],

            'ru' => [
                'title' => '',
                'description' => ''
            ],

            'price' => '',

            'link' => '',

            'image' => null,

            'newImage' => null,

            'is_active' => true,

            'sort' => count($this->automatches) + 1,
        ];
    }

    public function removeElement($index)
    {
        foreach($this->automatches as $index2 => $automatch) {
            if($automatch['sort'] > $this->automatches[$index]['sort']) {
                $this->automatches[$index2]['sort'] = $automatch['sort'] - 1;
            }
        }

        if (array_key_exists($index, $this->automatches)) {
            unset($this->automatches[$index]);
        }
    }

    public function checkImage($image)
    {
        foreach ($this->automatches as $automatch) {
            if (isset($automatch['image']) && $automatch['image'] === $image) {
                return true;
            }
        }

        return false;
    }

    public function save()
    {
        $this->validate();

        $automatches = Automatch::get();

        foreach($automatches as $automatch) {
            if(!$this->checkImage($automatch->imageUrl)) {
                $this->removeImageFromStorage($automatch->image);
            }

            $automatch->delete();
        }

        foreach($this->automatches as $automatch2) {
            $image = $automatch2['oldImage'] ?? null;

            if(isset($automatch2['newImage'])) {
                $image = $this->downloadImage($automatch2['newImage']);
            }

            Automatch::create([
                'sort' => $automatch2['sort'],
                'is_active' => $automatch2['is_active'],
                'price' => $automatch2['price'],
                'link' => $automatch2['link'],
                'image' => $image,
                'ua' => [
                    'title' => $automatch2['ua']['title'],
                    'description' => $automatch2['ua']['description'],
                ],
                'ru' => [
                    'title' => $automatch2['ru']['title'],
                    'description' => $automatch2['ru']['description'],
                ],
            ]);
        }

        $this->page->pageBlocks->where('block', 'automatch')
            ->first()
            ->translate('ua')
            ->update([
                'title' => $this->ukTitle,
            ]);

        $this->page->pageBlocks->where('block', 'automatch')
            ->first()
            ->translate('ru')
            ->update([
                'title' => $this->ruTitle,
            ]);

        $this->page->pageBlocks->where('block', 'automatch')
            ->first()
            ->translate('ua')->update([
                'description' => $this->ukDescription,
            ]);

        $this->page->pageBlocks->where('block', 'automatch')
            ->first()
            ->translate('ru')
            ->update([
                'title' => $this->ruDescription,
            ]);

        session()->flash('success', 'Дані успішно збережено');

        $this->redirectRoute('admin.automatch.index');
    }

    public function newPosition($val, $index)
    {
        $this->automatches[$index + $val]['sort'] = $this->automatches[$index]['sort'];

        $this->automatches[$index]['sort'] = $this->automatches[$index]['sort'] + $val;

        usort($this->automatches, function ($a, $b) {
            return $a['sort'] <=> $b['sort'];
        });
    }

    public function render()
    {
        return view('livewire.admin.automatch.edit');
    }
}
