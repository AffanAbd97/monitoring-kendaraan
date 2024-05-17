<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Component;
use Livewire\WithPagination;

class TransactionList extends Component
{
    use WithPagination;
    public $search = '';
    protected $queryString = ['search'];
    protected $paginationTheme = 'tailwind';
 
    public function render()
    {
        $transaction = Transaction::where('id_pegawai', 'like', '%' . $this->search . '%')->paginate(7);
       
        
        return view('livewire.transaction-list', [
            'transaction' => $transaction
        ]);
    }
}
