<?php

namespace App\View\Components;

use App\Models\Slider;
use Illuminate\View\Component;

class SliderComponent extends Component
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
        $sliders = Slider::query()->where('isActive', true)->where('deleted_at')->get();

        return view('components.slider-component', [
            'sliders' => $sliders,
        ]);
    }
}
