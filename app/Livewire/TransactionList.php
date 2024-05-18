<?php

namespace App\Livewire;

use App\Models\Transaction;
use Auth;
use Livewire\Component;
use Livewire\WithPagination;

class TransactionList extends Component
{
    use WithPagination;
    public $search = '';
    public $type = 'all';
    protected $queryString = ['search'];
    protected $paginationTheme = 'tailwind';
    public function mount($type = 'all')
    {
        $this->type = $type;
    }

    public function render()
    {
        $authRole = Auth::user()->role;
        $query = Transaction::query();

        if ($authRole == 'Admin' || $authRole == 'Super Admin') {

            $transaction = $query->where('id_pegawai', 'like', '%' . $this->search . '%')->paginate(7);
        } elseif ($authRole == 'Pool') {

            $transaction = $query->whereIn('tahap', ['waiting', 'firstACC', 'firstReject'])
                ->where('id_pegawai', 'like', '%' . $this->search . '%')->paginate(7);
        } elseif ($authRole == 'Kepala Kantor') {

            $transaction = $query->whereIn('tahap', ['secondReject', 'secondACC', 'firstACC'])
                ->where('id_pegawai', 'like', '%' . $this->search . '%')->paginate(7);
        } else {

            $transaction = null;
        }





        return view('livewire.transaction-list', [
            'transaction' => $transaction,
            'type'=>$this->type,
        ]);
    }
}
