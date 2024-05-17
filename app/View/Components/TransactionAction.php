<?php
namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class TransactionAction extends Component
{
    public $roles;
    public $status;
    public $id;

    public function __construct($status=null,$id)
    {
        $this->roles = Auth::user()->role;
        $this->status = $status;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.transaction-action');
    }
}
