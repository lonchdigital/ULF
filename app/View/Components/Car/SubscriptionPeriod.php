<?php

namespace App\View\Components\Car;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;
use Modules\Cars\Models\Car;

class SubscriptionPeriod extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly Car $car,
        public readonly Collection $subscribeMonthSettings,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.car.subscription-period', [
            'car' => $this->car,
            'subscribeMonthSettings' => $this->subscribeMonthSettings
        ]);
    }
}
