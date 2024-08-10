<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Modules\Cars\Models\Car;

class GalleryCars extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public readonly Car $car)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.gallery-cars', [
            'car' => $this->car
        ]);
    }
}
