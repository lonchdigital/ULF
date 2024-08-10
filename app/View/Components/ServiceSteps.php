<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\CarDriveBlock;

class ServiceSteps extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public readonly CarDriveBlock|null $carDriveBlock)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.service-steps', [
            'carDriveBlock' => $this->carDriveBlock
        ]);
    }
}
