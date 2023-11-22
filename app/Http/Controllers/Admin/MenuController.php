<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Menu\StoreRequest;
use App\Http\Requests\Admin\Menu\UpdateRequest;
use App\Models\Menu;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;


class MenuController extends Controller
{
    private $model;
    private $route_prefix;

    function __construct() {
        $this->model = (new Menu())::query();
        $this->route_prefix = 'admin.menus.';
    }

    public function index() {
        $menus = $this->model->where('deleted_at')->get();

        return view($this->route_prefix.'index', [
            'menus' => $menus,
        ]);
    }


    public function create()
    {
        return view($this->route_prefix.'create');
    }


    public function store(StoreRequest $menu)
    {
        $this->model->create($menu->validated());

        return redirect()->route($this->route_prefix.'index');
    }


    public function edit(Menu $menu)
    {
        return view($this->route_prefix.'edit', [
            'menu' => $menu
        ]);
    }


    public function update(UpdateRequest $request, Menu $menu)
    {
        $menu->update($request->validated());

        return redirect()->route($this->route_prefix.'index');
    }


    public function destroy(Menu $menu)
    {
        $menu->deleted_at = Carbon::now();
        $menu->update();

        return redirect()->route($this->route_prefix.'index');
    }
}
