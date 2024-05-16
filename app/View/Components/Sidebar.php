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
                        'icon' => asset('src/icons/driver.svg'),
                        'active' => ['driver.index']
                    ]
                ],
                'color' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300'
            ],
            'Admin' => [
                'menuItems' => [
                    [
                        'url' => 'dept.index',
                        'label' => 'Departement',
                        'icon' => asset('src/icons/dept.svg'),
                        'active' => ['dept.index']
                    ],
                    [
                        'url' => 'driver.index',
                        'label' => 'Driver',
                        'icon' => asset('src/icons/driver.svg'),
                        'active' => ['driver.index']
                    ],
                    [
                        'url' => 'office.index',
                        'label' => 'Office',
                        'icon' => asset('src/icons/office.svg'),
                        'active' => ['office.index']
                    ],
                    [
                        'url' => 'pool.index',
                        'label' => 'Pool',
                        'icon' => asset('src/icons/pool.svg'),
                        'active' => ['pool.index']
                    ],
                ],
                'color' => 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300'
            ],
            'Head' => [
                'menuItems' => [
                    [
                        'url' => 'dept.index',
                        'label' => 'Departement',
                        'icon' => asset('src/icons/dept.svg'),
                        'active' => ['dept.index']
                    ],
                    [
                        'url' => 'office.index',
                        'label' => 'Office',
                        'icon' => asset('src/icons/office.svg'),
                        'active' => ['office.index']
                    ],
                ],
                'color' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300'
            ],
            'Pool' => [
                'menuItems' => [
                    [
                        'url' => 'pool.index',
                        'label' => 'Pool',
                        'icon' => asset('src/icons/pool.svg'),
                        'active' => ['pool.index']
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
