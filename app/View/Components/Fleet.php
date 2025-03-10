<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Collection;

class Fleet extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public readonly Collection $fleetCars)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.fleet', [
            'fleetCars' => $this->fleetCars
        ]);
    }
}
