<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Slider\StoreRequest;
use App\Http\Requests\Admin\Slider\UpdateRequest;
use App\Models\Slider;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;


class SliderController extends Controller
{
    private $model;
    private $route_prefix;

    function __construct() {
        $this->model = (new Slider())::query();
        $this->route_prefix = 'admin.sliders.';
    }

    public function index() {
        $sliders = $this->model->where('deleted_at')->get();

        return view($this->route_prefix.'index', [
            'sliders' => $sliders,
        ]);
    }


    public function create()
    {
        return view($this->route_prefix.'create');
    }


    public function store(StoreRequest $slider)
    {
        $this->model->create($slider->validated());

        return redirect()->route($this->route_prefix.'index');
    }


    public function edit(Slider $slider)
    {
        return view($this->route_prefix.'edit', [
            'slider' => $slider
        ]);
    }


    public function update(UpdateRequest $request, Slider $slider)
    {
        $slider->update($request->validated());

        return redirect()->route($this->route_prefix.'index');
    }


    public function destroy(Slider $slider)
    {
        $slider->deleted_at = Carbon::now();
        $slider->update();

        return redirect()->route($this->route_prefix.'index');
    }
}
