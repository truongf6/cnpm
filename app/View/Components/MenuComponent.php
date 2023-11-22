<?php

namespace App\View\Components;

use App\Models\Menu;
use Illuminate\View\Component;

class MenuComponent extends Component
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
        $menus = Menu::query()->where('isActive', true)->orderBy('order', 'ASC')->get();

        return view('components.menu-component', [
            'menus' => $menus,
        ]);
    }
}
