<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;
use Modules\Cars\Models\Car;

class FAQs extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly Car $car,
        public readonly Collection $commonFaqs
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.f-a-qs', [
            'car' => $this->car,
            'commonFaqs' => $this->commonFaqs
        ]);
    }
}
