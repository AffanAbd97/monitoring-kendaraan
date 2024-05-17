<?php

namespace App\Livewire;

use App\Models\Logs;
use Livewire\Component;
use Livewire\WithPagination;

class LogList extends Component
{
    use WithPagination;
    public function render()
    {
        $log = Logs::paginate(7);
        return view('livewire.log-list', [
            'log' => $log
        ]);
    }

}
