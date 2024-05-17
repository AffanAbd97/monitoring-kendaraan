<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;
use Livewire\WithPagination;

class CarList extends Component
{
    use WithPagination;
    public $search = '';
    protected $queryString = ['search'];
    protected $paginationTheme = 'tailwind';

    public function render()
    {
        $car = Car::where('nama_kendaraan', 'like', '%' . $this->search . '%')->paginate(7);
        return view('livewire.car-list', [
            'car' => $car
        ]);
    }
}
