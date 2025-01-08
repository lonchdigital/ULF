<?php

namespace App\Livewire\Admin\Automatch;

use App\Enums\FeedbackStatus;
use App\Models\Automatch;
use App\Models\Feedback;
use App\Models\Page;
use App\Models\TinderFeedback;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class OneFeedback extends Component
{
    public TinderFeedback $feedback;

    public $statuses = [];

    public string $status = '';

    public function mount(TinderFeedback $feedback)
    {
        // $feedback->load('page');

        $this->feedback = $feedback;

        $this->status = $this->feedback->status;

        $statusesArray = FeedbackStatus::cases();

        foreach($statusesArray as $status) {
            $this->statuses[] = $status->value;
        }
    }

    public function updatedStatus($value)
    {
        $this->feedback->update([
            'status' => $value
        ]);

        $this->dispatch('refreshFeedbackCount');
    }

    public function deleteItem($id)
    {
        $this->dispatch('openModalDeleteItem', 'feedback', $id);
    }

    public function render()
    {
        return view('livewire.admin.automatch.one-feedback');
    }
}
