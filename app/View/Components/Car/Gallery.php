<?php

namespace App\View\Components\Car;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

class Gallery extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly Collection $gallery,
        public readonly string $test
        )
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.car.gallery', [
            'gallery' => $this->gallery,
            'test' => $this->test,
        ]);
    }
}
