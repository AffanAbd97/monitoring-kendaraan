<?php

namespace App\View\Components;


use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public $menuItems;
    public $color;
    public $role;
    public function __construct()
    {
        $userRole = Auth::user()->role;
        $this->role = $userRole;
        $menus = [
            'Super Admin' => [
                'menuItems' => [

                    [
                        'url' => route('driver.index'),
                        'label' => 'Driver',
                        'icon' => "fa-solid fa-id-card",
                        'active' => ['driver.index']
                    ],
                    [
                        'url' => route('employee.index'),
                        'label' => 'Pegawai',
                        'icon' => "fa-solid fa-clipboard-user",
                        'active' => ['employee.index']
                    ],
                    [
                        'url' => route('car.index'),
                        'label' => 'Kendaraan',
                        'icon' => "fa-solid fa-car",
                        'active' => ['car.index']
                    ],
                    [
                        'url' => route('transaction.index'),
                        'label' => 'Permintaan',
                        'icon' => "fa-solid fa-book",
                        'active' => ['transaction.index']
                    ],
                    [
                        'url' => route('log.index'),
                        'label' => 'Log Aktivitas',
                        'icon' => "fa-solid fa-clock-rotate-left",
                        'active' => ['log.index']
                    ],
                ],
                'color' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300'
            ],
            'Admin' => [
                'menuItems' => [

                    [
                        'url' => route('driver.index'),
                        'label' => 'Driver',
                        'icon' => "fa-solid fa-id-card",
                        'active' => ['driver.index']
                    ],
                    [
                        'url' => route('employee.index'),
                        'label' => 'Pegawai',
                        'icon' => "fa-solid fa-clipboard-user",
                        'active' => ['employee.index']
                    ],
                    [
                        'url' => route('car.index'),
                        'label' => 'Kendaraan',
                        'icon' => "fa-solid fa-car",
                        'active' => ['car.index']
                    ],
                    [
                        'url' => route('transaction.index'),
                        'label' => 'Permintaan',
                        'icon' => "fa-solid fa-book",
                        'active' => ['transaction.index']
                    ],
                    [
                        'url' => route('log.index'),
                        'label' => 'Log Aktivitas',
                        'icon' => "fa-solid fa-clock-rotate-left",
                        'active' => ['log.index']
                    ],
                ],
                'color' => 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300'
            ],
            'Head' => [
                'menuItems' => [


                    [
                        'url' => route('employee.index'),
                        'label' => 'Pegawai',
                        'icon' => "fa-solid fa-clipboard-user",
                        'active' => ['employee.index']
                    ],

                    [
                        'url' => route('transaction.index'),
                        'label' => 'Permintaan',
                        'icon' => "fa-solid fa-book",
                        'active' => ['transaction.index']
                    ],
                    [
                        'url' => route('log.index'),
                        'label' => 'Log Aktivitas',
                        'icon' => "fa-solid fa-clock-rotate-left",
                        'active' => ['log.index']
                    ],
                ],
                'color' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300'
            ],
            'Pool' => [
                'menuItems' => [

                    [
                        'url' => route('transaction.index'),
                        'label' => 'Permintaan',
                        'icon' => "fa-solid fa-book",
                        'active' => ['transaction.index']
                    ],
                    [
                        'url' => route('car.index'),
                        'label' => 'Kendaraan',
                        'icon' => "fa-solid fa-car",
                        'active' => ['car.index']
                    ],
                    [
                        'url' => route('driver.index'),
                        'label' => 'Driver',
                        'icon' => "fa-solid fa-id-card",
                        'active' => ['driver.index']
                    ],
                    [
                        'url' => route('log.index'),
                        'label' => 'Log Aktivitas',
                        'icon' => "fa-solid fa-clock-rotate-left",
                        'active' => ['log.index']
                    ],
                ],
                'color' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300'
            ],
        ];

        $this->menuItems = $menus[$userRole]['menuItems'] ?? [];
        $this->color = $menus[$userRole]['color'] ?? 'default';


    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar');
    }
}
