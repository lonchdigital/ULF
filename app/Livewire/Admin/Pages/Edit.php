<?php

namespace App\Livewire\Admin\Pages;

use App\Models\Faq;
use App\Models\FaqTranslation;
use App\Models\Page;
use Livewire\Component;

class Edit extends Component
{
    public Page $page;

    public string $locale;

    public array $faqs = [];

    protected $listeners = ['languageSwitched' => 'languageSwitched'];

    public function mount(Page $page)
    {
        $this->dispatch('livewire:load');

        $this->locale = 'ua';

        $this->page = $page;
        $i = 1;

        foreach($this->page->faqs()->orderBy('sort', 'ASC')->get() as $faq) {
            $faq->update([
                'sort' => $i,
            ]);

            $i += 1;
        }

        foreach($this->page->faqs()->orderBy('sort', 'ASC')->get() as $faq) {
            $this->faqs[] = [
                'ua' => [
                    'question' => $faq->translate('ua')->question ?? '',
                    'answer' => $faq->translate('ua')->answer ?? '',
                ],

                'ru' => [
                    'question' => $faq->translate('ru')->question ?? '',
                    'answer' => $faq->translate('ru')->answer ?? '',
                ],

                'sort' => $faq->sort,
            ];
        }

        usort($this->faqs, function ($a, $b) {
            return $a['sort'] <=> $b['sort'];
        });

        if(empty($this->faqs)) {
            $this->faqs[] = [
                'ua' => [
                    'question' => '',
                    'answer' => '',
                ],

                'ru' => [
                    'question' => '',
                    'answer' => ''
                ],

                'sort' => 1,
            ];
        }
    }

    protected function rules()
    {
        return [
            'faqs.*.ua.question' => [
                'nullable',
                'string',
            ],

            'faqs.*.ua.answer' => [
                'nullable',
                'string',
            ],

            'faqs.*.ru.question' => [
                'nullable',
                'string',
            ],

            'faqs.*.ru.answer' => [
                'nullable',
                'string',
            ],
        ];
    }

    public function languageSwitched($lang)
    {
        $this->locale = $lang;
        $this->dispatch('livewire:update');
    }

    public function getFaqsProperty()
    {
        $faqs = $this->page->faqs()->paginate(10);

        return $faqs;
    }

    public function addFaq()
    {
        $this->faqs[] = [
            'ua' => [
                'question' => '',
                'answer' => '',
            ],

            'ru' => [
                'question' => '',
                'answer' => ''
            ],

            'sort' => count($this->faqs) + 1,
        ];

        $this->dispatch('livewire:update');
    }

    public function removeElement($index)
    {
        foreach($this->faqs as $index2 => $faq) {
            if($faq['sort'] > $this->faqs[$index]['sort']) {
                $this->faqs[$index2]['sort'] = $faq['sort'] - 1;
            }
        }

        if (array_key_exists($index, $this->faqs)) {
            unset($this->faqs[$index]);
        }

        $this->dispatch('livewire:update');
    }

    public function save()
    {
        $this->validate();

        foreach($this->page->faqs as $faq) {
            $faq->delete();
        }

        foreach($this->faqs as $faq2) {
            Faq::create([
                'page_id' => $this->page->id,
                'sort' => $faq2['sort'],
                'ua' => [
                    'question' => $faq2['ua']['question'],
                    'answer' => $faq2['ua']['answer'],
                ],
                'ru' => [
                    'question' => $faq2['ru']['question'],
                    'answer' => $faq2['ru']['answer'],
                ],
            ]);
        }

        session()->flash('success', 'Дані успішно збережено');

        $this->redirectRoute('admin.pages.index');
    }

    public function newPosition($val, $index)
    {
        $this->faqs[$index + $val]['sort'] = $this->faqs[$index]['sort'];

        $this->faqs[$index]['sort'] = $this->faqs[$index]['sort'] + $val;

        usort($this->faqs, function ($a, $b) {
            return $a['sort'] <=> $b['sort'];
        });

        $this->dispatch('livewire:update');
    }

    public function render()
    {
        return view('livewire.admin.pages.edit');
    }
}
