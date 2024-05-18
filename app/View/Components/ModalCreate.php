<?php

namespace App\View\Components;

use App\Models\Car;
use App\Models\Driver;
use App\Models\Mine;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalCreate extends Component
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
        $driver = Driver::where('status_driver', 'Not Assigned')->get();
        $car = Car::where('status_pakai', 0)->get();
        $tambang = Mine::all();
        return view('components.modal-create', [
            'driver' => $driver,
            'car' => $car,
            'tambang' => $tambang,
        ]);
    }
}
