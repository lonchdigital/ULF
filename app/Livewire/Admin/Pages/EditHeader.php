<?php

namespace App\Livewire\Admin\Pages;

use App\Models\Faq;
use App\Models\FaqTranslation;
use App\Models\Page;
use App\Models\PageBlock;
use App\Services\Admin\Page\ImageService;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditHeader extends Component
{
    use WithFileUploads;

    public Page $page;

    public $image;

    public $imageTemporary;

    public function mount(Page $page)
    {
        $this->page = $page;
    }

    protected function rules()
    {
        return [
            'image' => [
                'nullable',
                'mimes:jpeg,jpg,png,gif',
                'image',
            ],
        ];
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
            $image = $imageService->downloadImage($this->image, '/header');

            if(!empty($this->page->image)) {
                $imageService->deleteStorageImage($this->image, $this->page->image);
            }

            $this->page->image = $image;
        }

        $this->page->save();

        session()->flash('success', 'Дані успішно збережено');

        $this->redirectRoute('page.index');
    }

    public function render()
    {
        return view('livewire.admin.pages.edit-header');
    }
}
