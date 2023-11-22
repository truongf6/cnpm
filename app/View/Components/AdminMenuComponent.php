<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\AdminMenu;

class AdminMenuComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $admin_menus = AdminMenu::query()->where('isActive', true)->get();

        return view('components.admin-menu-component', [
            'admin_menus' => $admin_menus,
        ]);
    }
}
