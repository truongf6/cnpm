<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\View\Component;

class ProductsComponent extends Component
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
        $products = Product::query()->where('deleted_at')
                    ->where('isActive', true)->take(8)->get();

        return view('components.products-component', [
            'products' => $products
        ]);
    }
}
