<?php

namespace App\Livewire\Admin\Automatch;

use App\Models\Automatch;
use App\Models\Feedback;
use App\Models\Page;
use App\Models\TinderFeedback;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class FeedbackIndex extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'tailwind';

    public function getFeedbacksProperty()
    {
        $feedbacks = TinderFeedback::search(trim($this->search))
            ->latest()
            ->paginate(10);

        return $feedbacks;
    }

    public function render()
    {
        return view('livewire.admin.automatch.feedback-index');
    }
}
