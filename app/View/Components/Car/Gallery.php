<?php

namespace App\View\Components\Car;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Modules\Cars\Models\Car;

class Gallery extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly Car $car, 
        public $subscriptionExtentional
        )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.car.gallery', [
            'car' => $this->car,
            'subscriptionExtentional' => $this->subscriptionExtentional,
        ]);
    }
}
