<?php

namespace App\Livewire\Admin\Pages;

use App\Models\Page;
use Livewire\Component;

class Edit extends Component
{
    public Page $page;

    public function mount(Page $page)
    {
        $this->page = $page;
    }

    public function getFaqsProperty()
    {
        $faqs = $this->page->faqs()->paginate(10);

        return $faqs;
    }

    public function render()
    {
        return view('livewire.admin.pages.edit');
    }
}
