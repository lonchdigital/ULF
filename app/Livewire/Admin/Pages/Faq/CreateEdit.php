<?php

namespace App\Livewire\Admin\Pages\Faq;

use App\Models\Faq;
use App\Models\FaqTranslation;
use App\Models\Page;
use Livewire\Component;

class CreateEdit extends Component
{
    public Page $page;

    public Faq $faq;

    public FaqTranslation $uaTrans;

    public FaqTranslation $ruTrans;

    public string $uaAnswer;

    public string $uaQuestion;

    public string $ruAnswer;

    public string $ruQuestion;

    public function mount(Page $page, Faq $faq = null)
    {
        $this->page = $page;

        $this->faq = $faq;

        $this->uaTrans = FaqTranslation::where('locale', 'uk')->where('faq_id', $this->faq->id)->first() ?? new FaqTranslation();

        $this->ruTrans = FaqTranslation::where('locale', 'ru')->where('faq_id', $this->faq->id)->first() ?? new FaqTranslation();

        $this->uaAnswer = $this->uaTrans->answer ?? '';

        $this->uaQuestion = $this->uaTrans->question ?? '';

        $this->ruAnswer = $this->ruTrans->answer ?? '';

        $this->ruQuestion = $this->ruTrans->question ?? '';
    }

    protected function rules()
    {
        return [
            'uaAnswer' => [
                'required',
                'string',
            ],

            'uaQuestion' => [
                'required',
                'string',
                'max:255',
            ],

            'ruAnswer' => [
                'required',
                'string',
            ],

            'ruQuestion' => [
                'required',
                'string',
                'max:255',
            ],
        ];
    }

    public function save()
    {
        $this->validate();

        $this->faq->page_id = $this->page->id;

        $this->faq->save();

        $this->uaTrans->faq_id = $this->faq->id;
        $this->uaTrans->locale = 'uk';
        $this->uaTrans->question = $this->uaQuestion;
        $this->uaTrans->answer = $this->uaAnswer;
        $this->uaTrans->save();

        $this->ruTrans->faq_id = $this->faq->id;
        $this->ruTrans->locale = 'ru';
        $this->ruTrans->question = $this->ruQuestion;
        $this->ruTrans->answer = $this->ruAnswer;
        $this->ruTrans->save();

        session()->flash('success', 'FAQ успішно збережено');

        $this->redirectRoute('admin.pages.edit', ['page' => $this->page]);
    }


    public function render()
    {
        return view('livewire.admin.pages.faq.create-edit');
    }
}
