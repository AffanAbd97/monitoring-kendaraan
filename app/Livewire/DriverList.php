<?php

namespace App\Livewire;

use App\Models\Driver;
use Livewire\Component;
use Livewire\WithPagination;

class DriverList extends Component
{
    use WithPagination;
    public $search = '';
    protected $queryString = ['search'];
    protected $paginationTheme = 'tailwind';
 
    public function render()
    {
        $driver = Driver::where('nama_driver', 'like', '%' . $this->search . '%')->paginate(7);
        return view('livewire.driver-list', [
            'driver' => $driver
        ]);
    }
}
