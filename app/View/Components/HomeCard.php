<?php

namespace App\View\Components;

use App\Models\Driver;
use App\Models\Employee;
use App\Models\Transaction;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HomeCard extends Component
{
    /**
     * Create a new component instance.
     */

    public $jumlah;
    public $icon;
    public $title;
    public $type;
    public function __construct($type = 'driver')
    {
        switch ($type) {
            case 'pegawai':
                $this->icon = 'fa-address-card';
                $this->title = 'Pegawai';
                $this->jumlah = Employee::count();

                break;

            case 'current':
                $this->icon = 'fa-clipboard-list';
                $this->title = 'Permintaan menunggu';
                $this->jumlah = Transaction::whereNotIn('tahap', ['firstReject', 'secondReject', 'secondACC'])->count();

                break;
            case 'driver':
                $this->icon = 'fa-car-side';
                $this->title = 'Driver Belum Bertugas';
                $this->jumlah = Driver::whereNot('status_driver', 'Assigned')->count();

                break;

            default:
                # code...
                break;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home-card');
    }
}
