<?php

namespace App\Livewire\Admin\Pages;

use App\Models\Page;
use Livewire\Component;

class Index extends Component
{
    public function getPagesProperty()
    {
        $pages = Page::paginate(20);

        return $pages;
    }

    public function render()
    {
        return view('livewire.admin.pages.index');
    }
}
