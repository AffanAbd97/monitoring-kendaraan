<?php

namespace App\View\Components;

use App\Models\Car;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CarActive extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $car = Car::where('status_pakai', 1)->limit(5)->get();
        return view('components.car-active', ['car' => $car]);
    }
}
