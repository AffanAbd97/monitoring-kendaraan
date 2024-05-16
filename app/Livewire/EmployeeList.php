<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeeList extends Component
{
    use WithPagination;
    public $search = '';
    protected $queryString = ['search'];
    protected $paginationTheme = 'tailwind';
 
    public function render()
    {
        $employee = Employee::where('nama_pegawai', 'like', '%' . $this->search . '%')->paginate(7);
        return view('livewire.employee-list', [
            'employee' => $employee
        ]);
    }
}
